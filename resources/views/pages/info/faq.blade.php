@extends('layouts.app')

@section('title', "Frequently Asked Questions - FAQ's - BRR Ghana")

@section('content')
<div class="page_header_default style_one blog_single_pageheader">
    <div class="parallax_cover">
        <div class="simpleParallax"><img src="{{ asset('assets/images/slider_03.jpg') }}" alt="bg_image" class="img-fluid"></div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            FAQ's
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Information</a></li>
                            <li class="active">FAQ's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <section class="about-section">
        <!--===============spacing==============-->
        <div class="pd_top_30"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <!--===============spacing==============-->
                    <div class="pd_bottom_25"></div>
                    <!--===============spacing==============-->
                    <h3>Frequently Asked Questions</h3>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_25"></div>
                    <!--===============spacing==============-->
                    <div class="faq_section type_two">
                        <div class="block_faq">
                            <div class="accordion">
                                <dl>
                                    @forelse($faqs as $index => $tto)
                                        <dt class="faq_header {{ $index == 0 ? 'active' : '' }}">
                                            {{ $tto->subject }}<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide" style="{{ $index == 0 ? 'display:block;' : '' }}">
                                            <p>
                                                {!! nl2br(e($tto->description)) !!}
                                            </p>
                                        </dd>
                                    @empty
                                        <p class="text-muted">No FAQs found.</p>
                                    @endforelse
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="image_boxes style_two">
                        <div class="image one">
                            <img src="{{ asset('assets/images/about/law3.png') }}" class="img-fluid" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_30"></div>
        <!--===============spacing==============-->
    </section>
</div>
@endsection
