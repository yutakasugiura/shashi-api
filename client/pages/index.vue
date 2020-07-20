<template>
  <div class="container">
    <div>
      <Logo />
      <h1 class="title">社史API</h1>
      <p>{{ companies }}</p>
      <div v-for="company in companies" :key="company.id">
        <p>
          <router-link :to="{ path: `/tse/${company.id}`}">home</router-link>
        </p>
        <p>{{ company.name }}</p>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
