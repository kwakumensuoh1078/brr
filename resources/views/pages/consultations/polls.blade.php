@extends('layouts.app')

@section('title', 'Polls & Survey - BRR Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Polls" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Polls & Surveys</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('consultations.current') }}">Consultations</a></li>
                            <li class="active">Polls</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="polls-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Active Policy & Regulation Polls</h3>
                <p class="text-muted">Participate in quick surveys to let government know how business regulations impact your operations in real time.</p>

                <div class="d-flex flex-column gap-4 mt-4">
                    @forelse($polls as $poll)
                        <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 8px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-success"><i class="fa fa-bar-chart me-1"></i> Public Poll</span>
                                <small class="text-muted"><i class="fa fa-users me-1"></i> {{ number_format($poll->votes->count()) }} votes cast</small>
                            </div>
                            <h4 class="fw-bold fs-5 mb-2">{{ $poll->title }}</h4>
                            @if($poll->description)
                                <p class="text-muted small mb-3">{{ $poll->description }}</p>
                            @endif

                            @foreach($poll->questions as $q)
                                <div class="p-3 bg-light rounded mb-3">
                                    <h6 class="fw-bold mb-3">{{ $q->question }}</h6>
                                    <form action="{{ route('consultations.vote_poll', $poll->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="question_id" value="{{ $q->id }}">
                                        
                                        @php
                                            $opts = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $q->options ?: 'Very Satisfied,Satisfied,Neutral,Dissatisfied,Very Dissatisfied')));
                                            $totalQVotes = $q->answers->count() ?: 1;
                                        @endphp

                                        <div class="list-group mb-3">
                                            @foreach($opts as $opt)
                                                @php
                                                    $optCount = $q->answers->where('answer', $opt)->count();
                                                    $pct = round(($optCount / $totalQVotes) * 100);
                                                @endphp
                                                <label class="list-group-item d-flex align-items-center justify-content-between p-3 border mb-2 rounded cursor-pointer bg-white">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-3" type="radio" name="option" value="{{ $opt }}" required>
                                                        <span>{{ $opt }}</span>
                                                    </div>
                                                    <span class="badge bg-light text-dark fw-normal">{{ $pct }}% ({{ $optCount }})</span>
                                                </label>
                                            @endforeach
                                        </div>

                                        <button type="submit" class="btn btn-sm btn-success px-3">
                                            <i class="fa fa-check me-1"></i> Submit Response
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="card border-0 shadow-sm p-5 text-center bg-white">
                            <i class="fa fa-bar-chart fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No active polls at the moment</h5>
                            <p class="text-muted small">Please check back soon for upcoming regulatory satisfaction surveys.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm p-4 bg-light">
                    <h5 class="fw-bold mb-3"><i class="fa fa-shield text-success me-2"></i> Transparent & Secure</h5>
                    <p class="small text-muted">All poll responses are aggregated anonymously to guide the Technical Working Groups and the Ministry of Trade & Industry on regulatory reviews.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
