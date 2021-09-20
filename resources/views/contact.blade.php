@extends('master')
@section('content')

    <script type="text/javascript">
        window.onload = function() {

            if (document.getElementById('showModal')) {

                alert('Send Contact successfully!'); //replace with your own handler
            }

        }
    </script>
    <link rel="stylesheet" href="{{ asset('resources/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    @if (session('message'))

    <input type="hidden" id="showModal" />
    {{Session::forget('message')}}
    
    @endif
    <section class="blog-banner-area" id="contact">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 420px;"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var grayStyles = [{
                                featureType: "all",
                                stylers: [{
                                        saturation: -90
                                    },
                                    {
                                        lightness: 50
                                    }
                                ]
                            },
                            {
                                elementType: 'labels.text.fill',
                                stylers: [{
                                    color: '#A3A3A3'
                                }]
                            }
                        ];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: -31.197,
                                lng: 150.744
                            },
                            zoom: 9,
                            styles: grayStyles,
                            scrollwheel: false
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
                </script>

            </div>


            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Quynh Thang City</h3>
                            <p>Thon 5, X.Quynh Thang, H.Quynh Luu, NA</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:0988092250">0988092250</a></h3>
                            <p>Mon to Sunday 8am to 12pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:lhd17ptit@gmail.com">lhd17ptit@gmail.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <form class="form-contact contact_form" action="{{ url('/send-contact') }}" method="post"
                        id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="phone" id="phone" type="number"
                                        placeholder="Enter Your Phone Number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="content" id="content"
                                        cols="30" rows="7" placeholder="Enter Content"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Send Contact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('resources/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/skrollr.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/jquery.form.js') }}"></script>
    <script src="{{ asset('resources/vendors/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/contact.js') }}"></script>
    <script src="{{ asset('resources/vendors/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('resources/vendors/mail-script.js') }}"></script>
    <script src="{{ asset('resources/js/main.js') }}"></script>
@endsection
