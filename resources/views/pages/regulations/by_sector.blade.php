@extends('layouts.app')

@section('title', 'Browse Regulations by Sector - Ghana e-Registry')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="By Sector" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Browse by Sector</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('regulations.portal') }}">Regulations</a></li>
                            <li class="active">By Sector</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="by-sector-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Left Column: Sectors List -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
                    <h5 class="fw-bold mb-3"><i class="fa fa-industry text-primary me-2"></i> Economic Sectors</h5>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('regulations.by_sector') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 {{ !$selectedSectorId ? 'active bg-primary border-primary' : '' }}">
                            <span>All Sectors</span>
                        </a>
                        @foreach($sectors as $sec)
                            <a href="{{ route('regulations.by_sector', ['sector_id' => $sec->int_id]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 {{ $selectedSectorId == $sec->int_id ? 'active bg-primary border-primary' : '' }}">
                                <span>{{ $sec->interest_name }}</span>
                                <span class="badge {{ $selectedSectorId == $sec->int_id ? 'bg-white text-primary' : 'bg-light text-dark' }} rounded-pill">
                                    {{ $sec->regulations_count }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column: Regulations Table -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h4 class="fw-bold mb-0 text-dark">
                            <i class="fa fa-book text-primary me-2"></i> Sector Regulations
                        </h4>
                        <form method="GET" action="{{ route('regulations.by_sector') }}" class="d-flex">
                            @if($selectedSectorId)
                                <input type="hidden" name="sector_id" value="{{ $selectedSectorId }}">
                            @endif
                            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search in sector..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Regulation Title</th>
                                    <th>Classification</th>
                                    <th>Agency</th>
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
                                        <td><small class="text-muted">{{ Str::limit($doc->org?->org_name ?: 'Government of Ghana', 25) }}</small></td>
                                        <td><span class="badge bg-light text-dark">{{ $doc->year ?: 'N/A' }}</span></td>
                                        <td class="text-end">
                                            <a href="{{ route('regulations.show', $doc->id) }}" class="btn btn-sm btn-outline-primary">
                                                Clauses &rarr;
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No regulations found in this sector.</td>
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
        </div>
    </div>
</section>
@endsection
