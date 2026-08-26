@extends('layouts.app')

@section('title', 'Browse Regulations by Institution - Ghana e-Registry')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="By Institution" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Browse by Institution</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.portal') }}">Regulations</a></li>
                            <li class="active">By Institution</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="by-institution-section py-5">
    <div class="container">
        <!-- Search & Filter -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4 bg-light">
                    <form method="GET" action="{{ route('regulations.by_institution') }}">
                        <div class="row g-3">
                            <div class="col-lg-8 col-md-7">
                                <input type="text" name="search" class="form-control" placeholder="Search institutions, ministries, departments, or regulatory authorities..." value="{{ request('search') }}">
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex gap-2">
                                <button type="submit" class="btn btn-success flex-grow-1"><i class="fa fa-search me-1"></i> Search MDAs</button>
                                <a href="{{ route('regulations.by_institution') }}" class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Grid of Institutions -->
        <div class="row g-4">
            @forelse($institutions as $inst)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4 bg-white d-flex flex-column justify-content-between" style="border-radius: 8px; border-left: 4px solid #ad2702;">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-light text-success border border-success">
                                    <i class="fa fa-file-text me-1"></i> {{ $inst->regulations_count }} Regulations
                                </span>
                                @if($inst->org_type)
                                    <small class="text-muted">{{ $inst->org_type }}</small>
                                @endif
                            </div>
                            <h5 class="fw-bold mb-2">
                                <a href="{{ route('regulations.institution_details', $inst->org_id) }}" class="text-dark">
                                    {{ $inst->org_name }}
                                </a>
                            </h5>
                            @if($inst->org_address || $inst->org_location)
                                <p class="text-muted small mb-3">
                                    <i class="fa fa-map-marker text-danger me-1"></i> {{ $inst->org_location ?: $inst->org_address }}
                                </p>
                            @endif
                        </div>

                        <div class="pt-3 border-top mt-3 text-end">
                            <a href="{{ route('regulations.institution_details', $inst->org_id) }}" class="btn btn-sm btn-outline-success">
                                View Enforced Laws &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No institutions found matching your search.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $institutions->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
