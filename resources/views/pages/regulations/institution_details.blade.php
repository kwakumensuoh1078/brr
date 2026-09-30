@extends('layouts.app')

@section('title', $institution->org_name . ' - Business Regulations')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Institution Regulations" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">{{ Str::limit($institution->org_name, 45) }}</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.by_institution') }}">Institutions</a></li>
                            <li class="active">Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="institution-detail py-5">
    <div class="container">
        <!-- Institution Summary Header Card -->
        <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                <div>
                    <span class="badge bg-success mb-2">{{ $institution->org_type ?: 'Regulatory Authority' }}</span>
                    <h2 class="fw-bold mb-2">{{ $institution->org_name }}</h2>
                    @if($institution->org_description)
                        <p class="text-muted mb-2">{{ $institution->org_description }}</p>
                    @endif
                    @if($institution->org_address || $institution->org_location)
                        <p class="text-muted small mb-0">
                            <i class="fa fa-map-marker text-danger me-1"></i> {{ $institution->org_location ?: $institution->org_address }}
                            @if($institution->org_gps)
                                <span class="ms-2 badge bg-light text-dark border">GPS: {{ $institution->org_gps }}</span>
                            @endif
                        </p>
                    @endif
                </div>
                <div class="text-end">
                    <span class="display-6 fw-bold text-success">{{ $institution->regulations_count }}</span>
                    <small class="d-block text-muted text-uppercase fw-semibold">Regulations Enforced</small>
                </div>
            </div>
        </div>

        <!-- Table of Regulations Enforced -->
        <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h4 class="fw-bold mb-0"><i class="fa fa-book text-success me-2"></i> Business Regulations & Decrees</h4>
                <form method="GET" action="{{ route('regulations.institution_details', $institution->org_id) }}" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control form-control-sm"
                           placeholder="Search title or number..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i></button>
                    @if(request('search'))
                        <a href="{{ route('regulations.institution_details', $institution->org_id) }}" class="btn btn-sm btn-outline-secondary">Clear</a>
                    @endif
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title / Law</th>
                            <th>Classification</th>
                            <th>Subject Area</th>
                            <th>Year</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($docs as $doc)
                            <tr>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $doc->title }}</div>
                                    @if($doc->no)
                                        <small class="badge bg-light text-secondary border">{{ $doc->no }}</small>
                                    @endif
                                </td>
                                <td><span class="badge bg-success-subtle text-success border border-success">{{ $doc->consultationType?->name ?: 'Regulation' }}</span></td>
                                <td><small class="text-muted">{{ Str::limit($doc->subject?->name ?: 'General', 30) }}</small></td>
                                <td><span class="badge bg-light text-dark">{{ $doc->year ?: 'N/A' }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('regulations.show', $doc->id) }}" class="btn btn-sm btn-outline-success">
                                        View Clauses &rarr;
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No regulations currently linked to this institution.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $docs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
@endsection
