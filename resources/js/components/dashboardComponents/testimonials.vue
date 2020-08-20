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
              <button class="btn btn-primary mb-4 mr-2 btn-lg" @click="newReview">
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
                Add Testimonial
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
                <div class="row" v-if="testimonials.length">
                  <div class="col-md-4" v-for="review in testimonials" :key="review.id">
                    <div class="card component-card_9">
                      <img
                        :src="'/uploads/' + review.testimonial_image"
                        class="card-img-top"
                        alt="widget-card-2"
                      />
                      <div class="card-body">
                        <p class="meta-date">{{ review.testimonial_date }}</p>

                        <h5 class="card-title">{{ review.testimonial_name }}</h5>
                        <p class="card-text">{{ review.testimonial_review }}</p>
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
                    <h5 class="info-heading">No Testimonial Found</h5>
                    <p class="info-text">
                      You've not added any testimonial, add
                      a testimonial to your new foodie
                      website.
                    </p>
                    <a class="info-link" href="#" @click="newReview">
                      Add Testimonial
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
          id="newReview"
          tabindex="-1"
          role="dialog"
          aria-labelledby="MealModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="MealModalLabel">Add Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="createTestimonial">
                  <div class="modal-body">
                    <div class="form-group">
                      <input
                        v-model="form.testimonial_name"
                        type="text"
                        name="testimonial_name"
                        placeholder="testimonial name"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'testimonial_name'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="testimonial_name"></has-error>
                    </div>
                    <div class="form-group">
                      <input
                        v-model="form.testimonial_job"
                        type="text"
                        name="testimonial_job"
                        placeholder="testimonial Job"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'testimonial_job'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="testimonial_job"></has-error>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="
                                                    form.testimonial_review
                                                "
                        name="testimonial_review"
                        cols="30"
                        rows="10"
                        placeholder="Testimonial description"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'testimonial_review'
                                                    )
                                                }"
                      ></textarea>
                      <has-error :form="form" field="testimonial_review"></has-error>
                    </div>
                    <div class="form-group">
                      <input
                        name="testimonial_image"
                        @change="CreateImage"
                        type="file"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'testimonial_image'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="testimonial_image"></has-error>
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
      testimonials: {},
      firstloading: true,
      savingBtn: false,
      form: new Form({
        testimonial_name: "",
        testimonial_image: "",
        testimonial_review: "",
        testimonial_job: ""
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
        this.form.testimonial_image = reader.result;
        console.log(reader.result);
      };
      reader.readAsDataURL(file);
    },
    newReview() {
      this.form.reset();
      $("#newReview").modal("show");
    },
    editModal(meal) {
      this.form.reset();
      $("#newReview").modal("show");
      this.form.fill(meal);
    },
    deleteTestimonial(id) {
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
            .delete("/api/sc_admin/delete/testimonial/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire(
                  "Deleted!",
                  "The Testimonial has been deleted.",
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
    createTestimonial() {
      this.$Progress.start();
      this.savingBtn = true;
      this.form
        .post("/api/sc_admin/post/testimonial")
        .then(() => {
          Fire.$emit("AfterCreate");
          $("#newReview").modal("hide");
          Toast.fire({
            type: "success",
            title: "testimonial created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.savingBtn = false;
        });
    },
    loadTestimonials() {
      axios
        .get("/api/sc_admin/testimonials")
        .then(({ data }) => (this.testimonials = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadTestimonials();
    });
    this.loadTestimonials();
    this.firstloading = false;
    this.$Progress.finish();
  }
};
</script>
