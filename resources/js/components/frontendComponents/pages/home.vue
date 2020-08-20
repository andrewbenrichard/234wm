<template>
  <div class="site-wrapper">
    <topHeader />

    <!-- Banner Section Start Here -->
    <section class="banner">
      <div class="shape-1">
        <img src="assets/front/images/banner/shape/01.png" alt="banner" />
      </div>
      <div class="shape-2">
        <img src="assets/front/images/banner/shape/02.png" alt="banner" />
      </div>
      <div class="banner-area">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-12">
              <div class="banner-content">
                <h2>Fresh meals for you daily...</h2>
                <form action="#">
                  <div class="codexcoder-selectoption">
                    <select name="text">
                      <option value="1">Find A Food</option>
                    </select>
                  </div>
                  <input type="text" name="type" placeholder="Seach meals" />
                  <button type="submit">
                    <i class="icofont-search-2"></i>
                  </button>
                </form>
                <ul>
                  <li>
                    <span>20+</span>Meals
                  </li>
                  <li>
                    <span>6900+</span>People Served
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Banner Section Ending Here -->

    <!-- Food Product Section Start here -->
    <section class="product padding-tb">
      <div class="container">
        <div class="section-header">
          <h3>Our Special Dishes</h3>
          <p>
            Completely network impactful users whereas
            next-generation applications engage out thinking via
            tactical action.
          </p>
        </div>
        <div class="section-wrapper">
          <div class="row">
            <div class="col-xl-4 col-md-6 col-12" v-for="meal in meals" :key="meal.id">
              <div class="p-food-item">
                <div class="p-food-inner">
                  <div class="p-food-thumb">
                    <img :src="'uploads/'+ meal.meal_img" alt="p-food" />
                    <span>{{meal.meal_price}}</span>
                  </div>
                  <div class="p-food-content">
                    <div class="p-food-author">
                      <a href="#">
                        <img :src="'uploads/'+ meal.meal_category_img" alt="food-author" />
                      </a>
                    </div>
                    <h6>
                      <a href="#">{{meal.meal_category}}</a>
                    </h6>
                    <ul class="del-time">
                      <li :v-if="meal.meal_delivery_type != null">
                        <i class="icofont-cycling-alt"></i>
                        <div class="time-tooltip">
                          <div class="time-tooltip-holder">
                            <span class="tooltip-label">{{meal.meal_delivery_type}}</span>
                          </div>
                        </div>
                      </li>
                      <li :v-if="meal.meal_delivery_time != null">
                        <i class="icofont-stopwatch"></i>
                        <div class="time-tooltip">
                          <div class="time-tooltip-holder">
                            <span class="tooltip-label">Pickup time</span>
                            <span class="tooltip-info">
                              You can pickup
                              order in {{meal.meal_delivery_time}}
                              minutes.
                            </span>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <router-link to="/menu" class="food-btn style-2">
              <span>view all menus</span>
            </router-link>
          </div>
        </div>
      </div>
    </section>
    <!-- Food Product Section Ending here -->

    <!-- Food Services Section Start here -->
    <section class="food-services padding-tb">
      <div class="container">
        <div class="section-header">
          <h3>How it Works</h3>
          <p>
            Completely network impactful users whereas
            next-generation applications engage out thinking via
            tactical action.
          </p>
        </div>
        <div class="section-wrapper">
          <div class="service-item">
            <div class="service-inner">
              <div class="service-thumb">
                <img src="assets/front/images/service/01.jpg" alt="food-service" />
                <span>01 step</span>
              </div>
              <div class="service-content">
                <h6>
                  <a href="#">Choose Your Favorite</a>
                </h6>
              </div>
            </div>
          </div>
          <div class="service-item">
            <div class="service-inner">
              <div class="service-thumb">
                <img src="assets/front/images/service/02.jpg" alt="food-service" />
                <span>02 step</span>
              </div>
              <div class="service-content">
                <h6>
                  <a href="#">We Deliver Your Meals</a>
                </h6>
              </div>
            </div>
          </div>
          <div class="service-item">
            <div class="service-inner">
              <div class="service-thumb">
                <img src="assets/front/images/service/03.jpg" alt="food-service" />
                <span>03 step</span>
              </div>
              <div class="service-content">
                <h6>
                  <a href="#">Cash on Delivery</a>
                </h6>
              </div>
            </div>
          </div>
          <div class="service-item">
            <div class="service-inner">
              <div class="service-thumb">
                <img src="assets/front/images/service/04.jpg" alt="food-service" />
                <span>04 step</span>
              </div>
              <div class="service-content">
                <h6>
                  <a href="#">Eat And Enjoy</a>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Food Services Section Ending here -->

    <!-- Popular Food Section Style 2 Start Here -->
    <section class="popular-foods padding-tb">
      <div class="container">
        <div class="section-header">
          <h3>Popular Weekly Foods</h3>
          <p>
            Completely network impactful users whereas
            next-generation applications engage out thinking via
            tactical action.
          </p>
        </div>
        <div class="section-wrapper">
          <div class="row">
            <div class="col-lg-6 col-12" v-for="meal in meals" :key="meal.id">
              <div class="p-food-item style-2">
                <div class="p-food-inner">
                  <div class="p-food-thumb">
                    <img :src="'uploads/'+ meal.meal_img" alt="p-food" />
                    <span>{{meal.meal_price}}</span>
                  </div>
                  <div class="p-food-content">
                    <h6>
                      <a href="#">{{meal.meal_name}}</a>
                    </h6>
                    <!-- TODO:: use for ingredients -->
                    <!-- <div class="p-food-group">
                      <span>Type of food :</span>
                      <a href="#">Beef Roast</a>
                      <a href="#">Pizza</a>
                      <a href="#">Stakes</a>
                    </div>-->
                    <ul class="del-time">
                      <li>
                        <a href="#">
                          <img :src="'uploads/'+ meal.meal_category_img" alt="food-author" />
                        </a>
                      </li>
                      <li :v-if="meal.meal_delivery_type != null">
                        <i class="icofont-cycling-alt"></i>
                        <div class="time-tooltip">
                          <div class="time-tooltip-holder">
                            <span class="tooltip-label">{{meal.meal_delivery_type}}</span>
                          </div>
                        </div>
                      </li>
                      <li :v-if="meal.meal_delivery_time != null">
                        <i class="icofont-stopwatch"></i>
                        <div class="time-tooltip">
                          <div class="time-tooltip-holder">
                            <span class="tooltip-label">Pickup time</span>
                            <span class="tooltip-info">
                              You can pickup
                              order in {{meal.meal_delivery_time}}.
                            </span>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Popular Food Section Style 2 Ending Here -->

    <!-- Popular Home Chef Section Start Here -->
    <section class="popular-chef padding-tb" style="background-color: #fafeff;">
      <div class="container">
        <div class="section-header">
          <h3>Our awesome Chef</h3>
          <p>{{chef.chef_des}}</p>
        </div>
        <div class="section-wrapper">
          <div class="row justify-content-center">
            <div class="col-xl-4 col-md-push-8">
              <div class="chef-item">
                <div class="chef-inner">
                  <div class="chef-thumb">
                    <img src="assets/front/images/chef/01.jpg" alt="food-chef" />
                  </div>
                  <div class="chef-content">
                    <div class="chef-author">
                      <a href="#">
                        <img :src="'/uploads/' + chef.chef_img" alt="chef-author" />
                      </a>
                    </div>
                    <h5>
                      <a href="#">{{chef.chef_name}}</a>
                    </h5>
                    <p>Top Homechef</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Popular Home Chef Section Ending Here -->

    <!-- Testimonial Section Start Here -->
    <section
      class="testimonial padding-tb"
      style="background-image: url(assets/front/css/bg-image/category-bg.jpg); background-size: cover;"
    >
      <div class="container">
        <div class="section-wrapper">
          <div class="quete-thumb">
            <img src="assets/front/images/testimonial/icon/01.jpg" alt="food-quete" />
          </div>
          <div
            id="demo"
            class="carousel slide vert"
            v-for="review in testimonials"
            :key="review.id"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="testi-item">
                  <p>{{review.testimonial_review}}</p>
                  <h6>
                    {{review.testimonial_name}}
                    <span
                      v-show="review.testimonial_job"
                    >({{review.testimonial_job}})</span>
                  </h6>
                  <div class="rating">
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-indicators">
              <div data-target="#demo" data-slide-to="0" class="item active">
                <img :src="'/uploads/' + review.testimonial_image" alt />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section Ending Here -->

    <!-- Blog Section Start here -->
    <section class="blog-section padding-tb">
      <div class="container">
        <div class="section-header">
          <h3>Most Popular Blog</h3>
          <p>
            Completely network impactful users whereas
            next-generation applications engage out thinking via
            tactical action.
          </p>
        </div>
        <div class="section-wrapper">
          <div class="row">
            <div class="col-xl-6 col-12 blog-left">
              <div class="post-item">
                <div class="post-inner">
                  <div class="post-thumb">
                    <a href="#">
                      <img :src="'/uploads/' + top_article.article_img" alt="petuk-blog" />
                    </a>
                  </div>
                  <div class="post-content">
                    <h5>
                      <a href="#">{{top_article.article_title}}</a>
                    </h5>
                    <a href="#" class="date">{{top_article.article_date}}</a>
                    <p>{{top_article.article_body}}</p>
                    <a href="#" class="food-btn">
                      <span>Read More</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-12 blog-right">
              <div class="col-md-6 col-12" v-for="article in articles" :key="article.id">
                <div class="post-item">
                  <div class="post-inner">
                    <div class="post-thumb">
                      <a href="#">
                        <img :src="'/uploads/' + article.article_img" alt="petuk-blog" />
                      </a>
                    </div>
                    <div class="post-content">
                      <h6>
                        <a href="#">{{article.article_title}}</a>
                      </h6>
                      <a href="#" class="date">{{article.article_date}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="all-blog-btn text-center">
            <a href="#" class="food-btn">
              <span>more blog posts</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section Ending here -->

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
  },
  data() {
    return {
      meals: {},
      testimonials: {},
      articles: {},
      chef: {
        id: "",
        chef_name: "",
        chef_des: "",
        chef_location: "",
        chef_img: ""
      },
      top_article: {
        id: "",
        article_title: "",
        article_body: "",
        article_date: "",
        article_img: ""
      }
    };
  },
  methods: {
    loadMeals() {
      axios.get("/api/sc_front/meals").then(({ data }) => (this.meals = data));
    },
    loadChef() {
      axios.get("/api/sc_front/chef").then(({ data }) => (this.chef = data));
    },
    loadTestimonials() {
      axios
        .get("/api/sc_front/testimonials")
        .then(({ data }) => (this.testimonials = data));
    },
    loadTopArticle() {
      axios
        .get("/api/sc_front/top_article")
        .then(({ data }) => (this.top_article = data));
    },
    loadArticles() {
      axios
        .get("/api/sc_front/articles_mini")
        .then(({ data }) => (this.articles = data));
    }
  },
  created() {
    this.loadMeals();
    this.loadChef();
    this.loadTestimonials();
    this.loadTopArticle();
    this.loadArticles();
    this.$route.params;
  }
};
</script>
