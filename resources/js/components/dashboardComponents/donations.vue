<template>
  <div class="componet_holder">
    <topHeader />

    <div class="content">
      <div class="header top-90">
        <div class="page_title_left">
          <h3>Donations</h3>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-3" v-for="donate in donations" :key="donate.id">
          <vs-card class="cardx" fixedHeight>
            <div slot="header">
              <h3>
                {{ donate.donate_name }} donated {{donate.donate_amount}} for
                <br />
                {{donate.donate_title}}
              </h3>
            </div>
            <div>
              <p>Number {{donate.donate_number}}</p>
              <p>Email {{donate.donate_email}}</p>
              <span>{{ donate.donate_message }}</span>
            </div>
            <div slot="footer">
              <vs-row vs-justify="flex-end">
                <vs-button
                  @click="deleteDonation(donate.id)"
                  type="gradient"
                  color="danger"
                  icon="delete"
                ></vs-button>

                <h6>{{donate.donate_date}}</h6>
              </vs-row>
            </div>
          </vs-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import topHeader from "./layouts/header.vue";
import Bottomfooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      donations: {}
    };
  },
  components: {
    topHeader,
    Bottomfooter
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
    deleteDonation(id) {
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
            .delete("/api/sc_admin/delete/donation/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire(
                  "Deleted!",
                  "The  Donation has been deleted.",
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

    loadDonations() {
      axios
        .get("/api/sc_admin/donations")
        .then(({ data }) => (this.donations = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadDonations();
    });
    this.loadDonations();
    this.$Progress.finish();
  }
};
</script>
