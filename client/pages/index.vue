<template>
  <div class="container">
    <div>
      <Logo />
      <h1 class="title">社史API</h1>
      <!-- <p>{{ companies }}</p> -->
      <div v-for="company in companies" :key="company.id">
        <p>
          <router-link :to="{ path: `/tse/${company.stock_code}`}">{{ company.name }}</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import Paginate from "vuejs-paginate";

export default {
  data() {
    return {
      page: 1,
      length: 0,
      lists: [],
      viewLists: [],
      pageSize: 10
    };
  },
  async asyncData(app) {
    const res = await app.$axios.$get("http://localhost:8000/api/company/");
    return {
      companies: res
    };
  }
};
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #888;
}
.container a {
  color: #888;
}

.title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont,
    "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
