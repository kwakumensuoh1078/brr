@extends('layouts.app')

@section('title', 'Consultations & Workshops Calendar - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Calendar" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Consultations Calendar</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Calendar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="calendar-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="fw-bold">Scheduled Public Consultations & Stakeholder Engagements</h3>
                <p class="text-muted">Stay informed about upcoming dates, review windows, and reform themes across Ghana.</p>
            </div>

            <div class="col-12">
                <form method="GET" action="{{ route('consultations.calendar') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                               placeholder="Search consultations by topic, background..."
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search me-1"></i> Search</button>
                        @if(request('search'))
                            <a href="{{ route('consultations.calendar') }}" class="btn btn-outline-secondary">Clear</a>
                        @endif
                    </div>
                </form>
                <div class="table-responsive bg-white rounded shadow-sm p-3">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark" style="background-color: #ad2702;">
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Consultation / Reform Topic</th>
                                <th>Sponsoring Institution</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($workshops as $workshop)
                                <tr>
                                    <td class="fw-bold text-nowrap">
                                        <i class="fa fa-calendar text-success me-1"></i>
                                        {{ $workshop->start_date ?: 'Ongoing' }}
                                    </td>
                                    <td class="text-nowrap text-muted">
                                        {{ $workshop->end_date ?: 'Open' }}
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $workshop->topic }}</div>
                                        <small class="text-muted">{{ Str::limit(strip_tags($workshop->brief_background ?: $workshop->summary), 90) }}</small>
                                    </td>
                                    <td>
                                        <small class="fw-semibold text-success">
                                            <i class="fa fa-university me-1"></i>
                                            {{ Str::limit($workshop->officer?->org?->org_name ?: 'BRR Secretariat', 30) }}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge {{ $workshop->status == 'Closed' ? 'bg-secondary' : 'bg-success' }}">
                                            {{ $workshop->status ?: 'Active' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('consultations.show', $workshop->id) }}" class="btn btn-sm btn-outline-success text-nowrap">
                                            Details &rarr;
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No scheduled consultations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $workshops->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
