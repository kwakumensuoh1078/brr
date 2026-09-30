<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulation;
use App\Models\ConsultationType;
use App\Models\Org;
use App\Models\Subject;
use App\Models\Interest;
use App\Models\RegClause;

class BusinessRegulationController extends Controller
{
    public function portal(Request $request)
    {
        $stats = [
            'docs_count' => Regulation::count(),
            'institutions_count' => Org::count(),
            'types_count' => ConsultationType::count(),
            'clauses_count' => RegClause::count(),
        ];

        $query = Regulation::with(['consultationType', 'org', 'subject', 'interest']);

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->input('class_id'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('no', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%");
            });
        }

        $recentDocs = $query->orderBy('id', 'desc')->paginate(15);
        $institutions = Org::has('regulations')->withCount('regulations')->orderBy('regulations_count', 'desc')->take(12)->get();
        $categories = ConsultationType::withCount('regulations')->orderBy('id', 'desc')->get();

        return view('pages.regulations.portal', compact('stats', 'recentDocs', 'institutions', 'categories'));
    }

    public function byInstitution(Request $request)
    {
        $query = Org::has('regulations')->withCount('regulations');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('org_name', 'like', "%{$search}%")
                  ->orWhere('org_address', 'like', "%{$search}%")
                  ->orWhere('org_type', 'like', "%{$search}%");
            });
        }

        $institutions = $query->orderBy('org_id', 'desc')->paginate(18);

        return view('pages.regulations.by_institution', compact('institutions'));
    }

    public function institutionDetails($id, Request $request)
    {
        $institution = Org::withCount('regulations')->findOrFail($id);

        $query = Regulation::with(['consultationType', 'subject', 'interest'])
            ->where('agency_id', $id);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('no', 'like', "%{$search}%");
            });
        }

        $docs = $query->orderBy('id', 'desc')->paginate(15);

        return view('pages.regulations.institution_details', compact('institution', 'docs'));
    }

    public function bySector(Request $request)
    {
        $sectors = Interest::has('regulations')->withCount('regulations')->orderBy('int_id', 'desc')->get();
        
        $query = Regulation::with(['consultationType', 'org', 'subject', 'interest']);

        $selectedSectorId = $request->input('sector_id');
        if ($selectedSectorId) {
            $query->where('sector_id', $selectedSectorId);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        $docs = $query->orderBy('id', 'desc')->paginate(15);

        return view('pages.regulations.by_sector', compact('sectors', 'docs', 'selectedSectorId'));
    }

    public function bySubject(Request $request)
    {
        $subjects = Subject::has('regulations')->withCount('regulations')->orderBy('id', 'desc')->get();

        $query = Regulation::with(['consultationType', 'org', 'subject']);

        $selectedSubjectId = $request->input('subject_id');
        if ($selectedSubjectId) {
            $query->where('subject_id', $selectedSubjectId);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        $docs = $query->orderBy('id', 'desc')->paginate(15);

        return view('pages.regulations.by_subject', compact('subjects', 'docs', 'selectedSubjectId'));
    }

    public function byYear(Request $request)
    {
        $years = Regulation::selectRaw('DISTINCT year')
            ->whereNotNull('year')
            ->where('year', '!=' , '')
            ->orderBy('year', 'desc')
            ->pluck('year');

        $selectedYear = $request->input('year', $years->first() ?: date('Y'));

        $query = Regulation::with(['consultationType', 'org', 'subject'])
            ->where('year', $selectedYear);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('no', 'like', "%{$search}%");
            });
        }

        $docs = $query->orderBy('id', 'desc')->paginate(15);

        return view('pages.regulations.by_year', compact('years', 'selectedYear', 'docs'));
    }

    public function show($id)
    {
        $doc = Regulation::with(['org', 'consultationType', 'subject', 'interest', 'clauses', 'procedures', 'forms'])
            ->findOrFail($id);

        $relatedDocs = Regulation::where('id', '!=', $id)
            ->where(function ($q) use ($doc) {
                if ($doc->class_id) {
                    $q->where('class_id', $doc->class_id);
                } elseif ($doc->agency_id) {
                    $q->where('agency_id', $doc->agency_id);
                }
            })
            ->take(5)
            ->get();

        return view('pages.regulations.show', compact('doc', 'relatedDocs'));
    }
}
