@extends('layouts.app')

@section('title', 'Electronic Registry of Business Regulations - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Regulations" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">e-Registry Portal</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.portal') }}">Regulations</a></li>
                            <li class="active">e-Registry</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="portal-section py-5">
    <div class="container">
        <!-- Overview Banner -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-7">
                <h2 class="fw-bold" style="color: #ad2702;">Ghana Electronic Registry of Business Regulations</h2>
                <p class="text-muted" style="line-height: 1.8;">
                    The e-Registry is an authoritative, complete online repository of all business laws, Legislative Instruments (L.I.), Ministerial Directives, Procedures, Forms, and statutory fees in Ghana. It provides transparency and predictability for investors and entrepreneurs.
                </p>
            </div>
            <div class="col-lg-5">
                <form action="{{ route('regulations.portal') }}" method="GET" class="card border-0 shadow-sm p-3 bg-light">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search laws, acts, L.I.s..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search me-1"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Filter by Classification pills -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex gap-2 flex-wrap align-items-center">
                    <span class="text-muted fw-bold small me-2">Classifications:</span>
                    <a href="{{ route('regulations.portal') }}" class="btn btn-sm {{ !request('class_id') ? 'btn-success' : 'btn-outline-secondary' }}">
                        All Regulations ({{ $stats['docs_count'] }})
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('regulations.portal', ['class_id' => $cat->id]) }}" class="btn btn-sm {{ request('class_id') == $cat->id ? 'btn-success' : 'btn-outline-secondary' }}">
                            {{ $cat->name }} ({{ $cat->regulations_count }})
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Browse Categories Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('regulations.by_institution') }}" class="text-decoration-none">
                    <div class="stat-card text-center h-100 border-top border-4 border-success p-4 shadow-sm bg-white rounded">
                        <i class="fa fa-university text-success fa-3x mb-3"></i>
                        <h4 class="fw-bold text-dark">By Institution</h4>
                        <p class="text-muted small">Explore laws by enforcing MDAs and state agencies.</p>
                        <span class="btn btn-sm btn-outline-success">View All &rarr;</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('regulations.by_sector') }}" class="text-decoration-none">
                    <div class="stat-card text-center h-100 border-top border-4 border-primary p-4 shadow-sm bg-white rounded">
                        <i class="fa fa-industry text-primary fa-3x mb-3"></i>
                        <h4 class="fw-bold text-dark">By Sector</h4>
                        <p class="text-muted small">Targeted rules across financial, energy, trade, and agribusiness sectors.</p>
                        <span class="btn btn-sm btn-outline-primary">View All &rarr;</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('regulations.by_subject') }}" class="text-decoration-none">
                    <div class="stat-card text-center h-100 border-top border-4 border-warning p-4 shadow-sm bg-white rounded">
                        <i class="fa fa-book text-warning fa-3x mb-3"></i>
                        <h4 class="fw-bold text-dark">By Subject</h4>
                        <p class="text-muted small">Categorized by Acts, L.I.s, Notices, Guidelines, and Fees.</p>
                        <span class="btn btn-sm btn-outline-warning">View All &rarr;</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('regulations.by_year') }}" class="text-decoration-none">
                    <div class="stat-card text-center h-100 border-top border-4 border-danger p-4 shadow-sm bg-white rounded">
                        <i class="fa fa-calendar text-danger fa-3x mb-3"></i>
                        <h4 class="fw-bold text-dark">By Year</h4>
                        <p class="text-muted small">Chronological legislative index from 1950 to date.</p>
                        <span class="btn btn-sm btn-outline-danger">View All &rarr;</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Registered Documents -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0 text-dark"><i class="fa fa-file-text-o text-success me-2"></i> Registered Business Regulations & Decrees</h4>
                        <span class="text-muted small">Showing {{ $recentDocs->total() }} results</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Regulation Title</th>
                                    <th>Classification</th>
                                    <th>Regulatory Agency</th>
                                    <th>Subject Area</th>
                                    <th>Year</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentDocs as $doc)
                                    <tr>
                                        <td>
                                            <div class="fw-semibold text-dark">{{ $doc->title }}</div>
                                            @if($doc->no)
                                                <small class="badge bg-light text-secondary border">{{ $doc->no }}</small>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success border border-success">{{ $doc->consultationType?->name ?: 'Regulation' }}</span></td>
                                        <td><small class="text-muted">{{ Str::limit($doc->org?->org_name ?: 'Government of Ghana', 30) }}</small></td>
                                        <td><small class="text-muted">{{ Str::limit($doc->subject?->name ?: 'General', 25) }}</small></td>
                                        <td><span class="badge bg-light text-dark">{{ $doc->year ?: 'N/A' }}</span></td>
                                        <td class="text-end">
                                            <a href="{{ route('regulations.show', $doc->id) }}" class="btn btn-sm btn-outline-success">
                                                View Clauses &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">No regulations found matching your query.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $recentDocs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
