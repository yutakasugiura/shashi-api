<template>
  <div class="container">
    <div>
      <div v-for="company in companies" :key="company.id">
        <h2>
          <router-link :to="{ path: `/tse/${company.stock_code}`}">{{ company.name }}</router-link>
        </h2>
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
      pageSize: 10,
    };
  },
  async asyncData(app) {
    const res = await app.$axios.$get("http://localhost:8000/api/company/");
    return {
      companies: res,
    };
  },
};
</script>
