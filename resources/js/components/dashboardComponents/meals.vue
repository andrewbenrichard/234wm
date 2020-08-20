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
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
              <div class="widget widget-table-two">
                <div class="widget-heading">
                  <h5 class>Recent Orders</h5>
                </div>

                <div class="widget-content">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            <div class="th-content">Customer</div>
                          </th>
                          <th>
                            <div class="th-content">Meal</div>
                          </th>
                          <th>
                            <div class="th-content">Order No.</div>
                          </th>
                          <th>
                            <div class="th-content th-heading">Price</div>
                          </th>
                          <th>
                            <div class="th-content">Status</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-7.jpg" alt="avatar" />Andy King
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Nike Sport</div>
                          </td>
                          <td>
                            <div class="td-content">#76894</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$88.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-primary">Shipped</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-4.jpg" alt="avatar" />Irene Collins
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Speakers</div>
                          </td>
                          <td>
                            <div class="td-content">#75844</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$84.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-success">Paid</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-10.jpg" alt="avatar" />Laurie Fox
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Camera</div>
                          </td>
                          <td>
                            <div class="td-content">#66894</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$126.04</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-danger">Pending</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-13.jpg" alt="avatar" />Luke Ivory
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Headphone</div>
                          </td>
                          <td>
                            <div class="td-content">#46894</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$56.07</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-success">Paid</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-5.jpg" alt="avatar" />Ryan Collins
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Sport</div>
                          </td>
                          <td>
                            <div class="td-content">#89891</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$108.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-primary">Shipped</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-6.jpg" alt="avatar" />Nia Hillyer
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Sunglasses</div>
                          </td>
                          <td>
                            <div class="td-content">#26974</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$168.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-primary">Shipped</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content customer-name">
                              <img src="/backend/assets/img/profile-11.jpg" alt="avatar" />Sonia Shaw
                            </div>
                          </td>
                          <td>
                            <div class="td-content product-brand">Watch</div>
                          </td>
                          <td>
                            <div class="td-content">#76844</div>
                          </td>
                          <td>
                            <div class="td-content pricing">
                              <span class>$110.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="badge outline-badge-success">Paid</span>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
              <div class="widget widget-table-three">
                <div class="widget-heading">
                  <h5 class>Top Selling Meals</h5>
                </div>

                <div class="widget-content">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            <div class="th-content">Meals</div>
                          </th>
                          <th>
                            <div class="th-content th-heading">Price</div>
                          </th>
                          <th>
                            <div class="th-content th-heading">Discount</div>
                          </th>
                          <th>
                            <div class="th-content">Sold</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/speaker.jpg" alt="product" />Speakers
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$84.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$10.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">240</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/sunglass.jpg" alt="product" />Sunglasses
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$56.07</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$5.07</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">190</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/watch.jpg" alt="product" />Watch
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$88.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$20.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">66</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/laptop.jpg" alt="product" />Laptop
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$110.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$33.00</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">35</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/camera.jpg" alt="product" />Camera
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$126.04</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$26.04</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">30</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/shoes.jpg" alt="product" />Shoes
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$108.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$47.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">130</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="td-content product-name">
                              <img src="/backend/assets/img/headphones.jpg" alt="product" />Headphone
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="pricing">$168.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">
                              <span class="discount-pricing">$60.09</span>
                            </div>
                          </td>
                          <td>
                            <div class="td-content">170</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="cotainer">
                <div class="row" v-if="meals.length">
                  <div class="col-md-4" v-for="meal in meals" :key="meal.id">
                    <div class="card component-card_9">
                      <img
                        :src="'/uploads/' + meal.meal_img"
                        class="card-img-top"
                        alt="widget-card-2"
                      />
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
                    <h5 class="info-heading">No Meal Found</h5>
                    <p
                      class="info-text"
                    >You've not added any meal, add a meal to your new foodie website.</p>
                    <a class="info-link" href="#" @click="newMeal">
                      Add Meal
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
          id="newMeal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="MealModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="MealModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="createMeal">
                  <div class="modal-body">
                    <div class="form-group">
                      <input
                        v-model="form.meal_name"
                        type="text"
                        name="meal_name"
                        placeholder="name"
                        class="form-control"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_name'
                                        )
                                    }"
                      />
                      <has-error :form="form" field="meal_name"></has-error>
                    </div>
                    <div class="form-group">
                      <input
                        v-model="form.meal_price"
                        type="text"
                        name="meal_price"
                        placeholder="Price"
                        class="form-control"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_price'
                                        )
                                    }"
                      />
                      <has-error :form="form" field="meal_price"></has-error>
                    </div>
                    <div class="form-group" v-if="deliveries.length">
                      <select
                        v-model="form.meal_delivery_type"
                        class="custom-select mb-4"
                        name="meal_delivery_type"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_delivery_type'
                                        )
                                    }"
                      >
                        <option disabled>Open this select menu</option>
                        <option
                          v-for="delivery in deliveries"
                          :key="delivery.id"
                          :value="delivery.id"
                        >{{delivery.delivery_name}} ( {{delivery.package_time}} )</option>
                      </select>
                      <has-error :form="form" field="meal_delivery_type"></has-error>
                    </div>
                    <div class="form-group" v-else>
                      <router-link :to="{name:'delivery-types'}">Add delivery Type</router-link>
                    </div>
                    <div class="form-group" v-if="categories.length">
                      <select
                        v-model="form.meal_category"
                        class="custom-select mb-4"
                        name="meal_category"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_category'
                                        )
                                    }"
                      >
                        <option
                          v-for="category in categories"
                          :key="category.id"
                          :value="category.id"
                        >{{category.category_name}}</option>
                      </select>

                      <has-error :form="form" field="meal_category"></has-error>
                    </div>
                    <div class="form-group" v-else>
                      <option disabled>No category list added</option>
                      <router-link :to="{name:'categories'}">Add category</router-link>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="form.meal_description"
                        name="meal_description"
                        cols="30"
                        rows="10"
                        placeholder="Meal description"
                        class="form-control"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_description'
                                        )
                                    }"
                      ></textarea>
                      <has-error :form="form" field="meal_description"></has-error>
                    </div>
                    <div class="form-group">
                      <input
                        name="meal_image"
                        @change="CreateImage"
                        type="file"
                        :class="{
                                        'is-invalid': form.errors.has(
                                            'meal_image'
                                        )
                                    }"
                      />
                      <has-error :form="form" field="meal_image"></has-error>
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
      meals: {},
      deliveries: {},
      categories: {},
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
    newMeal() {
      this.form.reset();
      $("#newMeal").modal("show");
    },
    editModal(meal) {
      this.form.reset();
      $("#newMeal").modal("show");
      this.form.fill(meal);
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
    createMeal() {
      this.$Progress.start();
      this.savingBtn = true;
      this.form
        .post("/api/sc_admin/post/meal")
        .then(() => {
          Fire.$emit("AfterCreate");
          $("#newMeal").modal("hide");
          this.savingBtn = false;
          Toast.fire({
            type: "success",
            title: "meal created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          this.savingBtn = false;
        });
    },
    laodMeals() {
      axios.get("/api/sc_admin/meals").then(({ data }) => (this.meals = data));
    },
    laodCategories() {
      axios
        .get("/api/sc_admin/categories")
        .then(({ data }) => (this.categories = data));
    },
    loadDeliveryType() {
      axios
        .get("/api/sc_admin/deliveries")
        .then(({ data }) => (this.deliveries = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.laodMeals();
    });
    this.laodMeals();
    this.laodCategories();
    this.loadDeliveryType();
    this.$Progress.finish();
  }
};
</script>