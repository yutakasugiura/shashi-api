<template>
  <div class="container">
    <div id="index">
      <div class="row">
        <div class="col-lg-10">
          <div class="title-box main-shashi">
            <h1>The社史</h1>
            <p>長期視点で企業を知る</p>
          </div>
          <div class="grid">
            <div v-for="company in companies" :key="company.id" class="company">
              <div class="index-cover shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  <img :src="company.top_img_path" class="rounded" />
                </router-link>
                <h2>{{ company.name }}</h2>
                <span
                  class="index-tag"
                  :class="company.industry_classification"
                >{{ company.industry_name }}</span>
              </div>
            </div>
            <div v-for="company in companies" :key="company.id" class="company">
              <div class="index-cover shadow">
                <router-link :to="{ path: `/tse/${company.stock_code}`}">
                  <img :src="company.top_img_path" class="rounded" />
                </router-link>
                <h2>{{ company.name }}</h2>
                <span
                  class="index-tag"
                  :class="company.industry_classification"
                >{{ company.industry_name }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-2">
          <div class="comment-box">
            <div class="msg">
              <p>aasśsasasa</p>
            </div>
          </div>
        </div>-->
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
.grid hover:img {
  opacity: 0.6;
}
.index-cover {
  margin: 10px;
  padding: 0px;
  max-width: 150px;
  position: relative;
  & h2 {
    color: #666;
    padding: 0px;
    margin: 0px;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
  }
  & span.index-tag {
    position: absolute;
    top: 0;
    right: 0;
  }
  & span.manufacturing {
    border-radius: 5px;
    background: rgba(70, 155, 211, 0.5);
    color: #fff;
    font-weight: bold;
    padding: 5px;
  }
}
.title-box {
  margin: 5px;
  padding: 10px;
  text-align: center;
  & h1 {
    font-size: 150%;
    font-weight: bold;
  }
}
.main-shashi {
  border-radius: 5px;
  background: rgb(159, 187, 214);
  color: #fff;
  font-weight: bold;
}
.comment-box {
  margin: 10px;
  padding: 0px;
  border-radius: 5px;
  background: rgb(81, 98, 114);
  color: #fff;
  width: 100%;
  font-weight: bold;
}
</style>