@extends('layouts.app')

@section('title', 'Key Stakeholders - BRR Ghana')

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
                            Stakeholders
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Stakeholders</a></li>
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
                                        <th>No.</th>
                                        <th>Organization</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Website</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($institutions as $index => $row)
                                        <tr style="text-align: left;">
                                            <td>{{ $institutions->firstItem() ? $institutions->firstItem() + $index : $index + 1 }}</td>
                                            <td style="font-weight: 600; width: 300px;">{{ $row->org_name }}</td>
                                            <td>
                                                @if($row->org_email)
                                                    <a href="mailto:{{ $row->org_email }}">{{ $row->org_email }}</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $row->org_tel ?: '-' }}</td>
                                            <td>
                                                @if($row->org_website)
                                                    <a href="{{ Str::startsWith($row->org_website, ['http://', 'https://']) ? $row->org_website : 'https://' . $row->org_website }}" target="_blank" rel="noopener noreferrer">
                                                        {{ $row->org_website }}
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">No organizations found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if(method_exists($institutions, 'links'))
                            <div class="d-flex justify-content-center mt-4">
                                {{ $institutions->links() }}
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
