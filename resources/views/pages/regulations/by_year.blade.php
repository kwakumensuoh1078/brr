@extends('layouts.app')

@section('title', 'Browse Regulations by Year - Ghana e-Registry')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="By Year" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Browse by Year</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.portal') }}">Regulations</a></li>
                            <li class="active">By Year</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="by-year-section py-5">
    <div class="container">
        <!-- Year Selection Pills -->
        <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
            <h5 class="fw-bold mb-3"><i class="fa fa-calendar text-danger me-2"></i> Select Year of Enactment</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach($years as $yr)
                    <a href="{{ route('regulations.by_year', ['year' => $yr]) }}" class="btn btn-sm {{ $selectedYear == $yr ? 'btn-danger' : 'btn-outline-secondary' }}">
                        {{ $yr }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Table of Regulations for Selected Year -->
        <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0 text-dark">
                    <i class="fa fa-book text-danger me-2"></i> Regulations Enacted in {{ $selectedYear }}
                </h4>
                <span class="badge bg-danger fs-6">{{ $docs->total() }} Regulations</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title / Law</th>
                            <th>Classification</th>
                            <th>Regulatory Agency</th>
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
                                <td><span class="badge bg-light text-dark border">{{ $doc->consultationType?->name ?: 'Regulation' }}</span></td>
                                <td><small class="text-muted">{{ Str::limit($doc->org?->org_name ?: 'Government of Ghana', 30) }}</small></td>
                                <td><small class="text-muted">{{ Str::limit($doc->subject?->name ?: 'General', 25) }}</small></td>
                                <td><span class="badge bg-danger-subtle text-danger border border-danger">{{ $doc->year }}</span></td>
                                <td class="text-end">
                                    <a href="{{ route('regulations.show', $doc->id) }}" class="btn btn-sm btn-outline-danger">
                                        View Clauses &rarr;
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No regulations found enacted in {{ $selectedYear }}.</td>
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
