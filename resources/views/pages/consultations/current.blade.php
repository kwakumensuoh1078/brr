@extends('layouts.app')

@section('title', 'Current Public Consultations - BRR Portal Ghana')

@section('content')
<!-- Page Header Banner -->
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Consultations Banner" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Current Consultations</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Current</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="consultations-section py-5">
    <div class="container">
        <div class="row">
            <!-- Search & Filters -->
            <div class="col-12 mb-4">
                <div class="card border-0 shadow-sm p-4 bg-light">
                    <form method="GET" action="{{ route('consultations.current') }}">
                        <div class="row g-3 align-items-center">
                            <div class="col-lg-8 col-md-7">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="fa fa-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search active consultations by topic, keyword, or policy area..." value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex gap-2">
                                <button type="submit" class="btn btn-success flex-grow-1"><i class="fa fa-filter me-1"></i> Filter</button>
                                <a href="{{ route('consultations.current') }}" class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- List of Consultations -->
            <div class="col-12">
                <div class="row g-4">
                    @forelse($consultations as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between p-4" style="border-radius: 8px; border-top: 4px solid #ad2702; background: #fff;">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-success">{{ $item->status ?: 'Active Consultation' }}</span>
                                        @if($item->end_date)
                                            <small class="text-muted"><i class="fa fa-calendar me-1"></i> Closes: {{ $item->end_date }}</small>
                                        @endif
                                    </div>
                                    <h4 class="fw-bold mb-2" style="font-size: 18px;">
                                        <a href="{{ route('consultations.show', $item->id) }}" class="text-dark">
                                            {{ $item->topic }}
                                        </a>
                                    </h4>
                                    <p class="text-muted small" style="line-height: 1.6;">
                                        {{ Str::limit(strip_tags($item->brief_background ?: $item->summary), 140) ?: 'Public stakeholder consultation under the Ghana Business Regulatory Reforms framework.' }}
                                    </p>
                                </div>

                                <div class="pt-3 border-top mt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="small text-success fw-bold">
                                            <i class="fa fa-university me-1"></i> {{ Str::limit($item->officer?->org?->org_name ?: 'BRR Secretariat', 30) }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="small text-muted d-flex gap-3">
                                            <span><i class="fa fa-eye text-success me-1"></i> {{ $item->views_count }}</span>
                                            <span><i class="fa fa-comment text-primary me-1"></i> {{ $item->responses_count }}</span>
                                        </div>
                                        <a href="{{ route('consultations.show', $item->id) }}" class="btn btn-sm btn-outline-success">
                                            Participate &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fa fa-folder-open-o fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No active consultations found</h4>
                            <p class="text-muted">Please check back soon or browse closed consultations for archived reports.</p>
                            <a href="{{ route('consultations.closed') }}" class="btn btn-outline-secondary">View Closed Consultations</a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $consultations->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
