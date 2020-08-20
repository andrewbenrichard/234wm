<template>
  <div>
    <topHeader />

    <!-- Page Header Section Start Here -->
    <section class="page-header">
      <div class="shape-1">
        <img src="/assets/front/images/banner/shape/01.png" alt="banner" />
      </div>
      <div class="shape-2">
        <img src="/assets/front/images/banner/shape/02.png" alt="banner" />
      </div>
      <div class="container">
        <div class="page-title text-center">
          <h3>Most Popular Menus</h3>
          <ul class="breadcrumb">
            <li>
              <a href="#">Home</a>
            </li>
            <li>Menus</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Popular Food Section Start Here -->
    <section class="popular-foods padding-tb style-2">
      <div class="container">
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
        </div>
      </div>
    </section>
    <!-- Popular Food Section Ending Here -->

    <!-- <div class="col-lg-4 col-md-6" v-for="project in projects" :key="project.id">
            <div class="single-causes">
              <img :src="'//assets/front/img/donate/' + project.project_img" alt="image" />
              <div class="icon">
                <i class="flaticon-book-1"></i>
              </div>

              <div class="causes-content">
                <span>#Education</span>
                <h3>{{ project.project_name }}</h3>
                <p>{{ project.project_des }}</p>

                <router-link class="causes-btn-one" :to="'/donate/' + project.project_slug">
                  Donate Now
                  <i class="flaticon-right"></i>
                </router-link>
              </div>
            </div>
    </div>-->
    <Bottomfooter />
  </div>
</template>

<script>
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Donate mounted.");
  },
  components: {
    topHeader,
    Bottomfooter
  },
  data() {
    return {
      meals: {}
    };
  },
  methods: {
    loadArticle() {
      axios.get("/api/sc_front/meals").then(({ data }) => (this.meals = data));
    }
  },
  created() {
    this.loadArticle();
    this.$route.params;
  }
};
</script>
