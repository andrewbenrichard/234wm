<template>
  <div class="componet_holder">
    <topHeader />
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
      <div class="overlay"></div>
      <div class="search-overlay"></div>

      <sidebar />
      <!--  BEGIN CONTENT AREA  -->
      <div id="content" class="main-content">
        <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
            <div class="col-md-12">
              <button class="btn btn-primary mb-4 mr-2 btn-lg" @click="newArticle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-edit"
                >
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
                Add Article
              </button>
            </div>
            <div class="col-md-12">
              <div class="cotainer">
                <div class="row" v-show="firstloading">
                  <button class="btn btn-primary">
                    <div class="spinner-border text-white align-self-center loader-sm"></div>
                  </button>
                  <span>Loading Articles</span>
                </div>
                <div class="row" v-if="articles.length">
                  <div class="col-md-4" v-for="article in articles" :key="article.id">
                    <div class="card component-card_9">
                      <img
                        :src="'/uploads/' + article.article_img"
                        class="card-img-top"
                        alt="widget-card-2"
                      />
                      <div class="card-body">
                        <p class="meta-date">{{ article.article_date }}</p>

                        <h5 class="card-title">{{ article.article_title}}</h5>
                        <p class="card-text">{{ article.article_body}}</p>

                        <div class="meta-info">
                          <div class="meta-user">
                            <div class="user-name">
                              {{
                              article.article_count
                              }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div v-else>
                  <div class="infobox-3">
                    <div class="info-icon">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-box"
                      >
                        <path
                          d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"
                        />
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                        <line x1="12" y1="22.08" x2="12" y2="12" />
                      </svg>
                    </div>
                    <h5 class="info-heading">No Article Found</h5>
                    <p class="info-text">
                      You've not added any article, add
                      a article to your new foodie
                      website.
                    </p>
                    <a class="info-link" href="#" @click="newArticle">
                      Add Article
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-arrow-right"
                      >
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="modal fade"
            id="addNew"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form @submit.prevent="createArticle">
                  <div class="modal-body">
                    <div class="form-group">
                      <input
                        v-model="form.article_title"
                        type="text"
                        name="article_title"
                        placeholder="Article Title"
                        class="form-control"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'article_title'
                                        )
                                    }"
                      />
                      <has-error :form="form" field="article_title"></has-error>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="form.article_body"
                        name="article_body"
                        cols="30"
                        rows="10"
                        placeholder="article_body"
                        class="form-control"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'article_body'
                                        )
                                    }"
                      ></textarea>
                      <has-error :form="form" field="article_body"></has-error>
                    </div>
                    <div class="form-group">
                      <input name="article_img" @change="CreateImage" type="file" />
                      <has-error :form="form" field="article_img"></has-error>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <bottomFooter />
        </div>
        <!--  END CONTENT AREA  -->
      </div>
      <!-- END MAIN CONTAINER -->
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";
import sidebar from "./layouts/sidebar.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      articles: {},
      form: new Form({
        article_title: "",
        article_body: "",
        article_img: ""
      })
    };
  },
  components: {
    topHeader,
    Bottomfooter,
    sidebar
  },
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/user"
    })
  },
  methods: {
    ...mapActions({
      signOutAction: "auth/signOut"
    }),
    signOut() {
      this.signOutAction().then(() => {
        this.$router.replace({
          name: "home"
        });
      });
    },
    CreateImage(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      //   let vm = this;
      reader.onloadend = file => {
        this.form.article_img = reader.result;
      };
      reader.readAsDataURL(file);
    },
    newArticle() {
      this.form.reset();
      $("#addNew").modal("show");
    },
    editArticle(article) {
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(article);
    },
    deleteArticle(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        // send request to the server
        if (result.value) {
          this.form
            .delete("/api/sc_admin/delete/article/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
              }
              Fire.$emit("AfterCreate");
            })
            .catch(() => {
              Swal("Failed", "There was something wrong.", "warning");
            });
        }
      });
    },
    createArticle() {
      this.$Progress.start();
      this.form
        .post("/api/sc_admin/post/article")
        .then(() => {
          Fire.$emit("AfterCreate");
          $("#addNew").modal("hide");
          Toast.fire({
            type: "success",
            title: "User created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
    loadArticle() {
      axios
        .get("/api/sc_admin/articles")
        .then(({ data }) => (this.articles = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadArticle();
    });
    this.loadArticle();
    this.$Progress.finish();
  }
};
</script>
