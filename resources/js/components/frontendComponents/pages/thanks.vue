<template>
    <div>
        <topHeader />

        <!-- Start Footer Area -->
        <!-- Start Error Area -->
        <section class="error-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="error-content">
                            <img src="assets/img/404.png" alt="error" />

                            <h3>Thank you for your donation</h3>
                            <router-link index="0" class="default-btn" to="/">
                                Go to Home
                                <span></span>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Error Area -->
    </div>
</template>

<script>
import topHeader from "./layouts/header.vue";
import footer from "./layouts/footer.vue";

export default {
    mounted() {
        console.log("404 mounted.");
    },
    components: {
        topHeader,
        footer
    }
};
</script>
