<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regulation;
use App\Models\ConsultationDetails;
use App\Models\Indicator;
use App\Models\DidUKnow;
use App\Models\News;
use App\Models\Org;
use App\Models\Pillar;
use App\Models\RegClause;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch featured & recent regulations
        $recentRegulations = Regulation::with(['consultationType', 'org', 'subject'])
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        // Fetch active public consultations (limited to 3)
        $featuredConsultations = ConsultationDetails::with(['officer.org'])
            ->where('status', '!=', 'Closed')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        // Fallback to 3 recent consultations if none are explicitly active
        if ($featuredConsultations->isEmpty()) {
            $featuredConsultations = ConsultationDetails::with(['officer.org'])
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();
        }

        // Fetch B-Ready Pillars & Indicators
        $pillars = Pillar::orderBy('id', 'desc')->get();
        $indicators = Indicator::where('comp_id', 1)->orderBy('id', 'desc')->get();
        if ($indicators->isEmpty()) {
            $indicators = Indicator::orderBy('id', 'desc')->take(10)->get();
        }

        // Did You Know items
        $didYouKnows = DidUKnow::with('org')->orderBy('id', 'desc')->get();

        // Latest news & reform updates
        $latestNews = News::with('org')->orderBy('id', 'desc')->take(3)->get();

        // Key Stakeholder institutions
        $institutions = Org::orderBy('org_id', 'desc')->take(12)->get();

        // Portal Statistics
        $stats = [
            'regulations_count' => Regulation::count(),
            'institutions_count' => Org::count(),
            'consultations_count' => ConsultationDetails::count(),
            'indicators_count' => Indicator::count(),
            'clauses_count' => RegClause::count(),
        ];

        return view('pages.home', compact(
            'recentRegulations',
            'featuredConsultations',
            'pillars',
            'indicators',
            'didYouKnows',
            'latestNews',
            'institutions',
            'stats'
        ));
    }
}
