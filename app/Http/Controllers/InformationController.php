<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqTable;
use App\Models\Org;
use App\Models\News;
use App\Models\PublicationCat;
use App\Models\Country;
use App\Models\ConsultationType;
use App\Models\Interest;

class InformationController extends Controller
{
    public function about()
    {
        return view('pages.info.about');
    }

    public function faq()
    {
        $faqs = FaqTable::with('interest')
            ->where('status', 'Active')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.info.faq', compact('faqs'));
    }

    public function yourSay()
    {
        $countries = Country::orderBy('countries_id', 'desc')->get();
        $consultationTypes = ConsultationType::orderBy('id', 'desc')->get();
        $interests = Interest::orderBy('int_id', 'desc')->get();

        return view('pages.info.your_say', compact('countries', 'consultationTypes', 'interests'));
    }

    public function submitYourSay(Request $request)
    {
        $request->validate([
            'submission_type' => 'required|string|in:proposal,complaint,general',
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'sector' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
            'cf-turnstile-response' => [new \App\Rules\Turnstile],
        ]);

        return redirect()->back()->with('success', 'Thank you! Your feedback has been received and routed to the BRR team.');
    }

    public function stakeholders(Request $request)
    {
        $query = Org::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('org_name', 'like', "%{$search}%")
                  ->orWhere('org_address', 'like', "%{$search}%")
                  ->orWhere('org_location', 'like', "%{$search}%");
        }

        $institutions = $query->orderBy('org_id', 'desc')->paginate(18);

        return view('pages.info.stakeholders', compact('institutions'));
    }

    public function privacy()
    {
        return view('pages.info.privacy');
    }

    public function terms()
    {
        return view('pages.info.terms');
    }

    public function publications()
    {
        $publications = News::with('org')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $categories = PublicationCat::orderBy('id', 'desc')->get();

        return view('pages.info.publications', compact('publications', 'categories'));
    }
}
