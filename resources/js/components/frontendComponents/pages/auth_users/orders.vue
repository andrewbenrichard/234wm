<template>
  <div>
    <topHeader />

    <!-- Start Page Title Area -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="page-title-content">
              <h2>Our Causes</h2>
              <ul>
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li>Our Causes</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Causes Area -->
    <section class="causes-section pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <span>
                <i class="flaticon-ribbon"></i>
                Our Causes
              </span>
              <h2>The causes we care about</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" v-for="project in projects" :key="project.id">
            <div class="single-causes">
              <img :src="'/assets/img/donate/' + project.project_img" alt="image" />
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
          </div>
        </div>
      </div>
    </section>
    <!-- End Causes Area -->

    <Bottomfooter />
  </div>
</template>

<script>
import topHeader from "../layouts/header.vue";
import Bottomfooter from "../layouts/footer.vue";
import paystack from "vue-paystack";

export default {
  mounted() {
    console.log("Donate mounted.");
  },
  components: {
    topHeader,
    Bottomfooter,
    paystack
  },
  data() {
    return {
      projects: {}
    };
  },
  computed: {
    reference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

      return text;
    }
  },
  methods: {
    callback: function(response) {
      console.log(response);
    },
    close: function() {
      console.log("Payment closed");
    },
    loadProjects() {
      axios
        .get("/api/sc_admin/projects")
        .then(({ data }) => (this.projects = data));
    }
  },
  created() {
    this.loadProjects();
    this.$route.params;
  }
};
</script>
