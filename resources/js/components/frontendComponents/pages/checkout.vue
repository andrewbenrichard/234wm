<template>
    <div>
        <topHeader />

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ project.project_name }}</h2>
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>{{ project.project_name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Causes Details Area -->
        <section class="causes-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="causes-details-desc">
                            <div class="causes-details-image">
                                <img
                                    :src="
                                        '/assets/img/donate/' +
                                            project.project_img
                                    "
                                    alt="image"
                                />
                            </div>

                            <div class="causes-details-text">
                                <h3>{{ project.project_name }}</h3>
                                <p>{{ project.project_des }}</p>

                                <div class="causes-details-payment">
                                    <div class="contact-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        id="first-name"
                                                        v-model="
                                                            form.first_name
                                                        "
                                                        class="form-control"
                                                        placeholder="First Name"
                                                        required
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        v-model="form.last_name"
                                                        class="form-control"
                                                        placeholder="Last Name"
                                                        required
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        v-model="form.email"
                                                        placeholder="Email"
                                                        required
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name="text"
                                                        class="form-control"
                                                        v-model="form.number"
                                                        placeholder="Phone"
                                                        required
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        name="amount"
                                                        id="msg_subject"
                                                        v-model="form.amount"
                                                        class="form-control"
                                                        placeholder="₦10,000.00"
                                                        required
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea
                                                        name="message"
                                                        id="message"
                                                        rows="10"
                                                        v-model="form.message"
                                                    ></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="causes-details-btn">
                                                    <paystack
                                                        class="default-btn"
                                                        :amount="
                                                            form.amount + '00'
                                                        "
                                                        :email="form.email"
                                                        :paystackkey="
                                                            paystackkey
                                                        "
                                                        :reference="reference"
                                                        :callback="callback"
                                                        :close="close"
                                                        :embed="false"
                                                    >
                                                        <i
                                                            class="fas fa-money-bill-alt"
                                                        ></i>
                                                        Donate Now
                                                        <span></span>
                                                    </paystack>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Causes Details Area -->

        <Bottomfooter />
    </div>
</template>

<script>
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";
import paystack from "vue-paystack";

export default {
    mounted() {
        this.$route.params;
    },
    components: {
        topHeader,
        Bottomfooter,
        paystack
    },
    data() {
        return {
            paystackkey: "pk_test_6382db1bfccac4380925f4166400907ee4e464fd", //paystack public key
            project: {
                id: "",
                project_name: "",
                project_des: "",
                project_img: "",
                project_slug: "",
                created_at: ""
            },
            form: new Form({
                first_name: "",
                last_name: "",
                email: "",
                number: "",
                amount: "",
                message: "",
                project_slug: this.$route.params.slug
            })
        };
    },
    computed: {
        reference() {
            let text = "";
            let possible =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (let i = 0; i < 10; i++)
                text += possible.charAt(
                    Math.floor(Math.random() * possible.length)
                );

            return text;
        }
    },
    methods: {
        callback: function(response) {
            console.log(response);
            this.saveDonation();
        },
        close: function() {
            console.log("Payment closed");
        },
        loadProject() {
            axios
                .get("/api/sc_admin/single/project/" + this.$route.params.slug)
                .then(({ data }) => (this.project = data));
        },
        saveDonation() {
            this.$Progress.start();
            this.form
                .post("/api/sc_admin/post/donation")
                .then(() => {
                    this.$router.replace({
                        name: "thanks"
                    });
                })
                .catch(() => {});
        }
    },
    created() {
        this.loadProject();
    }
};
</script>
