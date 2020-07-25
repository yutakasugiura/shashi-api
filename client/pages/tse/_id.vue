<template>
  <div>
    <h1>{{ company.name }}</h1>
    <p>{{ company.founder }}</p>
    <div v-for="item in company.histories" :key="item.id">
      <p>{{ item.year }}</p>
      <hr />
      <p>{{ item.detail }}</p>
      <hr />
      <p>{{ item.summary }}</p>
      <hr />
      <p>{{ item.history_tag_name }}</p>
      <hr />
      <p>{{ item.region }}</p>
    </div>
  </div>
</template>

<script>
export default {
  async asyncData({ app, params }) {
    const company = await app.$axios.$get(
      `http://localhost:8000/api/company/${params.id}`
    );
    return {
      company: company,
    };
  },
};
</script>

<style>
</style>