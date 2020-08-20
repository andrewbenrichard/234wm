<template>
  <div>
    <div class="form-container">
      <div class="form-form">
        <div class="form-form-wrap">
          <div class="form-container">
            <div class="form-content">
              <h1 class>
                Log In to
                <a href="index.html">
                  <span class="brand-name">CORK</span>
                </a>
              </h1>
              <p class="signup-link">
                New Here?
                <a href="auth_register.html">Create an account</a>
              </p>
              <form class="text-left" @submit.prevent="submit" @keydown="form.onKeydown($event)">
                <div class="form">
                  <div id="username-field" class="field-wrapper input">
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
                    <input
                      v-model="form.email"
                      type="text"
                      name="email"
                      class="form-control"
                      :class="{
                                    'is-invalid': form.errors.has('email')
                                }"
                    />
                    <has-error :form="form" field="email"></has-error>
                  </div>

                  <div id="password-field" class="field-wrapper input mb-2">
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
                      class="feather feather-lock"
                    >
                      <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                      <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <input
                      v-model="form.password"
                      type="password"
                      name="password"
                      class="form-control"
                      :class="{
                                    'is-invalid': form.errors.has('password')
                                }"
                    />
                  </div>
                  <div class="d-sm-flex justify-content-between">
                    <div class="field-wrapper">
                      <button type="submit" class="btn btn-primary" value>Log In</button>
                    </div>
                  </div>

                  <div class="field-wrapper">
                    <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                  </div>
                </div>
              </form>
              <p class="terms-conditions">
                © 2019 All Rights Reserved.
                <a href="index.html">CORK</a> is a product of Designreset.
                <a href="javascript:void(0);">Cookie Preferences</a>,
                <a href="javascript:void(0);">Privacy</a>, and
                <a href="javascript:void(0);">Terms</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="form-image">
        <div class="l-image"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      form: new Form({
        email: "",
        password: "",
        remember: false
      })
    };
  },
  methods: {
    ...mapActions({
      signIn: "api/webapp/auth/signin"
    }),
    submit() {
      this.signIn(this.form)
        .then(() => {
          window.location.href = "/dashboard";
        })
        .catch(() => {
          console.log("failed");
        });
    },
    login() {
      // Submit the form via a POST request
      this.form.post("api/webapp/auth/signin").then(({ data }) => {
        console.log(data);
      });
    }
  },
  mounted() {
    console.log("login component mounted.");
  }
};
</script>