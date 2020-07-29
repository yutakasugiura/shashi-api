<template>
  <div class="container">
    <div id="index">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid">
            <div v-for="company in companies" :key="company.id" class="company">
              <div class="index-cover shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  <img :src="company.person_img_path" class="rounded" />
                </router-link>
                <h2>{{ company.name }}</h2>
                <span class="index-tag">{{ company.ipo_year }}年</span>
              </div>
            </div>
            <div v-for="company in companies" :key="company.id" class="company">
              <div class="index-cover shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  <img :src="company.person_img_path" class="rounded" />
                </router-link>
                <h2>{{ company.name }}</h2>
                <span :class="company.ipo_year">{{ company.ipo_year }}</span>
              </div>
            </div>
            <div v-for="company in companies" :key="company.id" class="company">
              <div class="index-cover shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  <img :src="company.person_img_path" class="rounded" />
                </router-link>
                <h2>{{ company.name }}</h2>
                <span :class="company.ipo_year">{{ company.ipo_year }}</span>
              </div>
            </div>
          </div>
        </div>
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

<style lang="scss">
.grid {
  margin: 5px;
  display: grid;
  gap: 0px;
  grid-template-columns: repeat(auto-fit, minmax(150px, auto));
}
.grid img {
  width: 100%;
}
.index-cover {
  margin: 10px;
  padding: 5px;
  max-width: 150px;
  position: relative;
  & h2 {
    color: #666;
    font-size: 15px;
    font-weight: bold;
  }
  & span.index-tag {
    position: absolute;
    top: 0;
    left: 0;
  }
}
</style>