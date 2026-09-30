<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationDetails;
use App\Models\ForumTopic;
use App\Models\ForumComment;
use App\Models\Poll;
use App\Models\PollQuestion;
use App\Models\PollAnswer;
use App\Models\PollVote;
use App\Models\ConsultationResponse;
use App\Models\ConsultationAttachment;
use App\Models\ViewTb;
use App\Models\LikesTb;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function current(Request $request)
    {
        $query = ConsultationDetails::with(['officer.org'])
            ->withCount(['views', 'likes', 'responses'])
            ->where('status', '!=', 'Closed');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('topic', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('brief_background', 'like', "%{$search}%");
            });
        }

        $consultations = $query->orderBy('id', 'desc')->paginate(9);

        return view('pages.consultations.current', compact('consultations'));
    }

    public function closed(Request $request)
    {
        $query = ConsultationDetails::with(['officer.org'])
            ->withCount(['views', 'likes', 'responses'])
            ->where('status', 'Closed');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('topic', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('brief_background', 'like', "%{$search}%");
            });
        }

        $consultations = $query->orderBy('id', 'desc')->paginate(9);

        return view('pages.consultations.closed', compact('consultations'));
    }

    public function calendar(Request $request)
    {
        $allConsultations = ConsultationDetails::whereNotNull('start_date')
            ->where('start_date', '!=', '')
            ->get();

        $events = $allConsultations->map(function ($item) {
            $bgColor = '#27ae60';
            if ($item->status === 'Closed') {
                $bgColor = '#c0392b';
            } elseif ($item->status === 'Pending') {
                $bgColor = '#e67e22';
            }

            return [
                'id' => $item->id,
                'title' => $item->topic,
                'start' => $item->start_date,
                'end' => $item->end_date ?: $item->start_date,
                'url' => route('consultations.show', $item->id),
                'backgroundColor' => $bgColor,
                'borderColor' => $bgColor,
            ];
        });

        $query = ConsultationDetails::with(['officer.org'])->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('topic', 'like', "%{$search}%")
                  ->orWhere('brief_background', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        $workshops = $query->paginate(10);

        return view('pages.consultations.calendar', compact('events', 'workshops'));
    }


    public function discussions()
    {
        $topics = ForumTopic::with(['interest', 'comments'])
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.consultations.discussions', compact('topics'));
    }

    public function polls()
    {
        $polls = Poll::with(['questions.answers', 'votes'])
            ->where('status', 'Active')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.consultations.polls', compact('polls'));
    }

    public function votePoll(Request $request, $id)
    {
        $request->validate([
            'option' => 'required|string',
            'question_id' => 'nullable|integer',
        ]);

        $userId = Auth::id() ?: 0;

        // Record vote
        PollVote::create([
            'poll_id' => $id,
            'user_id' => $userId,
            'date_completed' => date('Y-m-d H:i:s'),
            'user_type' => Auth::check() ? 'Registered' : 'Public',
        ]);

        if ($request->filled('question_id')) {
            PollAnswer::create([
                'poll_id' => $id,
                'question_id' => $request->input('question_id'),
                'user_id' => $userId,
                'answer' => $request->input('option'),
                'user_type' => Auth::check() ? 'Registered' : 'Public',
            ]);
        }

        return redirect()->back()->with('success', 'Your vote has been recorded securely. Thank you for your participation.');
    }

    public function show($id)
    {
        $consultation = ConsultationDetails::with(['officer.org', 'attachments', 'responses'])
            ->withCount(['views', 'likes', 'responses'])
            ->findOrFail($id);

        // Record page view asynchronously/silently
        try {
            ViewTb::create([
                'consult_id' => $id,
                'ip_address' => request()->ip(),
                'createdon' => date('Y-m-d H:i:s'),
            ]);
        } catch (\Exception $e) {
            // Ignore duplicate views or log silently
        }

        $related = ConsultationDetails::where('id', '!=', $id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('pages.consultations.show', compact('consultation', 'related'));
    }

    public function submitFeedback(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'organization' => 'nullable|string|max:200',
            'comments' => 'required|string|max:5000',
        ]);

        ConsultationResponse::create([
            'consult_id' => $id,
            'user_id' => Auth::id() ?: 0,
            'resp_email' => $request->input('email'),
            'comments' => $request->input('comments'),
            'status' => 'Pending',
            'confidentiality' => $request->input('confidentiality', 'No'),
        ]);

        return redirect()->back()->with('success', 'Thank you! Your comments and feedback on this consultation have been recorded.');
    }
}
