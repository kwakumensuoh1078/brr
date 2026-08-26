@extends('layouts.app')

@section('title', $consultation->topic . ' - BRR Consultations')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Consultation" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">{{ Str::limit($consultation->topic, 45) }}</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="consultation-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge {{ $consultation->status == 'Closed' ? 'bg-secondary' : 'bg-success' }} fs-6">
                            {{ $consultation->status ?: 'Active Consultation' }}
                        </span>
                        <span class="text-muted"><i class="fa fa-calendar me-1"></i> Period: {{ $consultation->start_date ?: 'Ongoing' }} - {{ $consultation->end_date ?: 'Open' }}</span>
                    </div>

                    <h2 class="fw-bold fs-4 mb-3">{{ $consultation->topic }}</h2>

                    @if($consultation->brief_background)
                        <div class="mb-4">
                            <h5 class="fw-bold text-success"><i class="fa fa-info-circle me-1"></i> Background & Objectives</h5>
                            <p class="text-muted" style="line-height: 1.8;">
                                {!! nl2br(e($consultation->brief_background)) !!}
                            </p>
                        </div>
                    @endif

                    @if($consultation->summary)
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark"><i class="fa fa-file-text-o me-1"></i> Summary of Proposed Policy / Reforms</h5>
                            <p class="text-muted" style="line-height: 1.8;">
                                {!! nl2br(e($consultation->summary)) !!}
                            </p>
                        </div>
                    @endif

                    @if($consultation->detail)
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark"><i class="fa fa-align-left me-1"></i> Detailed Provisions</h5>
                            <p class="text-muted" style="line-height: 1.8;">
                                {!! nl2br(e($consultation->detail)) !!}
                            </p>
                        </div>
                    @endif

                    <div class="row g-3 p-3 bg-light rounded mb-4">
                        <div class="col-md-6">
                            <strong class="text-dark"><i class="fa fa-university text-success me-1"></i> Lead MDA / Sponsor:</strong>
                            <p class="text-muted mb-0">{{ $consultation->officer?->org?->org_name ?: 'Ministry of Trade & Industry (BRR)' }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong class="text-dark"><i class="fa fa-user text-primary me-1"></i> Regulatory Officer:</strong>
                            <p class="text-muted mb-0">{{ $consultation->officer?->full_name ?: 'BRR Technical Lead' }}</p>
                        </div>
                    </div>

                    <!-- Attachments -->
                    @if($consultation->attachments->isNotEmpty())
                        <div class="mb-4">
                            <h5 class="fw-bold text-success mb-3"><i class="fa fa-paperclip me-1"></i> Consultation Documents & Draft Bills</h5>
                            <div class="list-group">
                                @foreach($consultation->attachments as $att)
                                    <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-file-pdf-o text-danger fa-2x me-3"></i>
                                            <div>
                                                <span class="fw-semibold text-dark d-block">{{ basename($att->attachment) }}</span>
                                                <small class="text-muted">Official consultation document</small>
                                            </div>
                                        </div>
                                        <a href="{{ asset('upload/consultation_doc/' . $att->attachment) }}" class="btn btn-sm btn-outline-success" target="_blank" download>
                                            <i class="fa fa-download me-1"></i> Download
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Feedback & Response Form -->
                    <div class="mt-4 pt-4 border-top">
                        <h4 class="fw-bold mb-3"><i class="fa fa-pencil-square-o text-success me-2"></i> Submit Your Input / Public Feedback</h4>
                        <p class="text-muted small mb-4">Your comments and suggested changes will be compiled into the Technical Working Group review report.</p>

                        <form action="{{ route('consultations.submit_feedback', $consultation->id) }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Name *</label>
                                    <input type="text" name="full_name" class="form-control" required value="{{ old('full_name', Auth::user()?->user_fullname) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email Address *</label>
                                    <input type="email" name="email" class="form-control" required value="{{ old('email', Auth::user()?->username) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()?->phone_number) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Organization / Business Name</label>
                                    <input type="text" name="organization" class="form-control" value="{{ old('organization') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Your Comments / Suggested Reforms *</label>
                                    <textarea name="comments" rows="5" class="form-control" placeholder="Provide specific feedback on clauses, procedures, fees, or turnaround times..." required>{{ old('comments') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="confidentiality" value="Yes" id="confidentialityCheck">
                                        <label class="form-check-label small text-muted" for="confidentialityCheck">
                                            Keep my feedback confidential (for internal technical committee analysis only)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-success px-4 py-2">
                                        <i class="fa fa-paper-plane me-1"></i> Submit Response
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 bg-light mb-4">
                    <h5 class="fw-bold mb-3">Other Consultations</h5>
                    <div class="d-flex flex-column gap-3">
                        @foreach($related as $rel)
                            <div class="border-bottom pb-2">
                                <h6 class="fw-semibold mb-1">
                                    <a href="{{ route('consultations.show', $rel->id) }}" class="text-dark">
                                        {{ Str::limit($rel->topic, 55) }}
                                    </a>
                                </h6>
                                <small class="text-muted"><i class="fa fa-calendar me-1"></i> {{ $rel->start_date ?: 'Ongoing' }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 text-white" style="background: linear-gradient(135deg, #ad2702 0%, #c0392b 100%);">
                    <h5 class="fw-bold text-white mb-2">Have a General Proposal?</h5>
                    <p class="small text-white-50 mb-3">If you would like to propose a new area of business reform not covered in active consultations, share your experience.</p>
                    <a href="{{ route('your_say') }}" class="btn btn-light btn-sm fw-bold">Have Your Say &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
