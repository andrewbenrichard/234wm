<template>
    <div>
        <topHeader />
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Register</h2>
                            <ul>
                                <li>
                                    <router-link to="/">Home</router-link>
                                </li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <div class=" container-fluid">
            <div class="row">
                <div class="col-md-6 auth__left__content_holder">
                    <div class="auth__content__intro">
                        <h3>Create an account</h3>
                    </div>
                </div>
                <div class="col-md-6 auth_form_content">
                    <form
                        @submit.prevent="login"
                        @keydown="form.onKeydown($event)"
                    >
                        <div class="form-group">
                            <label>Full name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                name="name"
                                class="form-control"
                                :class="{
                                    'is-invalid': form.errors.has('name')
                                }"
                            />
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
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

                        <div class="form-group">
                            <label>Password</label>
                            <input
                                v-model="form.password"
                                type="password"
                                name="password"
                                class="form-control"
                                :class="{
                                    'is-invalid': form.errors.has('password')
                                }"
                            />
                            <has-error
                                :form="form"
                                field="password"
                            ></has-error>
                        </div>
                        <div class="form-group">
                            <label>Confim Password</label>
                            <input
                                v-model="form.password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                :class="{
                                    'is-invalid': form.errors.has(
                                        'password_confirmation'
                                    )
                                }"
                            />
                            <has-error
                                :form="form"
                                field="password_confirmation"
                            ></has-error>
                        </div>

                        <button
                            :disabled="form.busy"
                            type="submit"
                            class="btn btn-primary"
                        >
                            Log In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import topHeader from "./layouts/header.vue";

export default {
    data() {
        return {
            form: new Form({
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            })
        };
    },
    methods: {
        login() {
            // Submit the form via a POST request
            this.form.post("/api/user").then(({ data }) => {
                console.log(data);
            });
        }
    },
    mounted() {
        console.log("register component mounted.");
    },
    components: {
        topHeader
    }
};
</script>
<style>
h3.vs-navbar--title {
    color: #7496e7;
}
.auth__content__intro {
    text-align: center;
    color: #333;
}
.auth__content__intro > h3 {
    font-size: 30px;
    font-weight: 700;
    color: #333;
    margin-top: 34%;
}
.auth_form_content.col-md-6 {
    padding: 33px;
}
form > h4 {
    text-align: center;
    font-weight: 600;
    margin-top: 100px;
}
input.form-control {
    height: 54px;
    box-shadow: 1px 4px 9px 1px rgba(124, 115, 252, 0.15);
    border: none;
    width: 72%;
    border-radius: 5px;
    font-weight: 600;
}
input.form-control {
    height: 54px;
    box-shadow: 1px 4px 9px 1px rgba(124, 115, 252, 0.38);
    border: none;
    width: 72%;
    border-radius: 5px;
    font-weight: 600;
}
</style>
