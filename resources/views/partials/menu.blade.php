<section class="header_top">
    <div class="medium-container">
        <div class="row align-items-center">
            <!--Top Left-->
            <div class="col-lg-9 col-md-12">
                <div class="top_left">
                    <ul class="contact_info_two">
                        <li><span class="icon-checked"></span> Welcome to Business Regulatory Reforms Portal!</li>
                        <li class="single"><span class="icon-placeholder"></span> GPS Address: GA-144-0150</li>
                    </ul>
                </div>
            </div>

            <!--Top Right-->
            <div class="col-lg-3 col-md-12">
                <div class="top_right text-end">
                    <ul class="contact_info_two">
                        @auth
                            <li>
                                <span class="fa fa-user me-1 text-white"></span>
                                <span class="text-white fw-bold me-2">{{ Auth::user()->user_fullname ?: Auth::user()->username }}</span>
                            </li>
                            <li class="single">
                                <a href="{{ route('logout.get') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li class="single"><a href="{{ route('register') }}">Sign Up</a></li>
                        @endauth
                        <li>
                            <a href="#" class="has-tooltip" aria-label="Facebook"><span class="fa fa-facebook"></span></a>
                        </li>
                        <li>
                            <a href="#" class="has-tooltip" aria-label="Twitter"><span class="fa fa-twitter"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="header_mid">
    <div class="medium-container">
        <div class="row align-items-center">
            <!--Logo-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="logo midbar_left">
                    <a href="{{ route('home') }}" class="logo navbar-brand">
                        <img src="{{ asset('assets/images/bcp_logo.png') }}" alt="BRR Logo" class="logo_default" style="width: 250px;">
                    </a>
                </div>
            </div>
            <!--Contact Widgets-->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="midbar_mid">
                    <div class="contact_widget">
                        <ul class="contact_info">
                            <li class="single">
                                <span class="icon-telephone"></span>
                                <small>Call Us:</small>
                                <p><a href="tel:+233302962909">(+233) 302 962 909</a></p>
                            </li>
                            <li class="single">
                                <span class="icon-mail"></span>
                                <small>Send Us E-Mail:</small>
                                <p><a href="mailto:info@brr.gov.gh">info@brr.gov.gh | brr@moti.gov.gh</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Mobile Toggle-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 d-lg-none text-end">
                <div class="navbar_togglers hamburger_menu">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
            <!--Contact Us Button-->
            <div class="col-lg-3 d-none d-lg-block text-end">
                <div class="midbar_right">
                    <div class="theme-btn_all">
                        <a class="theme-btn one" href="{{ route('contact') }}">
                            Contact Us
                            <span class="flaticon-arrow"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="navbar_outer get_sticky_header">
    <div class="medium-container">
        <div class="navbar_inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header_content header_content_collapse">
                        <div class="header_menu_box">
                            <div class="navigation_menu">
                                <ul id="myNavbar" class="navbar_nav">
                                    <li class="menu-item nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">
                                            <span>Home</span>
                                        </a>
                                    </li>

                                    <!-- Consultations Dropdown -->
                                    <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('consultations*') || request()->is('cur_consult*') || request()->is('closed_consult*') || request()->is('consult_cal*') ? 'active' : '' }}">
                                        <a href="#" class="dropdown-toggle nav-link">
                                            <span>Consultation</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item nav-item">
                                                <a href="{{ route('consultations.current') }}" class="dropdown-item nav-link">
                                                    <span>Current Consultations</span>
                                                </a>
                                            </li>
                                            <li class="menu-item nav-item">
                                                <a href="{{ route('consultations.closed') }}" class="dropdown-item nav-link">
                                                    <span>Closed Consultations</span>
                                                </a>
                                            </li>
                                            <li class="menu-item nav-item">
                                                <a href="{{ route('consultations.calendar') }}" class="dropdown-item nav-link">
                                                    <span>Consultations Calendar</span>
                                                </a>
                                            </li>
                                            <li class="menu-item nav-item">
                                                <a href="{{ route('consultations.discussions') }}" class="dropdown-item nav-link">
                                                    <span>Discussion Forum</span>
                                                </a>
                                            </li>
                                            <li class="menu-item nav-item">
                                                <a href="{{ route('consultations.polls') }}" class="dropdown-item nav-link">
                                                    <span>Polls & Survey</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                     <!-- Business Regulations Dropdown -->
                                     <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('regulations*') || request()->is('portal*') || request()->is('business_reg*') ? 'active' : '' }}">
                                         <a href="#" class="dropdown-toggle nav-link">
                                             <span>Business Regulations</span>
                                         </a>
                                         <ul class="dropdown-menu">
                                             @php
                                                 $menuConsultTypes = \App\Models\ConsultationType::all();
                                             @endphp
                                             @foreach($menuConsultTypes as $cType)
                                                 <li class="menu-item nav-item">
                                                     <a href="{{ route('regulations.portal', ['class_id' => $cType->id]) }}" class="dropdown-item nav-link">
                                                         <span>{{ $cType->name }}</span>
                                                     </a>
                                                 </li>
                                             @endforeach
                                         </ul>
                                     </li>

                                     <!-- Browse Regulations Dropdown -->
                                     <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('institution*') || request()->is('sector*') || request()->is('subject*') || request()->is('year*') ? 'active' : '' }}">
                                         <a href="#" class="dropdown-toggle nav-link">
                                             <span>Browse Regulations</span>
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('regulations.by_institution') }}" class="dropdown-item nav-link">
                                                     <span>By Institution</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('regulations.by_sector') }}" class="dropdown-item nav-link">
                                                     <span>By Sector</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('regulations.by_subject') }}" class="dropdown-item nav-link">
                                                     <span>By Subject</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('regulations.by_year') }}" class="dropdown-item nav-link">
                                                     <span>By Year of Enactment</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>

                                     <!-- B-Ready Dropdown -->
                                     <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('b-ready*') || request()->is('b_ready*') || request()->is('performance-data*') ? 'active' : '' }}">
                                         <a href="#" class="dropdown-toggle nav-link">
                                             <span>B Ready</span>
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('bready.overview') }}" class="dropdown-item nav-link">
                                                     <span>Overview</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('bready.ghana') }}" class="dropdown-item nav-link">
                                                     <span>Ghana's Outlook</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('bready.performance_data') }}" class="dropdown-item nav-link">
                                                     <span>Performance Data</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>

                                     <!-- Rolling Review Dropdown -->
                                     <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('rolling-review*') || request()->is('roll-review*') ? 'active' : '' }}">
                                         <a href="#" class="dropdown-toggle nav-link">
                                             <span>Rolling Review</span>
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('rolling_review.overview') }}" class="dropdown-item nav-link">
                                                     <span>Overview</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>

                                     <!-- Information Dropdown -->
                                     <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('about*') || request()->is('ref_tracker*') || request()->is('faq*') || request()->is('your_say*') || request()->is('stakeholders*') || request()->is('privacy*') || request()->is('terms*') || request()->is('publications*') ? 'active' : '' }}">
                                         <a href="#" class="dropdown-toggle nav-link">
                                             <span>Information</span>
                                         </a>
                                         <ul class="dropdown-menu">
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('about') }}" class="dropdown-item nav-link">
                                                     <span>About BRR</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('rolling_review.tracker') }}" class="dropdown-item nav-link">
                                                     <span>Reform Tracker</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('faq') }}" class="dropdown-item nav-link">
                                                     <span>FAQs</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('your_say') }}" class="dropdown-item nav-link">
                                                     <span>Have Your Say</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('stakeholders') }}" class="dropdown-item nav-link">
                                                     <span>Key Stakeholders</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('privacy') }}" class="dropdown-item nav-link">
                                                     <span>Privacy Statement</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('terms') }}" class="dropdown-item nav-link">
                                                     <span>Terms of Use</span>
                                                 </a>
                                             </li>
                                             <li class="menu-item nav-item">
                                                 <a href="{{ route('publications') }}" class="dropdown-item nav-link">
                                                     <span>Reform Publications</span>
                                                 </a>
                                             </li>
                                         </ul>
                                     </li>
                                 </ul>
                            </div>
                        </div>

                        <ul class="navbar_nav navbar-mobile navbar_right">
                            <li>
                                <button type="button" class="search-toggler" aria-label="Open Search">
                                    <i class="icon-search"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="contact-toggler" aria-label="Menu">
                                    <i class="icon-menu1"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
