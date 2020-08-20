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
              <button class="btn btn-primary mb-4 mr-2 btn-lg" @click="newMeal">
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
                Add meal
              </button>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
              <div class="card component-card_9">
                <img :src="'/uploads/' + meal.meal_img" class="card-img-top" alt="widget-card-2" />
                <div class="card-body">
                  <p class="meta-date">{{meal.meal_date}}</p>

                  <h5 class="card-title">{{meal.meal_name}}</h5>
                  <p class="card-text">{{meal.meal_des}}</p>

                  <div class="meta-info">
                    <div class="meta-user">
                      <div class="user-name">{{meal.meal_price}}</div>
                    </div>

                    <div class="meta-action">
                      <div class="meta-likes">
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
                          class="feather feather-heart"
                        >
                          <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
                          />
                        </svg>
                        {{meal.meal_orders}}
                      </div>

                      <div class="meta-view">{{meal.meal_category}}</div>
                    </div>
                  </div>
                  <button
                    @click="editModal(meal)"
                    class="btn btn-dark btn-block mb-2 mr-2 btn-rounded"
                  >
                    Edit
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
                      class="feather feather-edit-2"
                    >
                      <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                    </svg>
                  </button>

                  <router-link
                    :to="'/prime/dashboard/meal/' + meal.meal_slug"
                    class="btn btn-dark btn-block mb-2 mr-2 btn-rounded"
                  >
                    Add gallery
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
                      class="feather feather-image"
                    >
                      <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                      <circle cx="8.5" cy="8.5" r="1.5" />
                      <polyline points="21 15 16 10 5 21" />
                    </svg>
                  </router-link>

                  <button
                    @click="deleteMeal(meal.id)"
                    class="btn btn-danger btn-block mb-2 mr-2 btn-rounded"
                  >
                    Delete
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
                      class="feather feather-trash-2"
                    >
                      <polyline points="3 6 5 6 21 6" />
                      <path
                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
                      />
                      <line x1="10" y1="11" x2="10" y2="17" />
                      <line x1="14" y1="11" x2="14" y2="17" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
              <div class="statbox widget box box-shadow">
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>Form controls</h4>
                    </div>
                  </div>
                </div>
                <div class="widget-content widget-content-area" style="height: 571px;">
                  <form>
                    <div class="form-row mb-4">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="inputEmail4"
                          placeholder="Email"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input
                          type="password"
                          class="form-control"
                          id="inputPassword4"
                          placeholder="Password"
                        />
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label for="inputAddress">Address</label>
                      <input
                        type="text"
                        class="form-control"
                        id="inputAddress"
                        placeholder="1234 Main St"
                      />
                    </div>
                    <div class="form-group mb-4">
                      <label for="inputAddress2">Address 2</label>
                      <input
                        type="text"
                        class="form-control"
                        id="inputAddress2"
                        placeholder="Apartment, studio, or floor"
                      />
                    </div>
                    <div class="form-row mb-4">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" />
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-check pl-0">
                        <div class="custom-control custom-checkbox checkbox-info">
                          <input type="checkbox" class="custom-control-input" id="gridCheck" />
                          <label class="custom-control-label" for="gridCheck">Check me out</label>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Sign in</button>
                  </form>
                </div>
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
import topHeader from "../layouts/header.vue";
import sidebar from "../layouts/sidebar.vue";
import bottomFooter from "../layouts/footer.vue";

export default {
  mounted() {
    this.$route.params;
  },
  data() {
    return {
      meal: {
        id: "",
        meal_name: "",
        meal_image: "",
        meal_des: "",
        meal_category: "",
        meal_price: "",
        meal_delivery_type: ""
      },
      galleries: {},
      savingBtn: false,
      form: new Form({
        meal_name: "",
        meal_image: "",
        meal_des: "",
        meal_category: "",
        meal_price: "",
        meal_delivery_type: ""
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
        this.form.meal_image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    deleteMeal(id) {
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
            .delete("/api/sc_admin/delete/meal/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire(
                  "Deleted!",
                  "The meal menu has been deleted.",
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

    loadMeal() {
      axios
        .get("/api/sc_admin/single/meal/" + this.$route.params.slug)
        .then(({ data }) => (this.meal = data));
    },
    loadGalleries() {
      axios
        .get("/api/sc_admin/galleries/" + this.meal.id)
        .then(({ data }) => (this.galleries = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadMeal();
    });
    this.loadMeal();
    this.loadGalleries();
    this.$Progress.finish();
  }
};
</script>