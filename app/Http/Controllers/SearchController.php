<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulation;
use App\Models\RegClause;
use App\Models\ConsultationDetails;
use App\Models\Org;
use App\Models\Indicator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = trim($request->input('search', $request->input('q', '')));

        if (empty($query)) {
            return redirect()->route('home')->with('info', 'Please enter keywords to search.');
        }

        // Search regulations
        $docs = Regulation::with(['consultationType', 'org'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('no', 'like', "%{$query}%")
                  ->orWhere('year', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();

        // Search individual clauses & sections
        $clauses = RegClause::with('regulation')
            ->where(function ($q) use ($query) {
                $q->where('clause_title', 'like', "%{$query}%")
                  ->orWhere('details', 'like', "%{$query}%")
                  ->orWhere('section', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')
            ->take(15)
            ->get();

        // Search consultations
        $consultations = ConsultationDetails::with(['officer.org'])
            ->where(function ($q) use ($query) {
                $q->where('topic', 'like', "%{$query}%")
                  ->orWhere('summary', 'like', "%{$query}%")
                  ->orWhere('brief_background', 'like', "%{$query}%");
            })
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        // Search institutions
        $institutions = Org::where('org_name', 'like', "%{$query}%")
            ->orWhere('org_description', 'like', "%{$query}%")
            ->orderBy('org_id', 'desc')
            ->take(10)
            ->get();

        // Search B-Ready indicators
        $indicators = Indicator::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $totalResults = $docs->count() + $clauses->count() + $institutions->count() + $consultations->count() + $indicators->count();

        return view('pages.search_results', compact(
            'query',
            'docs',
            'clauses',
            'institutions',
            'consultations',
            'indicators',
            'totalResults'
        ));
    }
}
