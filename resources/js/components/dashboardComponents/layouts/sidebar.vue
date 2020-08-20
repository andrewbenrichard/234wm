<template>
  <div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
      <div class="shadow-bottom"></div>
      <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'admin'}">
            <div class>
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
                class="feather feather-home"
              >
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              <span>Dashboard</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'meals'}">
            <div class>
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
                class="feather feather-layers"
              >
                <polygon points="12 2 2 7 12 12 22 7 12 2" />
                <polyline points="2 17 12 22 22 17" />
                <polyline points="2 12 12 17 22 12" />
              </svg>
              <span>Meals / Menus</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'orders'}">
            <div class>
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
                class="feather feather-shopping-bag"
              >
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
              </svg>
              <span>Orders</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'customers'}">
            <div class>
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
                class="feather feather-users"
              >
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
              <span>Customers</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'chefs'}">
            <div class>
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
                class="feather feather-user"
              >
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
              <span>Chefs</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <router-link aria-expanded="false" class="dropdown-toggle" :to="{name:'blog'}">
            <div class>
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
                class="feather feather-file-text"
              >
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                <polyline points="14 2 14 8 20 8" />
                <line x1="16" y1="13" x2="8" y2="13" />
                <line x1="16" y1="17" x2="8" y2="17" />
                <polyline points="10 9 9 9 8 9" />
              </svg>
              <span>Blog</span>
            </div>
          </router-link>
        </li>
        <li class="menu">
          <a href="#categories" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
            <div class>
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
                class="feather feather-home"
              >
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              <span>categories & Tags</span>
            </div>
            <div>
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
                class="feather feather-chevron-right"
              >
                <polyline points="9 18 15 12 9 6" />
              </svg>
            </div>
          </a>
          <ul
            class="collapse submenu list-unstyled"
            id="categories"
            data-parent="#accordionExample"
          >
            <li>
              <router-link :to="{name:'categories'}">Categories</router-link>
            </li>
            <li>
              <router-link :to="{name:'testimonials'}">Testimonials</router-link>
            </li>
            <li>
              <router-link :to="{name:'meal-contents'}">Meals Contents</router-link>
            </li>
            <li>
              <router-link :to="{name:'meal-ingredients'}">Meals Ingredients</router-link>
            </li>
            <li>
              <router-link :to="{name:'delivery-types'}">Delivery Types</router-link>
            </li>
          </ul>
        </li>
        <li class="menu">
          <a href="#settings" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
            <div class>
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
                class="feather feather-home"
              >
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              <span>settings</span>
            </div>
            <div>
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
                class="feather feather-chevron-right"
              >
                <polyline points="9 18 15 12 9 6" />
              </svg>
            </div>
          </a>
          <ul class="collapse submenu list-unstyled" id="settings" data-parent="#accordionExample">
            <li class="active">
              <a href="index.html">Sales</a>
            </li>
            <li>
              <a href="index2.html">Analytics</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- <div class="shadow-bottom"></div> -->
    </nav>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  mounted() {
    console.log("header mounted.");
  },
  data: () => ({
    activeItem: 0
  }),
  computed: {},
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
    }
  }
};
</script>
