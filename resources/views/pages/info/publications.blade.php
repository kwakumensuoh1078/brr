@extends('layouts.app')

@section('title', 'Reform Publications - BRR Ghana')

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
                            Publications
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Publications</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <div class="auto-container">
        <div class="row default_row">
            <div id="primary" class="content-area service col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <!--===============spacing==============-->
                    <div class="pd_top_90"></div>
                    <!--===============spacing==============-->

                    <section class="blog_single_details_outer">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Institution</th>
                                        <th>Sector</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($publications as $index => $row)
                                        <tr>
                                            <td>{{ $publications->firstItem() ? $publications->firstItem() + $index : $index + 1 }}</td>
                                            <td style="font-weight: 600;">{{ $row->title }}</td>
                                            <td>{{ $row->pubCat?->name ?: '-' }}</td>
                                            <td>{{ $row->org?->org_name ?: '-' }}</td>
                                            <td>{{ $row->sector?->interest_name ?: '-' }}</td>
                                            <td>{{ $row->description }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No publications available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if(method_exists($publications, 'links'))
                            <div class="d-flex justify-content-center mt-4">
                                {{ $publications->links() }}
                            </div>
                        @endif
                    </section>

                    <!--===============spacing==============-->
                    <div class="pd_bottom_70"></div>
                    <!--===============spacing==============-->
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
