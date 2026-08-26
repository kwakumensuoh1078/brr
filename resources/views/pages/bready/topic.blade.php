@extends('layouts.app')

@section('title', $indicator->name . " - Ghana's Business Readiness")

@section('content')
<div id="content" class="site-content">
    <div class="page_header_default style_one">
        <div class="parallax_cover">
            <div class="simpleParallax"><img src="{{ asset('assets/images/gh-banner.png') }}" alt="bg_image" class="cover-parallax"></div>
        </div>
        <div class="page_header_content">
            <div class="auto-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner_title_inner">
                            <div class="title_page">
                                Ghana's Business Readiness
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                            <ul class="breadcrumb m-auto">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active">B-Ready</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="auto-container">
        <div class="row default_row">
            <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <!--===============spacing==============-->
                    <div class="pd_top_20"></div>
                    <!--===============spacing==============-->
                    <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                        <div class="title_all_box style_one dark_color">
                            <div class="title_sections left">
                                <div class="title">{{ $indicator->name }}</div>
                            </div>
                        </div>
                        <div class="row no-space">
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0 ps-0 ps-lg-0 pe-0 pe-lg-0 pe-xl-3">
                                <div class="description_box">
                                    <p align="justify">{{ $indicator->about ?: $indicator->description }}</p>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12 ps-0 ps-lg-0 pe-0 pe-lg-0 ps-xl-3">
                                @php
                                    $latestScore = $scores->first();
                                @endphp
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="content_box">
                                            <h6>Latest Score: {{ $latestScore?->yr ?: '2024' }}</h6>
                                        </div>
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="icon-calendar1"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="{{ $latestScore?->score ?: 0 }}">{{ $latestScore?->score ?: 0 }}</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                @if($latestScore && $latestScore->image)
                                    <div class="simple_image_boxes">
                                        <img src="{{ asset('upload/b_ready/' . $latestScore->image) }}" class="object-fit-cover-center height_455px" alt="Score chart" onerror="this.src='{{ asset('assets/images/2024_score.png') }}'">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($values as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->value }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No indicator parameters available.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        @php
                            $latestPillarYear = $pillarScores->first()?->year ?: '2024';
                            $p1Score = $pillarScores->where('pillar_id', 1)->first()?->score ?: 0;
                            $p2Score = $pillarScores->where('pillar_id', 2)->first()?->score ?: 0;
                            $p3Score = $pillarScores->where('pillar_id', 3)->first()?->score ?: 0;
                        @endphp
                        <h4>Detailed Score for each Pillar - Year {{ $latestPillarYear }}</h4>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                        <section class="section__counter three_column">
                            <div class="grid_show_case grid_layout clearfix">
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="fa fa-eye-slash"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="{{ $p1Score }}">{{ $p1Score }}</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Regulatory Framework</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="fa fa-empire"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="{{ $p3Score }}">{{ $p3Score }}</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Public Service</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="icon-wallet"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="{{ $p2Score }}">{{ $p2Score }}</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Operational Efficiency</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        @foreach($subPillars as $wros)
                            <div class="content_box_cn style_one">
                                <div class="txt_content">
                                    <h3>
                                        <a href="#" target="_blank" rel="nofollow">{{ $wros->name }}</a>
                                    </h3>
                                    <p>{{ $wros->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </article>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_35"></div>
                    <!--===============spacing==============-->
                </main>
            </div>

            <!-- Sidebar matching legacy -->
            <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                <div class="service_siderbar side_bar">
                    <!--===============spacing==============-->
                    <div class="pd_top_85"></div>
                    <!--===============spacing==============-->
                    <div class="widgets_grid_box">
                        <div class="widget creote_widget_service_list">
                            <h4 class="widget-title">Ghana's Outlook</h4>
                            <ul class="service_list_box">
                                @foreach($allIndicators as $ind)
                                    <li class="{{ $ind->id == $indicator->id ? 'current-menu-item' : '' }}">
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
</div>
@endsection
