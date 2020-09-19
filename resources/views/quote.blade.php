@extends('layouts.app')

@section('content')

   
<!-- breadcrumb-area end -->

<div class="site-wrapper-reveal">
   
    <!--============ Contact Us Area Start =================-->
    <div class="contact-us-area infotechno-contact-us-bg section-space--pt_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="image">
                        <img class="img-fluid" src="/public/front/images/banners/recycle_home.gif" alt="">
                    </div>
                </div>

                

<div class="col-lg-5 mr-auto ml-auto col-md-6">
    <div class="business-solution-form-wrap mr-auto ml-auto">
        <div class="contact-title text-center section-space--mb_40">
            <h5 class="mb-10">Request a Quote</h5>
            <p class="text">Get a dedicated waste pickup quote schedule.</p>
        </div>
        <form action="#" method="post">
            <div class="contact-form__two">
                <div class="contact-inner">
                    <input name="name" type="text" placeholder="Name *">
                </div>
                <div class="contact-inner">
                    <input name="email" type="email" placeholder="Email *">
                </div>
                <div class="contact-inner">
                    <input name="number" type="number" placeholder="Phone Number *">
                </div>
                <div class="contact-select">
                    <div class="form-item contact-inner">
                        <span class="inquiry">
                    <select name="inquiry" class="select-item">
                        <option value="Your inquiry about">Your Location</option>
                        <option value="General Information Request">Wuse 2</option>
                        <option value="Partner Relations">Garki</option>
                        <option value="Careers">Jahi</option>
                        <option value="Software Licencing">Maitama</option>
                    </select>
                </span>
                    </div>
                </div>
                <div class="comment-submit-btn text-center">
                    <button class="ht-btn ht-btn-md bg-yellow text-dark" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
    <!--============ Contact Us Area End =================-->

</div>

@endsection