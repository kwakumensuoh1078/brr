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

class BReadyController extends Controller
{
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
