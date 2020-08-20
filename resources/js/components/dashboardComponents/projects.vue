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

    <vs-button color="primary" @click="newModal" type="filled">Add Project</vs-button>

    <div class="container">
      <div class="row">
        <div class="col-md-3" v-for="project in projects" :key="project.id">
          <vs-card class="cardx" fixedHeight>
            <div slot="header">
              <h3>{{ project.project_name }}</h3>
            </div>
            <div slot="media">
              <img
                :src="
                                    '/assets/img/donate/' + project.project_img
                                "
              />
            </div>
            <div>
              <span>{{ project.project_des }}</span>
            </div>
            <div slot="footer">
              <vs-row vs-justify="flex-end">
                <vs-button
                  @click="deleteProject(project.id)"
                  type="gradient"
                  color="danger"
                  icon="delete"
                ></vs-button>
                <vs-button @click="editModal(project)" color="primary" icon="edit"></vs-button>
              </vs-row>
            </div>
          </vs-card>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createProject">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.project_name"
                  type="text"
                  name="project_name"
                  placeholder="name"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'project_name'
                                        )
                                    }"
                />
                <has-error :form="form" field="project_name"></has-error>
              </div>
              <div class="form-group">
                <textarea
                  v-model="form.project_des"
                  name="project_des"
                  cols="30"
                  rows="10"
                  placeholder="project_des"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'project_des'
                                        )
                                    }"
                ></textarea>
                <has-error :form="form" field="project_des"></has-error>
              </div>
              <div class="form-group">
                <input name="project_img" @change="CreateImage" type="file" />
                <has-error :form="form" field="project_img"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
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
      projects: {},
      form: new Form({
        project_name: "",
        project_des: "",
        project_img: ""
      })
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
    CreateImage(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      //   let vm = this;
      reader.onloadend = file => {
        this.form.project_img = reader.result;
      };
      reader.readAsDataURL(file);
    },
    newModal() {
      this.form.reset();
      $("#addNew").modal("show");
    },
    editModal(project) {
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(project);
    },
    deleteProject(id) {
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
            .delete("/api/sc_admin/delete/project/" + id)
            .then(() => {
              if (result.value) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
              }
              Fire.$emit("AfterCreate");
            })
            .catch(() => {
              Swal("Failed", "There was something wrong.", "warning");
            });
        }
      });
    },
    createProject() {
      this.$Progress.start();
      this.form
        .post("/api/sc_admin/post/project")
        .then(() => {
          Fire.$emit("AfterCreate");
          $("#addNew").modal("hide");
          Toast.fire({
            type: "success",
            title: "User created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
    loadProjects() {
      axios
        .get("/api/sc_admin/projects")
        .then(({ data }) => (this.projects = data));
    }
  },
  created() {
    this.$Progress.start();
    Fire.$on("AfterCreate", () => {
      this.loadProjects();
    });
    this.loadProjects();
    this.$Progress.finish();
  }
};
</script>
