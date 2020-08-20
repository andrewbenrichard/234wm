<template>
  <div class="componet_holder">
    <topHeader />
    <div class="header top-m-20">
      <div class="page_title_left">
        <h3>Profile</h3>
      </div>
    </div>
    <bottomFooter />
  </div>
</template>

<script>
import topHeader from "./layouts/header.vue";
import bottomFooter from "./layouts/footer.vue";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    topHeader,
    bottomFooter
  }
};
</script>
