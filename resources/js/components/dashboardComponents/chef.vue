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
            <div
              v-if="chef.chef_name != null"
              class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing"
            >
              <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                  <div class="d-flex justify-content-between">
                    <h3 class>Profile</h3>
                  </div>
                  <div class="text-center user-info">
                    <img :src="'/uploads/' + chef.chef_img" alt="avatar" />
                    <p class>{{chef.chef_name}}</p>
                  </div>
                  <div class="user-info-list">
                    <div class>
                      <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item">
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
                            class="feather feather-coffee"
                          >
                            <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                            <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                            <line x1="6" y1="1" x2="6" y2="4" />
                            <line x1="10" y1="1" x2="10" y2="4" />
                            <line x1="14" y1="1" x2="14" y2="4" />
                          </svg> Chef
                        </li>
                        <li class="contacts-block__item">
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
                            class="feather feather-map-pin"
                          >
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                          </svg>
                          {{chef.chef_location}}
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              v-if="chef.chef_name == null"
              class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing"
            >
              <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">Chef not added</div>
              </div>
            </div>
            <div
              class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing"
              style="margin-bottom:24px;"
            >
              <div class="statbox widget box box-shadow">
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>Site Chef</h4>
                    </div>
                  </div>
                </div>
                <div class="widget-content widget-content-area" style="height: 571px;">
                  <form v-show="!chef.chef_name" @submit.prevent="createChef">
                    <div class="form-row mb-4">
                      <div class="form-group col-md-12">
                        <label for="input_name">Chef name</label>
                        <input
                          v-model="
                                                    form.chef_name
                                                "
                          name="chef_name"
                          type="text"
                          class="form-control"
                          id="input_name"
                          placeholder="Chef Name"
                          :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_name'
                                                    )
                                                }"
                        />
                        <has-error :form="form" field="chef_name"></has-error>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label for="inputAddress">Address</label>
                      <input
                        v-model="
                                                    form.chef_location
                                                "
                        name="chef_location"
                        type="text"
                        class="form-control"
                        id="inputAddress"
                        placeholder="1234 Main St"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_location'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="chef_location"></has-error>
                    </div>
                    <div class="form-group col-md-12">
                      <textarea
                        v-model="
                                                    form.chef_des
                                                "
                        name="chef_des"
                        cols="30"
                        rows="10"
                        placeholder="Category description"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_des'
                                                    )
                                                }"
                      ></textarea>
                      <has-error :form="form" field="chef_des"></has-error>
                    </div>

                    <div class="form-group">
                      <input
                        name="chef_img"
                        @change="CreateImage"
                        type="file"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_img'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="chef_img"></has-error>
                    </div>

                    <button
                      v-show="!savingBtn"
                      type="submit"
                      class="btn btn-primary mt-3"
                    >Create Chef</button>
                    <button class="btn btn-primary" v-show="savingBtn">
                      <div class="spinner-border text-white align-self-center loader-sm"></div>Loading
                    </button>
                  </form>
                  <form v-show="chef.chef_name" @submit.prevent="updateChef">
                    <div class="form-row mb-4">
                      <div class="form-group col-md-12">
                        <label for="input_name">Chef name</label>
                        <input
                          v-model="
                                                    form.chef_name
                                                "
                          name="chef_name"
                          type="text"
                          class="form-control"
                          id="input_name"
                          placeholder="Chef Name"
                          :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_name'
                                                    )
                                                }"
                        />
                        <has-error :form="form" field="chef_name"></has-error>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label for="inputAddress">Address</label>
                      <input
                        v-model="
                                                    form.chef_location
                                                "
                        name="chef_location"
                        type="text"
                        class="form-control"
                        id="inputAddress"
                        placeholder="1234 Main St"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_location'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="chef_location"></has-error>
                    </div>
                    <div class="form-group col-md-12">
                      <textarea
                        v-model="
                                                    form.chef_des
                                                "
                        name="chef_des"
                        cols="30"
                        rows="10"
                        placeholder="Category description"
                        class="form-control"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_des'
                                                    )
                                                }"
                      ></textarea>
                      <has-error :form="form" field="chef_des"></has-error>
                    </div>

                    <div class="form-group">
                      <input
                        name="chef_img"
                        @change="CreateImage"
                        type="file"
                        :class="{
                                                    'is-invalid': form.errors.has(
                                                        'chef_img'
                                                    )
                                                }"
                      />
                      <has-error :form="form" field="chef_img"></has-error>
                    </div>

                    <button
                      v-show="!savingBtn"
                      type="submit"
                      class="btn btn-primary mt-3"
                    >Create Chef</button>
                    <button class="btn btn-primary" v-show="savingBtn">
                      <div class="spinner-border text-white align-self-center loader-sm"></div>Loading
                    </button>
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
import topHeader from "./layouts/header.vue";
import sidebar from "./layouts/sidebar.vue";
import bottomFooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      chef: {
        id: "",
        chef_name: "",
        chef_des: "",
        chef_location: "",
        chef_img: ""
      },
      firstloading: true,
      savingBtn: false,
      form: new Form({
        chef_name: "",
        chef_img: "",
        chef_des: "",
        chef_img: "",
        chef_location: "",
        chef_date: ""
      })
    };
  },
  components: {
    topHeader,
    sidebar,
    bottomFooter
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
        this.form.chef_img = reader.result;
        console.log(reader.result);
      };
      reader.readAsDataURL(file);
    },
    loadStats() {
      axios.get("/api/sc_admin/chef").then(({ data }) => (this.chef = data));
    },
    createChef() {
      this.$Progress.start();
      this.savingBtn = true;
      this.form
        .post("/api/sc_admin/post/chef")
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
    }
  },

  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadStats();
    });
    this.loadStats();
    this.$Progress.finish();
  }
};
</script>