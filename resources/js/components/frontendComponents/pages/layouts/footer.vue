<template>
    <footer class="footer">
			<div class="bg-shape-style"></div>
			<div class="container">
				<div class="footer-top">
					<div class="footer-area text-center">
						<div class="footer-logo">
							<a href="index-2.html"><img src="assets/front/images/header/footer/01.png" alt="footer-logo"></a>
						</div>
						<div class="scocial-media">
							<a href="#" class="facebook"><i class="icofont-facebook"></i></a>
							<a href="#" class="twitter"><i class="icofont-twitter"></i></a>
							<a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
							<a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
						</div>
						<div class="footer-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">How it works?</a></li>
								<li><a href="#">Menus</a></li>
								<li><a href="#">Chefs</a></li>
								<li><a href="#">Recipes</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-bottom text-center">
					<p>&copy; 2020 <a href="#"><span>Foodie</span></a> Design by <a href="#"><span>Ski Prime</span></a>.</p>
				</div>
			</div>
		</footer>
</template>

<script>
export default {
    mounted() {
        console.log("footer mounted.");
    },
    data() {
        return {
            articles: {}
        };
    },
    methods: {
        // loadArticle() {
        //     axios
        //         .get("/api/sc_admin/articles")
        //         .then(({ data }) => (this.articles = data));
        // }
    },
    created() {
        // this.loadArticle();
        // this.$route.params;
    }
};
</script>
