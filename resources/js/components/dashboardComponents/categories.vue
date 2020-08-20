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
              <button class="btn btn-primary mb-4 mr-2 btn-lg" @click="newCategory">
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
                Add Category
              </button>
            </div>
            <div class="col-md-12">
              <div class="cotainer">
                <div class="row" v-show="firstloading">
                  <button class="btn btn-primary">
                    <div class="spinner-border text-white align-self-center loader-sm"></div>
                  </button>
                  <span>Loading Categories</span>
                </div>
                <div class="row" v-if="categories.length">
                  <div class="col-md-4" v-for="category in categories" :key="category.id">
                    <div class="card component-card_9">
                      <img
                        :src="'/uploads/' + category.category_img"
                        class="card-img-top"
                        alt="widget-card-2"
                      />
                      <div class="card-body">
                        <p class="meta-date">{{ category.category_date }}</p>

                        <h5 class="card-title">{{ category.category_name }}</h5>
                        <p class="card-text">{{ category.category_des }}</p>

                        <div class="meta-info">
                          <div class="meta-user">
                            <div class="user-name">
                              {{
                              category.category_count
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
                    <h5 class="info-heading">No Category Found</h5>
                    <p class="info-text">
                      You've not added any categories, add
                      a category to your new foodie
                      website.
                    </p>
                    <a class="info-link" href="#" @click="newCategory">
                      Add Category
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
        </div>

        <div
          class="modal fade"
          id="newCategory"
          tabindex="-1"
          role="dialog"
          aria-labelledby="MealModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="MealModalLabel">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="createCategory">
                  <div class="modal-body">
                    <div class="form-group">
                      <input
                        v-model="form.category_name"
                        type="text"
                        name="category_name"
                        placeholder="category name"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'category_name'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="category_name"></has-error>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="
                                                    form.category_description
                                                "
                        name="category_description"
                        cols="30"
                        rows="10"
                        placeholder="Category description"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'category_description'
                                                    )
                                                }"
                      ></textarea>
                      <has-error :form="form" field="category_description"></has-error>
                    </div>
                    <div class="form-group">
                      <input
                        name="category_image"
                        @change="CreateImage"
                        type="file"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'category_image'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="category_image"></has-error>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" v-show="!savingBtn" class="btn btn-primary">Create</button>
                    <button class="btn btn-primary" v-show="savingBtn">
                      <div class="spinner-border text-white align-self-center loader-sm"></div>Loading
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <bottomFooter />
      </div>
      <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import topHeader from "./layouts/header.vue";
import sidebar from "./layouts/sidebar.vue";
import bottomFooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      categories: {},
      firstloading: true,
      savingBtn: false,
      form: new Form({
        category_name: "",
        category_image: "",
        category_description: ""
      })
    };
  },
  components: {
    topHeader,
    bottomFooter,
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
        this.form.category_image = reader.result;
        console.log(reader.result);
      };
      reader.readAsDataURL(file);
    },
    newCategory() {
      this.form.reset();
      $("#newCategory").modal("show");
    },
    editModal(meal) {
      this.form.reset();
      $("#newCategory").modal("show");
      this.form.fill(meal);
    },
    deleteCategory(id) {
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
            .delete("/api/sc_admin/delete/category/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire(
                  "Deleted!",
                  "The Category has been deleted.",
                  "success"
                );
              }
              Fire.$emit("AfterCreate");
            })
            .catch(() => {
              Swal("Failed", "There was something wrong.", "warning");
            });
        }
      });
    },
    createCategory() {
      this.$Progress.start();
      this.savingBtn = true;
      this.form
        .post("/api/sc_admin/post/category")
        .then(() => {
          Fire.$emit("AfterCreate");
          $("#newCategory").modal("hide");
          Toast.fire({
            type: "success",
            title: "category created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.savingBtn = false;
        });
    },
    loadCategories() {
      axios
        .get("/api/sc_admin/categories")
        .then(({ data }) => (this.categories = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadCategories();
    });
    this.loadCategories();
    this.firstloading = false;
    this.$Progress.finish();
  }
};
</script>
