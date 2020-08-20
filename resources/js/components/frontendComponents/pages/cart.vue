<template>
  <div>
    <topHeader />

    <!-- Page Header Section Start Here -->
    <section class="page-header style-2">
      <div class="container">
        <div class="page-title text-center">
          <h3>Cart Page</h3>
          <ul class="breadcrumb">
            <li>
              <a href="index-2.html">Home</a>
            </li>
            <li>
              <a href="#">Shop</a>
            </li>
            <li>Cart Page</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Page Header Section Ending Here -->

    <!-- Shop Cart Page Section start here -->
    <div class="shop-cart padding-tb">
      <div class="container">
        <div class="section-wrapper">
          <div class="cart-top">
            <table>
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="product-item">
                    <div class="p-thumb">
                      <a href="#">
                        <img src="/assets/front/images/popular-food/01.jpg" alt="product" />
                      </a>
                    </div>
                    <div class="p-content">
                      <a href="#">Product Text Here</a>
                    </div>
                  </td>
                  <td>$250</td>
                  <td>
                    <div class="cart-plus-minus">
                      <div class="dec qtybutton">-</div>
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="3" />
                      <div class="inc qtybutton">+</div>
                    </div>
                  </td>
                  <td>$750</td>
                  <td>
                    <a href="#">
                      <img src="/assets/front/images/shop/del.png" alt="product" />
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="product-item">
                    <div class="p-thumb">
                      <a href="#">
                        <img src="/assets/front/images/popular-food/02.jpg" alt="product" />
                      </a>
                    </div>
                    <div class="p-content">
                      <a href="#">Product Text Here</a>
                    </div>
                  </td>
                  <td>$250</td>
                  <td>
                    <div class="cart-plus-minus">
                      <div class="dec qtybutton">-</div>
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                      <div class="inc qtybutton">+</div>
                    </div>
                  </td>
                  <td>$500</td>
                  <td>
                    <a href="#">
                      <img src="/assets/front/images/shop/del.png" alt="product" />
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="product-item">
                    <div class="p-thumb">
                      <a href="#">
                        <img src="/assets/front/images/popular-food/03.jpg" alt="product" />
                      </a>
                    </div>
                    <div class="p-content">
                      <a href="#">Product Text Here</a>
                    </div>
                  </td>
                  <td>$50</td>
                  <td>
                    <div class="cart-plus-minus">
                      <div class="dec qtybutton">-</div>
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                      <div class="inc qtybutton">+</div>
                    </div>
                  </td>
                  <td>$100</td>
                  <td>
                    <a href="#">
                      <img src="/assets/front/images/shop/del.png" alt="product" />
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="product-item">
                    <div class="p-thumb">
                      <a href="#">
                        <img src="/assets/front/images/popular-food/04.jpg" alt="product" />
                      </a>
                    </div>
                    <div class="p-content">
                      <a href="#">Product Text Here</a>
                    </div>
                  </td>
                  <td>$100</td>
                  <td>
                    <div class="cart-plus-minus">
                      <div class="dec qtybutton">-</div>
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                      <div class="inc qtybutton">+</div>
                    </div>
                  </td>
                  <td>$200</td>
                  <td>
                    <a href="#">
                      <img src="/assets/front/images/shop/del.png" alt="product" />
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="product-item">
                    <div class="p-thumb">
                      <a href="#">
                        <img src="/assets/front/images/popular-food/05.jpg" alt="product" />
                      </a>
                    </div>
                    <div class="p-content">
                      <a href="#">Product Text Here</a>
                    </div>
                  </td>
                  <td>$200</td>
                  <td>
                    <div class="cart-plus-minus">
                      <div class="dec qtybutton">-</div>
                      <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                      <div class="inc qtybutton">+</div>
                    </div>
                  </td>
                  <td>$400</td>
                  <td>
                    <a href="#">
                      <img src="/assets/front/images/shop/del.png" alt="product" />
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="cart-bottom">
            <div class="cart-checkout-box">
              <div class="coupon">
                <input
                  type="text"
                  name="coupon"
                  placeholder="Coupon Code..."
                  class="cart-page-input-text"
                />
                <input type="submit" value="Apply Coupon" />
              </div>
              <div class="cart-checkout">
                <input type="submit" value="Update Cart" />
                <input type="submit" value="Proceed to Checkout" />
              </div>
            </div>
            <div class="shiping-box">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="calculate-shiping">
                    <h4>Calculate Shipping</h4>
                    <div class="outline-select">
                      <select>
                        <option value="volvo">United Kingdom (UK)</option>
                        <option value="saab">Bangladesh</option>
                        <option value="saab">Pakisthan</option>
                        <option value="saab">India</option>
                        <option value="saab">Nepal</option>
                      </select>
                      <span class="select-icon">
                        <i class="icofont-caret-down"></i>
                      </span>
                    </div>
                    <div class="outline-select shipping-select">
                      <select>
                        <option value="volvo">State/Country</option>
                        <option value="saab">Dhaka</option>
                        <option value="saab">Benkok</option>
                        <option value="saab">Kolkata</option>
                        <option value="saab">Kapasia</option>
                      </select>
                      <span class="select-icon">
                        <i class="icofont-caret-down"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      name="coupon"
                      placeholder="Postcode/ZIP"
                      class="cart-page-input-text"
                    />
                    <button type="submit" class="food-btn">
                      <span>Update Total</span>
                    </button>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="cart-overview">
                    <h4>Cart Totals</h4>
                    <ul>
                      <li>
                        <span class="pull-left">Cart Subtotal</span>
                        <p class="pull-right">$ 0.00</p>
                      </li>
                      <li>
                        <span class="pull-left">Shipping and Handling</span>
                        <p class="pull-right">Free Shipping</p>
                      </li>
                      <li>
                        <span class="pull-left">Order Total</span>
                        <p class="pull-right">$ 2940.00</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Shop Cart Page Section ending here -->

    <!-- Newsletter Section Start Here -->
    <div class="news-letter">
      <div class="container">
        <div class="section-wrapper">
          <div class="news-title">
            <h3>For Newsletter</h3>
          </div>
          <div class="news-form">
            <form action="https://www.foxcoders.com/">
              <label>
                <input type="email" name="email" placeholder="Enter Your Email" />
              </label>
              <input type="submit" name="submit" value="Subscribe now" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Newsletter Section Ending Here -->
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
        text += possible.charAt(Math.floor(Math.random() * possible.length));

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
