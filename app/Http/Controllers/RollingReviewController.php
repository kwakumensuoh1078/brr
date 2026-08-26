<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityStatus;
use App\Models\Matrix;
use App\Models\ReformType;
use App\Models\Indicator;
use App\Models\Org;
use App\Models\News;

class RollingReviewController extends Controller
{
    public function overview()
    {
        $reformTypes = ReformType::orderBy('id', 'desc')->get();
        $matrices = Matrix::with('indicator')->orderBy('id', 'desc')->take(8)->get();
        $totalActivities = ActivityStatus::count();
        $completedActivities = ActivityStatus::where('status', 'Completed')->count();
        $latestNews = News::with('org')->orderBy('id', 'desc')->take(3)->get();

        return view('pages.rolling_review.overview', compact(
            'reformTypes',
            'matrices',
            'totalActivities',
            'completedActivities',
            'latestNews'
        ));
    }

    public function tracker(Request $request)
    {
        $query = ActivityStatus::with(['matrix', 'activity', 'indicator', 'org']);

        if ($request->filled('year')) {
            $query->where('e_year', $request->input('year'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('institution_id')) {
            $query->where('institution_id', $request->input('institution_id'));
        }

        if ($request->filled('indicator_id')) {
            $query->where('indicator_id', $request->input('indicator_id'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('comment', 'like', "%{$search}%")
                  ->orWhere('feedback', 'like', "%{$search}%")
                  ->orWhere('challenge', 'like', "%{$search}%")
                  ->orWhereHas('activity', function ($sub) use ($search) {
                      $sub->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('matrix', function ($sub) use ($search) {
                      $sub->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $activities = $query->orderBy('id', 'desc')->paginate(20);

        $years = ActivityStatus::selectRaw('DISTINCT e_year')
            ->whereNotNull('e_year')
            ->where('e_year', '!=', 0)
            ->orderBy('e_year', 'desc')
            ->pluck('e_year');

        $institutions = Org::has('activities')->orderBy('org_id', 'desc')->get();
        $indicators = Indicator::orderBy('id', 'desc')->get();

        $stats = [
            'total' => ActivityStatus::count(),
            'completed' => ActivityStatus::where('status', 'Completed')->count(),
            'pending' => ActivityStatus::where('status', 'Pending')->orWhere('status', 'Not Started')->count(),
            'in_progress' => ActivityStatus::where('status', 'In Progress')->orWhere('status', 'Ongoing')->count(),
        ];

        return view('pages.rolling_review.tracker', compact(
            'activities',
            'years',
            'institutions',
            'indicators',
            'stats'
        ));
    }
}
