@extends('layouts.app')

@section('title', 'Closed Public Consultations - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Closed Consultations" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Closed Consultations</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="consultations-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <p class="text-muted">Archive of completed public consultations, stakeholder review sessions, and policy adoption summaries.</p>
            </div>

            <div class="col-12">
                <div class="row g-4">
                    @forelse($consultations as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 border-0 shadow-sm d-flex flex-column justify-content-between p-4" style="border-radius: 8px; border-top: 4px solid #7f8c8d; background: #fff;">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-secondary">Closed Consultation</span>
                                        <small class="text-muted"><i class="fa fa-calendar me-1"></i> Closed: {{ $item->end_date ?: 'Concluded' }}</small>
                                    </div>
                                    <h4 class="fw-bold mb-2" style="font-size: 18px;">
                                        <a href="{{ route('consultations.show', $item->id) }}" class="text-dark">
                                            {{ $item->topic }}
                                        </a>
                                    </h4>
                                    <p class="text-muted small" style="line-height: 1.6;">
                                        {{ Str::limit(strip_tags($item->brief_background ?: $item->summary), 140) ?: 'Completed stakeholder review for regulatory reform in Ghana.' }}
                                    </p>
                                </div>

                                <div class="pt-3 border-top mt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="small text-muted fw-bold">
                                            <i class="fa fa-university me-1"></i> {{ Str::limit($item->officer?->org?->org_name ?: 'BRR Secretariat', 30) }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="small text-muted d-flex gap-3">
                                            <span><i class="fa fa-eye me-1"></i> {{ $item->views_count }}</span>
                                            <span><i class="fa fa-comment me-1"></i> {{ $item->responses_count }}</span>
                                        </div>
                                        <a href="{{ route('consultations.show', $item->id) }}" class="btn btn-sm btn-outline-secondary">
                                            View Archive &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">No closed consultations recorded in this view.</p>
                        </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $consultations->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
