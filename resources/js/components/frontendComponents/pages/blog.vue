<template>
  <div>
    <topHeader />

    <!-- Start Page Title Area -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="page-title-content">
              <h2>Our Blog</h2>
              <ul>
                <li>
                  <a href="/">Home</a>
                </li>
                <li>Our Blog</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title Area -->
    <section class="blog-section pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6" v-for="article in articles" :key="article.id">
            <div class="single-blog">
              <img :src="'/assets/img/gallery/' + article.article_img" alt="image" />

              <div class="content">
                <span>{{article.date}}</span>
                <h3>
                  <router-link :to="'/article/' + article.article_slug">{{article.article_title}}</router-link>
                </h3>

                <router-link class="blog-btn" :to="'/article/' + article.article_slug">Read more +</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
      articles: {}
    };
  },
  computed: {},
  methods: {
    loadArticle() {
      axios
        .get("/api/sc_admin/articles")
        .then(({ data }) => (this.articles = data));
    }
  },
  created() {
    this.loadArticle();
    this.$route.params;
  }
};
</script>
