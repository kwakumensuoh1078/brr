@extends('layouts.app')

@section('title', 'Discussion Forum - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Discussions" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Discussion Forum</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Discussions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="discussions-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Public Reform Discussions</h3>
                <p class="text-muted">Engage in open discussions with policy makers, regulatory experts, and business leaders.</p>

                <div class="d-flex flex-column gap-3 mt-4">
                    @forelse($topics as $topic)
                        <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-success">{{ $topic->interest?->interest_name ?: 'General Reform' }}</span>
                                <small class="text-muted"><i class="fa fa-calendar me-1"></i> {{ $topic->start_date ?: 'Open Discussion' }}</small>
                            </div>
                            <h4 class="fw-bold fs-5 mb-2">{{ $topic->title }}</h4>
                            <p class="text-muted mb-3" style="line-height: 1.7;">{{ $topic->description }}</p>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <small class="text-muted"><i class="fa fa-comments-o text-success me-1"></i> Public Policy Discourse</small>
                                <span class="badge bg-light text-dark"><i class="fa fa-comments me-1"></i> {{ $topic->comments->count() }} contributions</span>
                            </div>
                        </div>
                    @empty
                        <div class="card border-0 shadow-sm p-5 text-center bg-white">
                            <i class="fa fa-comments-o fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No active forum topics currently open</h5>
                            <p class="text-muted small">You can share your reform feedback or propose new topics via Have Your Say.</p>
                            <div>
                                <a href="{{ route('your_say') }}" class="btn btn-sm btn-success">Share Your Experience</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm p-4 bg-light">
                    <h5 class="fw-bold mb-3"><i class="fa fa-edit text-success me-2"></i> Start a New Topic</h5>
                    <p class="small text-muted">Propose an area of regulation or administrative directive that needs public debate and reform review.</p>
                    <a href="{{ route('your_say') }}" class="btn btn-success w-100">Submit Your Say / Topic</a>
                </div>

                <div class="card border-0 shadow-sm p-4 bg-light mt-4">
                    <h5 class="fw-bold mb-3"><i class="fa fa-info-circle text-primary me-2"></i> Forum Guidelines</h5>
                    <ul class="small text-muted ps-3 mb-0">
                        <li class="mb-2">Constructive and evidence-based submissions.</li>
                        <li class="mb-2">Respectful and professional discourse.</li>
                        <li>No promotional spam or unauthorized content.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
