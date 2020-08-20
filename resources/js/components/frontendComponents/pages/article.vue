<template>
  <div>
    <topHeader />

    <!-- Start Page Title Area -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="page-title-content">
              <h2>{{article.article_title}}</h2>
              <ul>
                <li>
                  <a href="/">Home</a>
                </li>
                <li>{{article.article_title}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="blog-details-desc">
              <div class="article-image">
                <img :src="'/assets/img/gallery/' + article.article_img" alt="image" />
              </div>
              <div class="article-content">
                <div class="entry-meta">
                  <ul>
                    <li>
                      <span>Posted On:</span>
                      <a href="#">{{article.article_date}}</a>
                    </li>
                  </ul>
                </div>

                <p>{{article.article_body}}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <aside class="widget-area" id="secondary">
              <section class="widget widget_huruma_posts_thumb">
                <h3 class="widget-title">Popular Posts</h3>

                <article class="item" v-for="article_top in articles_top" :key="article_top.id">
                  <router-link class="thumb" :to="'/article/' + article_top.article_slug">
                    <img :src="'/assets/img/gallery/' + article_top.article_img" alt="image" />
                    <span class="fullimage cover bg1" role="img"></span>
                  </router-link>
                  <div class="info">
                    <time>{{article_top.article_date}}</time>
                    <h4 class="title usmall">
                      <router-link
                        :to="'/article/' + article_top.article_slug"
                      >{{article_top.article_title}}</router-link>
                    </h4>
                  </div>

                  <div class="clear"></div>
                </article>
              </section>
            </aside>
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Details Area -->

    <Bottomfooter />
  </div>
</template>

<script>
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";

export default {
  mounted() {
    this.$route.params;
  },
  components: {
    topHeader,
    Bottomfooter
  },
  data() {
    return {
      article: {
        id: "",
        article_title: "",
        article_body: "",
        article_img: "",
        artice_date: "",
        artice_slug: ""
      },
      articles_top: {}
    };
  },
  computed: {},
  methods: {
    loadArticle() {
      axios
        .get("/api/sc_admin/single/article/" + this.$route.params.slug)
        .then(({ data }) => (this.article = data));
    },
    loadTopArticle() {
      axios
        .get("/api/sc_admin/articles/")
        .then(({ data }) => (this.articles_top = data));
    }
  },
  created() {
    this.loadArticle();
    this.loadTopArticle();
  }
};
</script>
