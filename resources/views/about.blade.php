@extends('layouts.app')

@section('content')


<div class="site-wrapper-reveal">
    <!--===========  feature-large-images-wrapper  Start =============-->
    <div class="feature-large-images-wrapper section-space--ptb_100">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title-wrap Start -->
                    <div class="section-title-wrap text-center section-space--mb_60">
                        <h6 class="section-sub-title mb-20">Our company</h6>
                        <h3 class="heading">We are experts in <span class="text-color-primary">  solid waste collection </span> and
                             <span class="text-color-primary">   disposal </span> services</h3>
                    </div>
                    <!-- section-title-wrap Start -->
                </div>
            </div>

            <div class="cybersecurity-about-box">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="modern-number-01 number-two">
                            <h2 class="heading  mr-5"><span class="mark-text">2</span>Years’ Experience in the field</h2>
                            <h5 class="heading mt-30">234 Waste Management is the premier provider of solid waste collection, transfer and disposal services in mostly exclusive and secondary markets across Abuja Nigeria. Through our 360 environmental solutions scheduling system, 
                                we are a leading provider of innovative technology in waste disposal services in Abuja Nigeria. 
                        </div>
                    </div>

                    <div class="col-lg-5 ml-auto">
                        <div class="faq-wrapper">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                How can we keep your environment clean? <span> <i class="fas fa-chevron-down"></i>
                                    <i class="fas fa-chevron-up"></i> </span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>By using the 234 Waste Management mobile apps, you can schedule an instant pickup of your trash or set a scheduled weekly, monthly or annually pickup of your wastes. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Do we work with offices?<span> <i class="fas fa-chevron-down"></i>
                                    <i class="fas fa-chevron-up"></i> </span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Yes, We cover both residential areas and commercials areas in Abuja. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--===========  feature-large-images-wrapper  End =============-->


  <!--=========== fun fact Wrapper Start ==========-->
  <div class="fun-fact-wrapper bg-theme-default section-space--pb_30 section-space--pt_60">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 wow move-up">
                <div class="fun-fact--two text-center">
                    <div class="fun-fact__count counter">120</div>
                    <h6 class="fun-fact__text">Happy clients</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow move-up">
                <div class="fun-fact--two text-center">
                    <div class="fun-fact__count counter">32</div>
                    <h6 class="fun-fact__text">Total Pickups</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow move-up">
                <div class="fun-fact--two text-center">
                    <div class="fun-fact__count counter">3</div>
                    <h6 class="fun-fact__text">Pickup Trucks</h6>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 wow move-up">
                <div class="fun-fact--two text-center">
                    <div class="fun-fact__count counter">8</div>
                    <h6 class="fun-fact__text">Locations</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=========== fun fact Wrapper End ==========-->
 <!--============ Contact Us Area Start =================-->
 <div class="contact-us-area appointment-contact-bg section-space--ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-title section-space--mb_50">
                    <h3 class="mb-20">Need a hand?</h3>
                    <p class="sub-title">Reach out to the FCT No. 1 waste management company</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form-wrap">
                    <form id="contact-form" action="https://hasthemes.com/file/mail.php" method="post">
                        <div class="contact-form__two">
                            <div class="contact-input">
                                <div class="contact-inner">
                                    <input name="con_name" type="text" placeholder="Name *">
                                </div>
                                <div class="contact-inner">
                                    <input name="con_email" type="email" placeholder="Email *">
                                </div>
                            </div>
                            <div class="contact-select">
                                <div class="form-item contact-inner">
                                    <span class="inquiry">
                            <select name="inquiry" class="select-item">
                                <option value="Your inquiry about">Your inquiry about</option>
                                <option value="General Information Request">General Information Request</option>
                                <option value="Partner Relations">Partner Relations</option>
                                <option value="Careers">Careers</option>
                                <option value="Subscription ">Subscription</option>
                            </select>
                        </span>
                                </div>
                            </div>
                            <div class="contact-inner contact-message">
                                <textarea name="con_message" placeholder="Please describe what you need."></textarea>
                            </div>
                            <div class="comment-submit-btn">
                                <button class="ht-btn ht-btn-md bg-yellow text-dark" type="submit">Get a free consultation</button>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="contact-info-three text-left">
                    <h6 class="heading font-weight--reguler">Reach out now!</h6>
                    <h3 class="call-us"><a tel="+234-816540000">+234-816540000</a></h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--============ Contact Us Area End =================-->
</div>
@endsection