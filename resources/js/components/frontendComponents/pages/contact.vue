<template>
  <div class="home__holder">
    <topHeader />

    <!-- Page Header Section Start Here -->
    <section class="page-header style-2">
      <div class="container">
        <div class="page-title text-center">
          <h3>Contact Information</h3>
          <ul class="breadcrumb">
            <li>
              <a href="#">Home</a>
            </li>
            <li>Contact</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Contact Us Section Start Here -->
    <section class="contact-information padding-tb pb-xl-0">
      <div class="container">
        <div class="section-wrapper">
          <div class="row">
            <div class="col-lg-6 col-12">
              <h5>Contact Information</h5>
              <div class="post-item">
                <div class="post-thumb">
                  <img src="/assets/front/images/contac/icon/04.png" alt="contact" />
                </div>
                <div class="post-content">
                  <h6>office adress</h6>
                  <p>Suite 02, Level 12, Sahera Tropical Center 218</p>
                  <p>New Elephant Road, Dhaka - 1205</p>
                </div>
              </div>
              <div class="post-item">
                <div class="post-thumb">
                  <img src="/assets/front/images/contac/icon/05.png" alt="contact" />
                </div>
                <div class="post-content">
                  <h6>phone number :</h6>
                  <p>+8801678170593, 01919-264687</p>
                  <p>02-9611936</p>
                </div>
              </div>
              <div class="post-item">
                <div class="post-thumb">
                  <img src="/assets/front/images/contac/icon/06.png" alt="contact" />
                </div>
                <div class="post-content">
                  <h6>email adress :</h6>
                  <p>support@Mezban.com</p>
                </div>
              </div>
              <div class="post-item">
                <div class="post-thumb">
                  <img src="/assets/front/images/contac/icon/07.png" alt="contact" />
                </div>
                <div class="post-content">
                  <h6>website adress</h6>
                  <p>http://readpetuk.com</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <h5>Send Us A Message</h5>
              <form class="d-flex flex-wrap justify-content-between">
                <input type="text" placeholder="Your Name" />
                <input type="text" placeholder="Your Email" />
                <input class="w-100" type="text" placeholder="Subject" />
                <textarea rows="8" placeholder="Your Message"></textarea>
                <button type="submit" class="food-btn style-2">
                  <span>Submit Message</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Us Section Ending Here -->

    <!-- G-Map Section Start Here -->
    <div class="gmaps-section">
      <div class="map-area">
        <iframe
          src="https://maps.google.com/maps?q=new%40codexcoder&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
          style="border:0"
          allowfullscreen
        ></iframe>
      </div>
    </div>
    <!-- G-Map Section Ending Here -->

    <!-- Newsletter Section Start Here -->
    <div class="news-letter">
      <div class="container">
        <div class="section-wrapper">
          <div class="news-title">
            <h3>For Newsletter</h3>
          </div>
          <div class="news-form">
            <form action="https://www.foxcoders.com/">
              <label>
                <input type="email" name="email" placeholder="Enter Your Email" />
              </label>
              <input type="submit" name="submit" value="Subscribe now" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Newsletter Section Ending Here -->

    <Bottomfooter />
  </div>
</template>
<script>
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    topHeader,
    Bottomfooter
  }
};
</script>
