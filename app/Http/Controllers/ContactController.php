<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Rules\Turnstile;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'tele' => 'nullable|string|max:30',
            'phone' => 'nullable|string|max:30',
            'message' => 'required|string|max:5000',
            'cf-turnstile-response' => [new Turnstile],
        ]);

        ContactUs::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tele' => $request->input('tele', $request->input('phone', '')),
            'message' => ($request->filled('subject') ? "[Subject: " . $request->input('subject') . "]\n" : "") . $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you shortly.');
    }

    public function submitProposal(Request $request)
    {
        $request->validate([
            'proposer_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'proposal_title' => 'required|string|max:250',
            'affected_law' => 'nullable|string|max:250',
            'proposal_details' => 'required|string|max:5000',
        ]);

        ContactUs::create([
            'name' => $request->input('proposer_name'),
            'email' => $request->input('email'),
            'tele' => $request->input('phone', ''),
            'message' => "[Reform Proposal: " . $request->input('proposal_title') . "]\n[Affected Law: " . $request->input('affected_law') . "]\n" . $request->input('proposal_details'),
        ]);

        return redirect()->back()->with('success', 'Thank you! Your regulatory proposal has been submitted successfully to the BRR Technical Working Group.');
    }

    public function submitComplaint(Request $request)
    {
        $request->validate([
            'complainant_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'agency_involved' => 'required|string|max:250',
            'complaint_details' => 'required|string|max:5000',
        ]);

        ContactUs::create([
            'name' => $request->input('complainant_name'),
            'email' => $request->input('email'),
            'tele' => $request->input('phone', ''),
            'message' => "[Grievance / Complaint - Agency: " . $request->input('agency_involved') . "]\n" . $request->input('complaint_details'),
        ]);

        return redirect()->back()->with('success', 'Thank you! Your complaint has been lodged securely and a tracking confirmation will be sent to your email.');
    }
}
