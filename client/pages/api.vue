<template>
  <div class="page">
    <p>{{ posts }}</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: []
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/company/")
      .then(response => (this.posts = response));
  }
};
</script>