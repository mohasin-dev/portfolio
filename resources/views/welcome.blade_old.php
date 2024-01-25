@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
        <!-- Start Preloader -->
        <div class="preloader">
            <div class="preloader-img"></div>
        </div>
        <!-- End Preloader -->

        <!-- Start scroll-top button -->
        <div id="scroll-top-area">
            <a href="#"><span>Scroll Top</span><i class="fas fa-arrow-right"></i></a>
        </div>
        <!-- End scroll-top button -->

        <!--Start Header-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{'/'}}" class="logo">
                            <img src="{{asset('images/logo/'. $settings->logo)}}" data-dark="{{asset('images/logo/'. $settings->logo)}}" alt="logo">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <nav class="menu single-page-nav" id="menu">
                            <ul>
                                <li><a class="home" href="#welcome-area">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#service">Services</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#client-testimonial">Testimonial</a></li>
                                <li><a href="#blog">Blog</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--End Header-->

        <!--Start Welcome Section-->
        <section class="welcome-area animated-text" id="welcome-area">
            <div class="particle particle-default-bg">
                <div id="particles-js"></div>
                <div class="bg-overlay"></div>
                <div class="welcome-overlay"></div>
                <div class="display-table">
                    <div class="display-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="welcome-text">
                                        <div class="type-wrap">
                                            <div id="typed-strings">
                                                <h1>I'm <span>{{$user->name}}</span></h1>
                                                <h1>I'm a <span>{{$user->designation}}</span></h1>
                                            </div>
                                            <span id="typed"></span>
                                        </div>
                                        <p>{{$user->about_me}}</p>
                                        <div class="social-icons">
                                            @foreach ($socialLinks as $link)
                                        <a href="{{$link->url}}"  target="_blank"><i class="{{$link->icon}}"></i></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Welcome Section-->

        <!--Start About Section-->
        <section class="about padding-style1" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="about-text">
                            <p class="title-small">ABOUT ME</p>
                            <h4 class="section-title">
                                Hello! I am {{$user->name}}
                            </h4>
                            <p class="about-text">{{$user->skill}}</p>
                            <div class="skills">
                                @php
                                   $prog = 1;
                                @endphp
                                @foreach ($skills as $skill)
                                    <div class="progressbar-area">
                                        <h6>{{$skill->name}}</h6>
                                        <div class="progress">
                                        <div class="progress-bar prog{{$prog}}" role="progressbar" aria-valuenow="{{$skill->skill_rate}}" aria-valuemin="0" aria-valuemax="100" data-progress="{{$skill->skill_rate}}%">
                                                <span>{{$skill->skill_rate}}%</span>
                                            </div>
                                        </div>
                                    </div>
                                @php
                                    $prog++;
                                @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="about-img">
                            <img src="{{asset('images/user/'. $user->avatar)}}" alt="" class="img-responsive">
                            <div class="img-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End About Section-->


        <!--Start Services Section-->
        <section class="service padding-style1" id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="service-header">
                            <p class="title-small">WHAT I DO</p>
                            <h4 class="section-title">My Services</h4>
                            <p>{{$user->about_service}}</p>
                            <a href="#portfolio" class="btn-style3 service-btn">SEE MY WORKS</a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <!---->
                        <div id="owl-demo-service" class="owl-carousel owl-theme">
                            <!--Start Service Single Item area-->
                            @foreach ($services as $service)
                            <div class="item" >
                                <div class="service-item">
                                    <span><i class="{{$service->service_icon}}" aria-hidden="true"></i></span>
                                    <p class="content-title">{{$service->service_name}}</p>
                                    <div class="content-description">
                                        <p>{{$service->short_description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--End Service Single Item area-->
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--End Services Section-->


        <!--Start Portfolio Section-->
        <section class="portfolio padding-style1" id="portfolio">
            <div class="portfolio-header">
                <p class="title-small">SEE MY WORKS</p>
                <h4 class="section-title">Portfolio</h4>
            </div>
            <div class="portfolio-content">
                <div class="container">

                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="portfolio-content-head">
                                <ul class="controls">
                                    <li class="filter" data-filter="all">ALL</li>
                                    @foreach ($categories as $category)
                                    <li class="filter" data-filter=".{{$category->slug}}">{{$category->name}}</li>
                                    {{-- @php $a = $category->slug @endphp --}}
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs">
                            <div class="portfolio-content-items">

                                    <div class="row">
                                            @foreach ($products as $product)
                                        <div class="col-md-4 col-sm-6 col-xs-12 mix {{$product->category->slug}}">
                                            <div class="portfolio-item">
                                                <div class="portfolio-img">
                                                    <img src="{{asset('images/product/' . $product->image)}}" alt="portfolio" class="img-responsive">
                                                </div>
                                                <div class="portfolio-overlay">
                                                    <div class="overlay-content">
                                                        <div class="overlay-content-item">
                                                            <p class="category">{{$product->title}}</p>
                                                            <a href="#">
                                                                <div class="magnify-icon">
                                                                    <p><span><i class="fa fa-link" aria-hidden="true"></i></span></p>
                                                                </div>
                                                            </a>
                                                            <a href="{{asset('images/product/' . $product->image)}}" data-lightbox="image-1">
                                                                <div class="magnify-icon">
                                                                    <p><span><i class="fa fa-eye" aria-hidden="true"></i></span></p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--End Portfolio Section-->


        <!--Start Personal-detail Section-->
        <section class="personal-detail" id="personal-detail">
            <div class="detail-container">
                <div class="personal-detail-content">
                    <div class="detail-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="details-heading-area">
                                    <div class="detail-table-row">
                                        <div class="detail-table-cell">
                                            <h4>I provide the Best Quality</h4>
                                            <p><p>{{$user->about_quality}}</p></p>
                                            <a href="#contact" class="btn-style3 hire-btn">HIRE ME</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="detail-content-area padding-style2">
                                    <div class="detail-header">
                                        <p class="title-small">SEE MY DETAILS</p>
                                        <h4 class="section-title">My Resume</h4>
                                    </div>
                                    <div class="detail-contents">
                                        <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-briefcase"></i>Experience</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-graduation-cap"></i>Education</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content detail-tab">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                @foreach ($experiences as $experience)
                                                <div class="detail-item">
                                                    <span class="deatil-year">{{$experience->session_start}}-{{$experience->session_end}}</span>
                                                    <h6 class="deatil-title">{{$experience->designation}} - {{$experience->company_name}}</h6>
                                                    <p class="detail-text">{{$experience->description}}</p>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                @foreach ($studies as $study)
                                                <div class="detail-item">
                                                    <span class="deatil-year">{{$study->session_start}}-{{$study->session_end}}</span>
                                                    <h6 class="deatil-title">{{$study->exam_title}} - {{$study->university}}</h6>
                                                    <p class="detail-text">{{$study->description}}</p>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End personal-detail Section-->


        <!--Start Client Testimonial Section Area-->
        <section class="client-testimonial padding-style1" id="client-testimonial">
            <div class="testimonial-header">
                <p class="title-small">TESTIMONIAL</p>
                <h4 class="section-title">What People Say</h4>
            </div>
            <div class="client-area">
                <div class="container">
                    <div class="row">
                        <div id="owl-demo-testimonial" class="owl-carousel owl-theme">
                            <!--Start Client Single design area-->
                            @foreach ($testimonials as $testimonial)
                            <div class="item" style="height: 350px;">
                                <div class="client-img">
                                    <img src="{{asset('images/testimonial/'.$testimonial->image)}}" alt="client">
                                </div>
                                <div class="testimonial-content">
                                    <div class="quote-text">
                                        <p>
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        <span>{{$testimonial->description}}</span>
                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                        </p>
                                        <div class="client-identity">
                                            <p class="name">{{$testimonial->client_name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--End Client Single design area-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Client Testimonial Section Area-->


        <!--Start FunFact Section Area-->
        <section class="fun-fact fun-area padding-style1" id="fun-fact">
            <div class="container">
                <div class="row">
                    @foreach ($counters as $counter)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <!--Start fun-item Area-->
                            <div class="fun-item">
                                <div class="count item-one">
                                    <h3><span class="counter">{{$counter->amount}}</span></h3>
                                    <span class="count-underline"></span>
                                    <h6>{{$counter->title}}</h6>
                                </div>
                            </div>
                            <!--End fun-item Area-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End FunFact Section Area-->


        <!--Start Blog Section Area-->
        <section class="blog padding-style1" id="blog">
            <div class="blog-header">
                <p class="title-small">SEE MY BLOG</p>
                <h4 class="section-title">Latest News</h4>
            </div>
            <div class="blog-content">
                <div class="container">
                    @foreach ($blogs as $blog)
                    @if ($blog->id % 2 == 1)
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="blog-single-item blog-item-margin row">
                                <div class="blog-img left col-md-12 col-lg-6">
                                    <img src="{{asset('images/blog/'.$blog->image)}}" alt="blog1" class="img-responsive">
                                </div>
                                <div class="blog-text col-md-12 col-lg-6">
                                    <p class="blog-title">{{$blog->title}}</p>
                                    <p class="blog-detail">
                                        <span>Date:</span>{{$blog->created_at->diffForHumans()}}
                                        <span>|</span> Posted By <span>{{$blog->user->name}}</span>
                                    </p>
                                    <p class="blog-description">{{$blog->description}}</p>
                                    <a href="#" class="read-more">READ MORE<i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="blog-single-item blog-item-margin row">
                                <div class="blog-text col-md-12 col-lg-6">
                                    <p class="blog-title">{{$blog->title}}</p>
                                    <p class="blog-detail">
                                        {{-- <span>Date:</span>{{$blog->created_at->diffForHumans()}} --}}
                                        <span>Date:</span>{{$blog->created_at->toDateString()}}
                                        <span>|</span> Posted By <span>{{$blog->user->name}}</span>
                                    </p>
                                    <p class="blog-description">{{$blog->description}}</p>
                                    <a href="#" class="read-more">READ MORE<i class="fas fa-angle-double-right"></i></a>
                                </div>
                                <div class="blog-img right col-md-12 col-lg-6">
                                    <img src="{{asset('images/blog/'.$blog->image)}}" alt="blog1" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!--End Blog Section Area-->

        <!--Start Newsletter Section-->
        <section class="newsletter" id="newsletter">
            <div class="container">
                <div class="row">
                    <div class="newsletter-form">
                        <form id="" action="{{ route('subscriber.store') }}" method="POST">
                            @csrf
                            <input type="email" id="mc-email" name="email" class="newsletter-email" placeholder="Type your email here">
                            <button type="submit" class="submit-btn btn-style2">
                                <span>Subscribe</span>
                            </button>
                            <label for="mc-email"></label>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End Newsletter Section-->

        <!--Start Contact Section-->
        <section class="contact padding-style1" id="contact">
            <div class="contact-header">
                <p class="title-small">CONTACT ME</p>
                <h4 class="section-title">Get In Touch</h4>
            </div>
            <div class="contact-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="contact-detail" style="height: 450px">
                                <h6>Contact</h6>
                                <p class="contact-text">Feel free to contact me anytime...</p>
                                <p class="adress">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>Address:</span>
                                    <span class="adress-loc">{{$user->address}}</span>
                                </p>
                                <p class="phone">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>Contact no:</span>{{$user->contact1}} | {{$user->contact2}}
                                </p>
                                <p class="email">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <span>Email:</span>{{$user->email}} | {{$user->email2}}
                                </p>
                                <p>
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <span>Website:</span><a href="#">{{$user->website1}} | {{$user->website2}}</a>
                                </p>
                                <div class="social-icons">
                                    <p>I'm Available In Social:</p>
                                    @foreach ($socialLinks as $item)
                                <a href="{{$item->url}}" target="_blank"><i class="{{$item->icon}}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <div class="contact-form" style="height: 450px">
                                <form class="contact-form-area" action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Name" id="form-name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="email" placeholder="Email" id="form-email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="subject" placeholder="Subject" id="form-subject">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea placeholder="Type here" name="message" id="form-message"></textarea>
                                            <input style=" margin-top: 36px !important;
                                            padding: 10px 42px !important;
                                            border: 0px !important;
                                            margin-bottom: 4px !important;" type="submit" class="submit-btn btn-style1 clearfix" value="Submit">
                                            <div class="result"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Section-->

        <!--Start Footer-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 MH | All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->

@endsection
