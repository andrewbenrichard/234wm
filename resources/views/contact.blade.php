@extends('layouts.app')

@section('content')




    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Contact us</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Contact us </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->











    <div class="site-wrapper-reveal">
        <!--====================  Conact us Section Start ====================-->
        <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-lg-6">
                        <div class="conact-us-wrap-one mb-30">
                            <h3 class="heading">Looking for more information? <br><span class="text-color-primary">contact us</span> by filling this form</h3>
                            <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days to get a response from us.</div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-form-wrap">
                                <form id="contact-form" action="" method="post">
                                    <div class="contact-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="con_name" type="text" placeholder="Name *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_email" type="email" placeholder="Email *">
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <input name="con_subject" type="text" placeholder="Subject *">
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="con_message" placeholder="Please describe what you need."></textarea>
                                        </div>
                                        <div class="submit-btn mt-20">
                                            <button class="ht-btn ht-btn-md bg-yellow text-dark" type="submit">Send message</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Conact us Section End  ====================-->



        </div>



@endsection