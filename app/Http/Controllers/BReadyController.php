<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pillar;
use App\Models\PillarScore;
use App\Models\Indicator;
use App\Models\IndPillar;
use App\Models\IndScore;
use App\Models\IndValue;
use App\Models\YearScore;
use App\Models\YearPillarScore;
use App\Models\IndicatorInst;
use App\Models\Org;
use App\Models\YearNarrative;

class BReadyController extends Controller
{
    public function performanceData()
    {
        $narrative = YearNarrative::orderBy('id', 'desc')->first();
        $pillars = Pillar::orderBy('id', 'asc')->get();
        
        $latestYear = IndScore::orderBy('yr', 'desc')->value('yr') ?? ($narrative?->year ?? date('Y'));
        
        $indicators = Indicator::where('comp_id', 1)->orderBy('name', 'asc')->get();
        if ($indicators->isEmpty()) {
            $indicators = Indicator::orderBy('name', 'asc')->get();
        }

        $indicatorData = $indicators->map(function ($ind) use ($latestYear) {
            $scoreRecord = IndScore::where('ind_id', $ind->id)
                ->where('yr', $latestYear)
                ->first();

            return [
                'indicator' => $ind,
                'score' => $scoreRecord?->score,
                'image' => $scoreRecord?->image,
            ];
        });

        $yearsList = YearPillarScore::distinct()->orderBy('year', 'desc')->pluck('year');
        $allYearPillarScores = YearPillarScore::all();

        return view('pages.bready.performance_data', compact(
            'narrative',
            'pillars',
            'latestYear',
            'indicators',
            'indicatorData',
            'yearsList',
            'allYearPillarScores'
        ));
    }

    public function overview()
    {
        $pillars = Pillar::orderBy('id', 'desc')->get();
        $indicators = Indicator::where('comp_id', 1)->orderBy('id', 'desc')->get();
        if ($indicators->isEmpty()) {
            $indicators = Indicator::orderBy('id', 'desc')->get();
        }
        $yearScores = YearScore::orderBy('id', 'desc')->get();

        return view('pages.bready.overview', compact('pillars', 'indicators', 'yearScores'));
    }

    public function ghana()
    {
        $pillars = Pillar::orderBy('id', 'desc')->get();
        $pillarScores = PillarScore::orderBy('year', 'desc')->get();
        $indicators = Indicator::where('comp_id', 1)->with(['scores', 'pillarScores'])->orderBy('id', 'desc')->get();
        if ($indicators->isEmpty()) {
            $indicators = Indicator::orderBy('id', 'desc')->get();
        }
        $yearPillarScores = YearPillarScore::orderBy('id', 'desc')->get();

        return view('pages.bready.ghana', compact('pillars', 'pillarScores', 'indicators', 'yearPillarScores'));
    }

    public function topic($id)
    {
        $indicator = Indicator::with(['scores', 'values', 'subPillars', 'pillarScores'])->findOrFail($id);
        $pillars = Pillar::orderBy('id', 'desc')->get();
        $subPillars = IndPillar::where('indicator_id', $id)->orderBy('id', 'desc')->get();
        $scores = IndScore::where('ind_id', $id)->orderBy('id', 'desc')->get();
        $values = IndValue::where('ind_id', $id)->orderBy('year', 'desc')->get();
        $pillarScores = PillarScore::where('indid', $id)->orderBy('year', 'desc')->get();
        
        $instIds = IndicatorInst::where('indicator_id', $id)->pluck('institution_id');
        $institutions = Org::whereIn('org_id', $instIds)->orderBy('org_id', 'desc')->get();

        $allIndicators = Indicator::where('comp_id', 1)->orderBy('id', 'desc')->get();

        return view('pages.bready.topic', compact(
            'indicator',
            'pillars',
            'subPillars',
            'scores',
            'values',
            'pillarScores',
            'institutions',
            'allIndicators'
        ));
    }
}
