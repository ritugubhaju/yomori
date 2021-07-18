@extends ('frontend.layouts.app')
@section('content')

    <!-- START SECTION BREADCRUMB -->
    <section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h1>About Us</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('about') }}">About us</a></li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION BANNER -->

    <!-- START SECTION COURSE DETAIL -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single_post">
                        <div class="blog_img">
                            <a href="#">
                                <img src="{{asset('assets/images/about_bg.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="single_post_content">
                            <div class="blog_text">
                                <h4>yomori</h4>
                            </div>
                            <p>KC Constructions is owned by the yomori of Companies, a conglomerate involved in the manufacture of food, hydropower, insurance, education , Construction and banking sector. yomori established Himshree Foods in 1981.

Additionally, in 1998, yomori also founded Machhapuchchhre Bank, the first commercial bank of Nepal based in the western region of the country. Almost two decades later, the group further entered the insurance business in 2017 having major stake of Sun Nepal Life Insurance.Starting from 2005, yomori has made extensive investments in the hydropower sector.</p>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                    <div class="sidebar">

                            <div class="widget widget_recent_post ">
                                <h5 class="widget_title">Sectors</h5>

                                <ul lass="recent_post border_bottom_dash list_none">
                                    @foreach($sectors as $sector) 
                                        <li>
                                            <div class="post_footer mb-3">
                                                <div class="post_img">
                                                    <a href="{{route('sectors.detail',$sector->slug)}}"><img src="{{asset($sector->thumbnail_path)}}"
                                                                     alt="{{$sector->title}}"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('sectors.detail',$sector->slug)}}">{{$sector->title}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                        
                                </ul>
                            </div>
                 
                            <div class="widget widget_recent_post mt-5 ">
                                <h5 class="widget_title">Recent Projects</h5>
                                <ul class="recent_post border_bottom_dash list_none">
                                    
                                     @foreach($projectses as $projects)
                                        <li>
                                            <div class="post_footer">
                                                <div class="post_img">
                                                    <a href="{{route('projects.detail',$projects->slug)}}"><img src="{{asset($projects->thumbnail_path)}}"
                                                                    ></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('projects.detail',$projects->slug)}}">{{$projects->title}}</a></h6>
                                                    @if(!empty($events->events_date))
                                                    <span class="post_date">{{$events->events_date->format('M d, Y')}}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION COURSE DETAIL -->

@stop