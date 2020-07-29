<template>
  <div class="container">
    <div>
      <div v-for="company in companies" :key="company.id">
        <h2>
          <router-link :to="{ path: `/tse/${company.stock_code}`}">{{ company.name }}</router-link>
        </h2>
        <p>{{ company }}</p>
      </div>
    </div>
    <hr />
    <!-- <div id="index">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid">
            <div v-for="comapny in companies" :key="comapny.id" class="comapny">
              <div class="letter shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  {{ company.name }}
                  <img :src="comapny.company_detail.top_img_path" class="rounded" />
                </router-link>
                <p>{{ comapny.name }}</p>
                <span :class="comapny.company_detail.industry">{{ comapny.company_detail.industry }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
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
