@extends('layouts.app')

@section('title', 'Search Results: ' . $query . ' - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Search Results" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Search Results</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Search: {{ $query }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="search-results-section py-5">
    <div class="container">
        <!-- Search Bar -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group input-group-lg shadow-sm">
                        <input type="text" name="search" class="form-control border-end-0" placeholder="Search laws, regulations, topics, institutions..." value="{{ $query }}" required>
                        <button type="submit" class="btn btn-success px-4"><i class="fa fa-search me-1"></i> Search</button>
                    </div>
                </form>
                <p class="text-muted text-center mt-2 small">Found <strong>{{ $totalResults }}</strong> matching results for "{{ $query }}"</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!-- Registered Regulations -->
                @if(isset($docs) && $docs->count() > 0)
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                        <h4 class="fw-bold mb-3 text-success"><i class="fa fa-book me-2"></i> Regulations & Laws ({{ $docs->count() }})</h4>
                        <div class="list-group list-group-flush">
                            @foreach($docs as $doc)
                                <div class="list-group-item px-0 py-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="fw-bold mb-1">
                                                <a href="{{ route('regulations.show', $doc->id) }}" class="text-dark">
                                                    {{ $doc->title }}
                                                </a>
                                            </h5>
                                            @if($doc->no)
                                                <span class="badge bg-light text-secondary border me-2">{{ $doc->no }}</span>
                                            @endif
                                            <span class="badge bg-success-subtle text-success border border-success">{{ $doc->consultationType?->name ?: 'Regulation' }}</span>
                                            <small class="text-muted ms-2"><i class="fa fa-university me-1"></i> {{ $doc->org?->org_name ?: 'Government of Ghana' }}</small>
                                        </div>
                                        <a href="{{ route('regulations.show', $doc->id) }}" class="btn btn-sm btn-outline-success text-nowrap">View Law &rarr;</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Regulatory Clauses & Specific Provisions -->
                @if(isset($clauses) && $clauses->count() > 0)
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                        <h4 class="fw-bold mb-3 text-primary"><i class="fa fa-list-ol me-2"></i> Specific Legal Provisions & Clauses ({{ $clauses->count() }})</h4>
                        <div class="list-group list-group-flush">
                            @foreach($clauses as $cl)
                                <div class="list-group-item px-0 py-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">
                                                {{ $cl->clause_title ?: 'Section ' . $cl->section }}
                                            </h6>
                                            <small class="text-muted d-block mb-1">
                                                From Law: <strong>{{ $cl->regulation?->title ?: 'Business Regulation' }}</strong>
                                            </small>
                                            <p class="text-muted small mb-0" style="line-height: 1.6;">
                                                {{ Str::limit(strip_tags($cl->details), 150) }}
                                            </p>
                                        </div>
                                        @if($cl->regulation_id)
                                            <a href="{{ route('regulations.show', $cl->regulation_id) }}" class="btn btn-sm btn-outline-primary text-nowrap ms-2">View &rarr;</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Enforcing Institutions -->
                @if(isset($institutions) && $institutions->count() > 0)
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                        <h4 class="fw-bold mb-3 text-dark"><i class="fa fa-university text-success me-2"></i> Regulatory Institutions ({{ $institutions->count() }})</h4>
                        <div class="row g-3">
                            @foreach($institutions as $inst)
                                <div class="col-md-6">
                                    <div class="p-3 border rounded h-100 bg-light">
                                        <h6 class="fw-bold mb-1">
                                            <a href="{{ route('regulations.institution_details', $inst->org_id) }}" class="text-dark">
                                                {{ $inst->org_name }}
                                            </a>
                                        </h6>
                                        <small class="text-muted d-block mb-2">{{ $inst->org_location ?: $inst->org_address }}</small>
                                        <a href="{{ route('regulations.institution_details', $inst->org_id) }}" class="small text-success fw-bold">View Enforced Laws &rarr;</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Public Consultations -->
                @if(isset($consultations) && $consultations->count() > 0)
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                        <h4 class="fw-bold mb-3 text-warning"><i class="fa fa-comments me-2"></i> Public Consultations ({{ $consultations->count() }})</h4>
                        <div class="list-group list-group-flush">
                            @foreach($consultations as $item)
                                <div class="list-group-item px-0 py-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="fw-bold mb-1">
                                                <a href="{{ route('consultations.show', $item->id) }}" class="text-dark">
                                                    {{ $item->topic }}
                                                </a>
                                            </h5>
                                            <p class="text-muted small mb-0">{{ Str::limit(strip_tags($item->brief_background ?: $item->summary), 120) }}</p>
                                        </div>
                                        @if($item->status != 'Closed')
                                            <a href="{{ route('consultations.show', $item->id) }}" class="btn btn-sm btn-outline-warning text-dark text-nowrap ms-2">Participate &rarr;</a>
                                        @else
                                            <a href="{{ route('consultations.show', $item->id) }}" class="btn btn-sm btn-outline-secondary text-nowrap ms-2">View Archive &rarr;</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- B-Ready Indicators -->
                @if(isset($indicators) && $indicators->count() > 0)
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                        <h4 class="fw-bold mb-3 text-danger"><i class="fa fa-line-chart me-2"></i> B-Ready Topic Indicators ({{ $indicators->count() }})</h4>
                        <div class="list-group list-group-flush">
                            @foreach($indicators as $ind)
                                <div class="list-group-item px-0 py-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="fw-bold mb-1">
                                                <a href="{{ route('bready.topic', $ind->id) }}" class="text-dark">
                                                    {{ $ind->name }}
                                                </a>
                                            </h5>
                                            <p class="text-muted small mb-0">{{ Str::limit(strip_tags($ind->description ?: $ind->about), 120) }}</p>
                                        </div>
                                        <a href="{{ route('bready.topic', $ind->id) }}" class="btn btn-sm btn-outline-danger text-nowrap ms-2">Explore Indicator &rarr;</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($totalResults === 0)
                    <div class="card border-0 shadow-sm p-5 bg-white text-center" style="border-radius: 8px;">
                        <i class="fa fa-search fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No results found for "{{ $query }}"</h4>
                        <p class="text-muted">Try using different keywords, broader terms, or browse by category.</p>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="{{ route('regulations.portal') }}" class="btn btn-success">Browse e-Registry</a>
                            <a href="{{ route('consultations.current') }}" class="btn btn-outline-secondary">Browse Consultations</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
