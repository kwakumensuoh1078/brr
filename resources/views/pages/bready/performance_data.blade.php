@extends('layouts.app')

@section('title', 'Performance Data - B-Ready Ghana | Business Regulatory Reforms')

@section('content')
<style>
    /* Grid for indicator images and performance scores */
    .perf-grid { 
        display: flex; 
        flex-wrap: wrap; 
        gap: 20px; 
    }
    .perf-card { 
        width: calc(33.333% - 14px); 
        background: #fff; 
        padding: 16px; 
        border: 1px solid #e2e8f0; 
        border-radius: 8px;
        text-align: center; 
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); 
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .perf-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .perf-card .img-wrap {
        min-height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }
    .perf-card img { 
        max-width: 100%; 
        max-height: 90px; 
        height: auto; 
        display: block; 
        margin: 0 auto; 
        object-fit: contain;
    }
    .perf-score { 
        font-size: 26px; 
        font-weight: 800; 
        color: #ad2702; 
    }
    .perf-name { 
        font-size: 14px; 
        font-weight: 700; 
        margin-top: 8px; 
        color: #0c1c38; 
    }
    @media(max-width: 992px) { 
        .perf-card { width: calc(50% - 10px); } 
    }
    @media(max-width: 576px) { 
        .perf-card { width: 100%; } 
    }

    .legend { 
        margin-bottom: 24px; 
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .legend span { 
        display: inline-block; 
        padding: 6px 14px; 
        border-radius: 6px; 
        color: #fff; 
        font-weight: 700; 
        font-size: 13px;
    }
    .pill-1 { background: #ad2702; } 
    .pill-2 { background: #04b3f6; } 
    .pill-3 { background: #0284c7; }
    .pill-4 { background: #64748b; }

    .faq_section.type_two .accordion dt {
        cursor: pointer;
        padding: 14px 18px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        margin-bottom: 8px;
        border-radius: 6px;
        font-weight: 700;
        color: #0c1c38;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .faq_section.type_two .accordion dt:hover {
        background: #f1f5f9;
        color: #ad2702;
    }
    .faq_section.type_two .accordion dd {
        padding: 15px;
        border: 1px solid #e2e8f0;
        border-top: none;
        margin-top: -8px;
        margin-bottom: 12px;
        border-radius: 0 0 6px 6px;
        background: #fff;
    }
</style>

<div class="page_header_default style_one blog_single_pageheader">
    <div class="parallax_cover">
        <div class="simpleParallax">
            <img src="{{ asset('assets/images/gh-banner.png') }}" alt="Performance Data Header" class="img-fluid">
        </div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Performance Data
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <div class="auto-container">
        <div class="auto-container">
            <div class="row default_row">
                <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <main id="main" class="site-main" role="main">
                        <!--===============spacing==============-->
                        <div class="pd_top_35"></div>
                        <!--===============spacing==============-->
                        <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                            <div class="title_all_box style_one dark_color">
                                <div class="title_sections left">
                                    <div class="title" style="color: #ad2702;">Performance Data @if(!empty($narrative?->year))- {{ $narrative->year }} @elseif($latestYear)- {{ $latestYear }} @endif</div>
                                </div>
                            </div>

                            <div class="row no-space mt-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0 ps-0 ps-lg-0 pe-0 pe-lg-0 pe-xl-3">
                                    <div class="row align-items-center mb-4">
                                        <div class="col-md-8">
                                            <div class="description_box">
                                                <p style="line-height: 1.8; color: #475569;">
                                                    {!! nl2br(e($narrative?->general ?? 'The Business Ready (B-READY) project is the World Bank’s flagship benchmarking tool to measure the business and investment climate across economies worldwide. Below is the comprehensive performance breakdown for Ghana across all 10 core indicator topics.')) !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="grid_box _card">
                                                <div class="counter-block style_one count-box p-3 bg-light rounded" style="border-left: 4px solid #ad2702;">
                                                    <div class="content_box">
                                                        <h6 class="fw-bold mb-1">Snapshot ({{ $latestYear }})</h6>
                                                        <p class="small text-muted mb-2">Overall Score Visual</p>
                                                    </div>
                                                    <div class="icon_box icon_yes d-flex align-items-center justify-content-between">
                                                        <div class="icon text-primary">
                                                            <span class="icon-calendar1 fa-2x"></span>
                                                        </div>
                                                        <div class="coun_ter">
                                                            <span class="count-text fw-bold fs-3" style="color: #ad2702;">56.86</span>
                                                            <small class="fw-bold fs-5">%</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pd_bottom_15"></div>
                                        </div>
                                    </div>

                                    <!-- Legend dynamically loaded from pillars -->
                                    <div class="legend">
                                        @foreach($pillars as $p)
                                            <span class="pill-{{ $loop->iteration }}" title="{{ $p->description ?: $p->name }}">{{ $p->name }}</span>
                                        @endforeach
                                    </div>

                                    <h5 class="fw-bold mb-3" style="color: #0c1c38;">Indicator Scores ({{ $latestYear }})</h5>

                                    <div class="perf-grid">
                                        @foreach($indicatorData as $item)
                                            @php
                                                $imgSrc = asset('assets/images/2024_score.png');
                                                if (!empty($item['image'])) {
                                                    if (file_exists(public_path($item['image']))) {
                                                        $imgSrc = asset($item['image']);
                                                    } elseif (file_exists(public_path('assets/images/' . basename($item['image'])))) {
                                                        $imgSrc = asset('assets/images/' . basename($item['image']));
                                                    }
                                                }
                                            @endphp
                                            <div class="perf-card">
                                                <div class="img-wrap">
                                                    <img src="{{ $imgSrc }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/2024_score.png') }}';" alt="{{ $item['indicator']->name }}">
                                                </div>
                                                <div class="perf-score">{{ $item['score'] !== null ? $item['score'] . ' %' : '-' }}</div>
                                                <div class="perf-name">
                                                    <a href="{{ route('bready.topic', $item['indicator']->id) }}" style="color: inherit;">
                                                        {{ $item['indicator']->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- spacing -->
                                    <div class="pd_bottom_25"></div>

                                    <!-- Additional description box -->
                                    <div class="content_box_cn style_one p-4 my-4 bg-light rounded" style="border-left: 4px solid #04b3f6;">
                                        <div class="txt_content">
                                            <h4 class="fw-bold mb-2" style="color: #0c1c38;">How to read this data</h4>
                                            <p class="text-muted mb-0">
                                                This page shows the performance images and scores for each indicator for the latest year available. Click the indicator links in the sidebar to view topic-specific details.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Data by Topics: Accordion Table -->
                                    <h5 class="fw-bold mb-3" style="color: #0c1c38;">Performance Breakdown by Indicator & Pillar</h5>
                                    <div class="faq_section type_two">
                                        <div class="block_faq">
                                            <div class="accordion">
                                                <dl>
                                                    @foreach($indicators as $ind)
                                                        <dt class="faq_header">
                                                            <span><i class="fa fa-angle-right me-2"></i> {{ $ind->name }}</span>
                                                            <span class="icon-play fa fa-chevron-down"></span>
                                                        </dt>
                                                        <dd class="accordion-content" style="display: none;">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped align-middle mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th style="width: 120px;">Year</th>
                                                                            @foreach($pillars as $pl)
                                                                                <th>{{ $pl->name }}</th>
                                                                            @endforeach
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse($yearsList as $yy)
                                                                            <tr>
                                                                                <td class="fw-bold text-dark">{{ $yy }}</td>
                                                                                @foreach($pillars as $pl)
                                                                                    @php
                                                                                        $scoreObj = $allYearPillarScores->first(function($s) use ($pl, $yy) {
                                                                                            return $s->pillar_id == $pl->id && $s->year == $yy;
                                                                                        });
                                                                                    @endphp
                                                                                    <td class="fw-semibold">{{ $scoreObj?->score !== null ? $scoreObj->score . '%' : '-' }}</td>
                                                                                @endforeach
                                                                            </tr>
                                                                        @empty
                                                                            <tr>
                                                                                <td colspan="{{ count($pillars) + 1 }}" class="text-center text-muted">No historical pillar records recorded yet.</td>
                                                                            </tr>
                                                                        @endforelse
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </dd>
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </article>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_35"></div>
                        <!--===============spacing==============-->
                    </main>
                </div>

                <!-- Sidebar -->
                <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                    <div class="service_siderbar side_bar">
                        <!--===============spacing==============-->
                        <div class="pd_top_45"></div>
                        <!--===============spacing==============-->

                        <div class="widgets_grid_box">
                            <div class="widget creote_widget_service_list">
                                <h4 class="widget-title">Ghana's Outlook</h4>
                                <ul class="service_list_box">
                                    @foreach($indicators as $ind)
                                        <li>
                                            <a href="{{ route('bready.topic', $ind->id) }}">{{ $ind->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="widgets_grid_box">
                            <div class="brouchure_box_widget">
                                <div class="widget_content">
                                    <h3>Latest B-Ready Report on Ghana</h3>
                                    <div class="color_white_1 clearfix">
                                        <a href="{{ asset('reports/B-READY_GHANA-2024.pdf') }}" class="theme-btn color_white_1 one" target="_blank">Download Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>

        <!-- Have Your Say Callout -->
        <section class="newsteller style_one bg_dark_1 my-5 rounded overflow-hidden">
            <div class="pd_top_40"></div>
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-md-12">
                        <div class="content text-white">
                            <h2 class="text-white">Have Your Say</h2>
                            <p class="text-white-50 mb-0">Have you experienced any public service that requires reform? Are Government rules and regulations hindering progress of your business? Kindly click on the button to submit your concerns.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 text-lg-end mt-3 mt-lg-0">
                        <div class="color_white_1 clearfix">
                            <a href="{{ route('your_say') }}" class="theme-btn color_white_1 one">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd_bottom_40"></div>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple accordion toggle handler
        var accordionHeaders = document.querySelectorAll('.faq_section.type_two .accordion dt');
        accordionHeaders.forEach(function(header) {
            header.addEventListener('click', function() {
                var content = this.nextElementSibling;
                var isOpen = content.style.display === 'block';
                
                // Close others if desired or toggle current
                if (isOpen) {
                    content.style.display = 'none';
                    this.querySelector('.icon-play')?.classList.replace('fa-chevron-up', 'fa-chevron-down');
                } else {
                    content.style.display = 'block';
                    this.querySelector('.icon-play')?.classList.replace('fa-chevron-down', 'fa-chevron-up');
                }
            });
        });
    });
</script>
@endsection
