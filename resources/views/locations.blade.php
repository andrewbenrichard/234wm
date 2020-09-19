@extends('layouts.app')

@section('content')


    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Locations </h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Our Locations </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <div class="site-wrapper-reveal">
        <!--====================  Accordion area ====================-->
        <div class="accordion-wrapper section-space--ptb_100">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title-wrap Start -->
                        <div class="section-title-wrap text-center section-space--mb_20">
                            <h3 class="heading">We cover most part of Abuja</h3>
                        </div>
                        <!-- section-title-wrap Start -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="faq-wrapper  section-space--mt_40">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn-link ">
                                               Wuse 2 - Abuja Nigeria
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn-link ">
                                               Garki - Abuja Nigeria
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn-link ">
                                               Asokoro - Abuja Nigeria
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Start toggles -->
                        <div class="toggles-wrapper section-space--mt_40">
                            <div class="faq-wrapper">
                                <div id="faq-toggles">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn-link ">
                                                   Maitama - Abuja Nigeria
                                                </button>
                                            </h5>
                                        </div>
                                    </div>
                                     <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn-link ">
                                               Jahi - Abuja Nigeria
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End toggles -->
                    </div>
                </div>
            </div>
        </div>
        <!--====================  Accordion area  ====================-->

    <!--====================  Conact us Section Start ====================-->
        <div class="contact-us-section-wrappaer infotechno-contact-us-bg section-space--ptb_120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-lg-6">
                        <div class="conact-us-wrap-one">
                            <h3 class="heading">Can't find your location? give us a <span class="text-color-primary"> call </span> </h3>

                            <div class="sub-heading">We would get back to you within 2 business days</div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-info-one text-center">
                                <div class="icon">
                                    <span class="fal fa-phone"></span>
                                </div>
                                <h6 class="heading font-weight--reguler">Reach out now!</h6>
                                <h2 class="call-us text-dark"><a href="tel:+23481000000">+23481000000</a></h2>
                                <div class="contact-us-button mt-20">
                                    <a href="/contact-us" class="btn bg-yellow text-dark btn--secondary">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Conact us Section End  ====================-->

        </div>


@endsection