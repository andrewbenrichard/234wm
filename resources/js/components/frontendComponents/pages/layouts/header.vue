<template>
  <div class="header___sk_shop">
    <!-- Mobile Menu Start Here -->
    <div class="mobile-menu">
      <nav class="mobile-header d-xl-none">
        <div class="header-logo">
          <a href="/" class="logo">
            <img src="assets/front/images/logo/01.png" alt="logo" />
          </a>
        </div>
        <div class="header-bar">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
      <nav class="menu">
        <div class="mobile-menu-area d-xl-none">
          <div class="mobile-menu-area-inner scrollbar">
            <div class="mobile-search">
              <input type="text" placeholder="Search Here........." />
              <button type="submit">
                <i class="icofont-search-2"></i>
              </button>
            </div>
            <ul>
              <li>
                <a class="active" href="/">Home</a>
                <ul>
                  <li>
                    <a class="active" href="/">Home Page One</a>
                  </li>
                  <li>
                    <a href="index-3.html">Home Page Two</a>
                  </li>
                  <li>
                    <a href="index-4.html">Home Page Three</a>
                  </li>
                  <li>
                    <a href="index-5.html">Home Page Four</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="about.html">About</a>
              </li>
              <li>
                <a href="#0">Pages</a>
                <ul>
                  <li>
                    <a href="#0">Category</a>
                    <ul>
                      <li>
                        <a href="food-menu.html">Food Category</a>
                      </li>
                      <li>
                        <a href="menu-card.html">Category style 1</a>
                      </li>
                      <li>
                        <a href="menu-card-2.html">Category style 2</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#0">Chef</a>
                    <ul>
                      <li>
                        <a href="homechef.html">Home Chef</a>
                      </li>
                      <li>
                        <a href="homechef-single.html">Home Chef Single</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="recepi-single.html">Single Recipe</a>
                  </li>
                  <li>
                    <a href="404.html">404 Page</a>
                  </li>
                  <li>
                    <a href="coming-soon.html">Coming Soon Page</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#0">Blog</a>
                <ul>
                  <li>
                    <a href="blog.html">Blog</a>
                  </li>
                  <li>
                    <a href="blog-single.html">Blog Single</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#0">Shop</a>
                <ul>
                  <li>
                    <a href="shop-page.html">Shop Page</a>
                  </li>
                  <li>
                    <a href="shop-single.html">Shop Single style-1</a>
                  </li>
                  <li>
                    <a href="shop-single-2.html">Shop Single style-2</a>
                  </li>
                  <li>
                    <a href="cart-page.html">Cart Page</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="contact-us.html">Contact</a>
              </li>
            </ul>
            <div class="scocial-media">
              <a href="#" class="facebook">
                <i class="icofont-facebook"></i>
              </a>
              <a href="#" class="twitter">
                <i class="icofont-twitter"></i>
              </a>
              <a href="#" class="linkedin">
                <i class="icofont-linkedin"></i>
              </a>
              <a href="#" class="vimeo">
                <i class="icofont-vimeo"></i>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- Mobile Menu Ending Here -->

    <!-- header section start -->
    <header class="header-section d-xl-block d-none">
      <div class="container-fluid">
        <div class="header-area">
          <div class="logo">
            <a href="/">
              <img src="assets/front/images/logo/01.png" alt="logo" />
            </a>
          </div>
          <div class="main-menu">
            <ul>
              <li>
                <router-link index="0" to="/">Home</router-link>
              </li>
              <li>
                <router-link index="0" to="/about-us">About us</router-link>
              </li>

              <li>
                <router-link index="0" to="/menu">Our Menu</router-link>
              </li>
              <li>
                <router-link index="0" to="/categories">Category</router-link>
              </li>
              <li>
                <router-link index="0" to="/contact">Contact us</router-link>
              </li>
            </ul>
          </div>
          <div class="author-option">
            <div class="author-area">
              <div class="cart-option">
                <img src="assets/front/images/header/cart.png" alt="shop-cart" />
                <div class="count-item">04</div>
                <div class="cart-content">
                  <div class="cart-title">
                    <div class="add-item">4 Items Added</div>
                    <div class="list-close">
                      <a href="#">Close</a>
                    </div>
                  </div>
                  <div class="cart-scr scrollbar">
                    <div class="cart-con-item">
                      <div class="cart-item">
                        <div class="cart-inner">
                          <div class="cart-top">
                            <div class="thumb">
                              <a href="#">
                                <img src="assets/front/images/popular-food/01.jpg" alt />
                              </a>
                            </div>
                            <div class="content">
                              <a href="#">
                                Split Remedy
                                Split End
                                Shampoo
                              </a>
                            </div>
                            <div class="remove-btn">
                              <a href="#">
                                <i class="icofont-close"></i>
                              </a>
                            </div>
                          </div>
                          <div class="cart-bottom">
                            <div class="sing-price">Tk. 140</div>
                            <div class="cart-plus-minus">
                              <div class="dec qtybutton">-</div>
                              <div class="dec qtybutton">-</div>
                              <input
                                class="cart-plus-minus-box"
                                type="text"
                                name="qtybutton"
                                value="1"
                              />
                              <div class="inc qtybutton">+</div>
                              <div class="inc qtybutton">+</div>
                            </div>
                            <div class="total-price">Tk. 280.00</div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-inner">
                          <div class="cart-top">
                            <div class="thumb">
                              <a href="#">
                                <img src="assets/front/images/popular-food/02.jpg" alt />
                              </a>
                            </div>
                            <div class="content">
                              <a href="#">
                                Split Remedy
                                Split End
                                Shampoo
                              </a>
                            </div>
                            <div class="remove-btn">
                              <a href="#">
                                <i class="icofont-close"></i>
                              </a>
                            </div>
                          </div>
                          <div class="cart-bottom">
                            <div class="sing-price">Tk. 140</div>
                            <div class="cart-plus-minus">
                              <div class="dec qtybutton">-</div>
                              <div class="dec qtybutton">-</div>
                              <input
                                class="cart-plus-minus-box"
                                type="text"
                                name="qtybutton"
                                value="1"
                              />
                              <div class="inc qtybutton">+</div>
                              <div class="inc qtybutton">+</div>
                            </div>
                            <div class="total-price">Tk. 280.00</div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-inner">
                          <div class="cart-top">
                            <div class="thumb">
                              <a href="#">
                                <img src="assets/front/images/popular-food/03.jpg" alt />
                              </a>
                            </div>
                            <div class="content">
                              <a href="#">
                                Split Remedy
                                Split End
                                Shampoo
                              </a>
                            </div>
                            <div class="remove-btn">
                              <a href="#">
                                <i class="icofont-close"></i>
                              </a>
                            </div>
                          </div>
                          <div class="cart-bottom">
                            <div class="sing-price">Tk. 140</div>
                            <div class="cart-plus-minus">
                              <div class="dec qtybutton">-</div>
                              <div class="dec qtybutton">-</div>
                              <input
                                class="cart-plus-minus-box"
                                type="text"
                                name="qtybutton"
                                value="1"
                              />
                              <div class="inc qtybutton">+</div>
                              <div class="inc qtybutton">+</div>
                            </div>
                            <div class="total-price">Tk. 280.00</div>
                          </div>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-inner">
                          <div class="cart-top">
                            <div class="thumb">
                              <a href="#">
                                <img src="assets/front/images/popular-food/04.jpg" alt />
                              </a>
                            </div>
                            <div class="content">
                              <a href="#">
                                Split Remedy
                                Split End
                                Shampoo
                              </a>
                            </div>
                            <div class="remove-btn">
                              <a href="#">
                                <i class="icofont-close"></i>
                              </a>
                            </div>
                          </div>
                          <div class="cart-bottom">
                            <div class="sing-price">Tk. 140</div>
                            <div class="cart-plus-minus">
                              <div class="dec qtybutton">-</div>
                              <div class="dec qtybutton">-</div>
                              <input
                                class="cart-plus-minus-box"
                                type="text"
                                name="qtybutton"
                                value="1"
                              />
                              <div class="inc qtybutton">+</div>
                              <div class="inc qtybutton">+</div>
                            </div>
                            <div class="total-price">Tk. 280.00</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cart-scr-bottom">
                    <ul>
                      <li>
                        <div class="title">Subtotal</div>
                        <div class="price">Tk. 1045.00</div>
                      </li>
                      <li>
                        <div class="title">Shipping</div>
                        <div class="price">Tk. 40.00</div>
                      </li>
                      <li>
                        <div class="title">Cart Total</div>
                        <div class="price">Tk. 1085.00</div>
                      </li>
                    </ul>
                    <router-link class="food-btn" to="/checkout">Place Order</router-link>
                  </div>
                </div>
              </div>
              <div class="author-account">
                <div class="author-icon">
                  <img src="assets/front/images/chef/author/08.jpg" alt="author" />
                </div>
                <div class="author-select">
                  <select name="author-select" id="author-select">
                    <!-- <option value="1">My Account </option> -->
                    <option value="2">Log Out</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- header section ending -->
  </div>
  <!-- <div class="navbar-area navbar-style-two">
      <div class="huruma-responsive-nav">
        <div class="container">
          <div class="huruma-responsive-menu">
            <div class="logo">
              <router-link to="/">
                <img src="/assets/front/img/Whanyinna logo trans (1).png" class="white-logo" alt="logo" />
                <img src="/assets/front/img/logo-2.png" class="black-logo" alt="image" />
              </router-link>
            </div>
          </div>
        </div>
      </div>

      <div class="huruma-nav">
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-light">
            <router-link class="navbar-brand" to="/">
              <img src="/assets/front/img/logo_debug.png" class="white-logo" alt="logo" />
              <img src="/assets/front/img/logo_debug_2.png" class="black-logo" alt="image" />
            </router-link>
            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <router-link index="0" class="nav-link" to="/">Home</router-link>
                </li>

                <li class="nav-item">
                  <router-link index="1" class="nav-link" to="/about-us">About Us</router-link>
                </li>
                <li class="nav-item">
                  <router-link index="2" class="nav-link" to="/gallery">Gallery</router-link>
                </li>
                <li class="nav-item">
                  <router-link index="3" class="nav-link" to="/projects">Donate</router-link>
                </li>
                <li class="nav-item">
                  <router-link index="3" class="nav-link" to="/blog">Blog</router-link>
                </li>
                <li class="nav-item">
                  <router-link index="4" class="nav-link" to="/contact">Contact</router-link>
                </li>
                <template v-if="authenticated">
                  <li class="nav-item">
                    <router-link index="4" class="nav-link" to="/dashboard">Dashboard</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link index="4" class="nav-link" to="#">Logout</router-link>
                  </li>
                </template>
              </ul>
            </div>
          </nav>
        </div>
      </div>
  </div>-->
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
    }
  }
};
</script>
