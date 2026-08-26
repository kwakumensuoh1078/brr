<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BRR Portal - Business Regulatory Reforms, Ghana')</title>
    
    <!-- Meta description -->
    <meta name="description" content="@yield('meta_description', 'Official Ghana Business Regulatory Reforms (BRR) Portal. Providing public consultations, electronic registry of business laws, and B-Ready indicators.')">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Spartan:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/flexslider.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/scss/elements/theme-css.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" id="creote-color-switcher-css" href="{{ asset('assets/css/scss/elements/color-switcher/color.css') }}" type="text/css" media="all" />
    
    <!-- Custom styling & bot protections -->
    <style>
        .hp-field {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            position: absolute !important;
            left: -9999px !important;
        }

        :root {
            --logo-blue: #04b3f6;
            --logo-blue-dark: #0284c7;
            --logo-blue-hover: #0193dd;
        }

        /* Search banner button */
        .search-banner-btn {
            background: #04b3f6 !important;
            border-color: #04b3f6 !important;
            color: #fff !important;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .search-banner-btn:hover {
            background: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #fff !important;
        }

        /* Global Theme Buttons & Colors */
        .btn-success,
        .btn-danger,
        .btn-primary,
        .theme-btn.one,
        .btn-theme-blue {
            background-color: #04b3f6 !important;
            border-color: #04b3f6 !important;
            color: #ffffff !important;
        }
        .btn-success:hover,
        .btn-danger:hover,
        .btn-primary:hover,
        .theme-btn.one:hover,
        .btn-theme-blue:hover {
            background-color: #0284c7 !important;
            border-color: #0284c7 !important;
            color: #ffffff !important;
        }
        .btn-outline-success,
        .btn-outline-danger,
        .btn-outline-primary {
            border-color: #04b3f6 !important;
            color: #0284c7 !important;
        }
        .btn-outline-success:hover,
        .btn-outline-danger:hover,
        .btn-outline-primary:hover {
            background-color: #04b3f6 !important;
            border-color: #04b3f6 !important;
            color: #ffffff !important;
        }

        .badge.bg-success,
        .badge.bg-danger,
        .badge.bg-primary {
            background-color: #04b3f6 !important;
            color: #ffffff !important;
        }
        .text-success,
        .text-danger {
            color: #0284c7 !important;
        }
        .badge-status-approved {
            background-color: #04b3f6 !important;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }
        .badge-status-closed {
            background-color: #7f8c8d !important;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .pagination .page-item.active .page-link {
            background-color: #04b3f6 !important;
            border-color: #04b3f6 !important;
            color: #ffffff !important;
        }
        .pagination .page-link {
            color: #0284c7 !important;
        }

        .stat-card {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }

        /* Perfect Input-Group Alignment for Auth & Form Elements */
        .input-group {
            display: flex !important;
            align-items: stretch !important;
            width: 100% !important;
            margin-bottom: 15px !important;
        }
        .input-group > .input-group-text {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 48px !important;
            min-height: 48px !important;
            max-height: 48px !important;
            padding: 0 16px !important;
            margin: 0 !important;
            background-color: #f8fafc !important;
            border: 1px solid #ced4da !important;
            border-right: none !important;
            border-top-left-radius: 6px !important;
            border-bottom-left-radius: 6px !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            color: #64748b !important;
        }
        .input-group > .form-control,
        .input-group > input {
            height: 48px !important;
            min-height: 48px !important;
            max-height: 48px !important;
            line-height: 48px !important;
            padding: 0 15px !important;
            margin: 0 !important;
            margin-bottom: 0 !important;
            border: 1px solid #ced4da !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 6px !important;
            border-bottom-right-radius: 6px !important;
            flex: 1 1 auto !important;
        }
        .input-group > .form-control:focus,
        .input-group > input:focus {
            border-color: #04b3f6 !important;
            box-shadow: 0 0 0 0.2rem rgba(4, 179, 246, 0.25) !important;
            z-index: 3 !important;
        }

        /* Modal map container full-width fix */
        .modal_popup .modal-popup-inner .post_contet_modal .modal_map_wrapper,
        .modal_popup .modal-popup-inner .post_contet_modal .post_enable {
            display: block !important;
            width: 100% !important;
            height: 380px !important;
            grid-template-columns: none !important;
        }
        .modal_popup .modal-popup-inner .post_contet_modal .modal_map_wrapper iframe,
        .modal_popup .modal-popup-inner .post_contet_modal .post_enable iframe {
            width: 100% !important;
            height: 100% !important;
            min-height: 380px !important;
            display: block !important;
            border: 0 !important;
        }
    </style>
    @stack('styles')
</head>

<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">
            
            <!-- Header Area -->
            <div class="header_area" id="header_contents">
                <header class="main-header header header_v14">
                    @include('partials.menu')
                </header>
            </div>

            <!-- Page Content -->
            <main id="content" class="site-content">
                @include('partials.alerts')
                @yield('content')
            </main>

            <!-- Footer Area -->
            @include('partials.footer')

        </div>
    </div>

    <!-- Mobile Menu Drawer -->
    <div class="crt_mobile_menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form role="search" method="get" action="{{ route('search') }}">
                <input type="search" class="search" placeholder="Search laws, regulations, topics..." value="" name="search" title="Search" />
                <button type="submit" class="sch_btn" aria-label="Search"> <i class="icon-search"></i></button>
            </form>
            <div class="menu-outer">
                <!-- Mobile Navigation injected here via JS -->
            </div>
        </nav>
    </div>

    <!-- Search Modal Popup Overlay -->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><i class="fa fa-times"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <fieldset>
                    <form role="search" method="get" action="{{ route('search') }}">
                        <input type="search" class="search" placeholder="Search laws, regulations, topics, institutions..." value="" name="search" title="Search for:" required>
                        <button type="submit" class="sch_btn" aria-label="Submit search"> <i class="icon-search"></i></button>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Contact & Info Modal Popup -->
    <div class="modal_popup one" id="contact-modal-popup">
        <div class="modal-popup-inner">
            <div class="close-modal"><i class="fa fa-times"></i></div>
            <div class="modal_box">
                <div class="row">
                    <div class="col-lg-5 col-md-12 form_inner">
                        <div class="form_content">
                            <h4 class="mb-3" style="color: #0c1c38; font-weight: 700;">Get In Touch</h4>
                            <form class="contact-form" method="post" action="{{ route('contact.submit') }}" id="contactModalForm">
                                @csrf
                                <p>
                                    <label> Your name<br />
                                        <input type="text" name="name" id="modal_name" size="40" placeholder="Enter Your Name" required /> 
                                        <i class="fa fa-user"></i>
                                    </label>
                                </p>
                                <p>
                                    <label> Your email<br />
                                        <input type="email" name="email" id="modal_email" size="40" placeholder="Enter Your Email" required />
                                        <i class="fa fa-envelope"></i>
                                    </label>
                                </p>
                                <p>
                                    <label> Phone<br />
                                        <input type="tel" name="phone" id="modal_phone" size="40" placeholder="Enter Your Phone Number" /> 
                                        <i class="fa fa-phone"></i>
                                    </label>
                                </p>
                                <p>
                                    <label> Your message<br />
                                        <textarea name="message" id="modal_message" cols="40" rows="4" class="wpcf7-form-control wpcf7-textarea" placeholder="Enter Your Message" required></textarea> 
                                        <i class="fa fa-comments"></i>
                                    </label>
                                </p>
                                <p><input type="submit" value="Submit" id="sendModalMessage" class="theme-btn one" /></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 about_company_inner">
                        <div class="abt_content">
                            <div class="post_contet_modal">
                                <h2>Location Map</h2>
                                <div class="modal_map_wrapper" style="width: 100%; height: 380px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.115799788152!2d-0.20010908543874295!3d5.549846035255101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf90904264d5c7%3A0xd1ebb7f8931a4599!2sMinistry+of+Trade+and+Industry!5e0!3m2!1sen!2sgh!4v1491370888275" width="100%" height="100%" style="border:0; width: 100%; height: 100%; min-height: 380px; display: block;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                            <div class="copright mt-3 text-white">
                                &copy; {{ date('Y') }} BRR Ghana. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top indicator -->
    <div class="prgoress_indicator">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
           <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JavaScripts -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/color-scheme.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/owl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/countdown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/simpleParallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/creote-extension.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Guarantee contact-toggler activates modal popup
            $('.contact-toggler').on('click', function(e) {
                e.preventDefault();
                $('.modal_popup.one').addClass('contact-popup-visible');
            });

            // Close modal button & escape key
            $('.modal_popup .close-modal').on('click', function(e) {
                e.preventDefault();
                $('.modal_popup').removeClass('contact-popup-visible');
            });

            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' || e.keyCode === 27) {
                    $('.modal_popup').removeClass('contact-popup-visible');
                    $('#search-popup').removeClass('popup-visible');
                    $('body').removeClass('crt_mobile_menu-visible');
                }
            });

            // Search toggler
            $('.search-toggler').on('click', function(e) {
                e.preventDefault();
                $('#search-popup').addClass('popup-visible');
            });

            $('#search-popup .close-search, #search-popup .overlay-layer').on('click', function(e) {
                e.preventDefault();
                $('#search-popup').removeClass('popup-visible');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
