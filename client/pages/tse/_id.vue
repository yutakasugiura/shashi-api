<template>
  <div>
    <h1>{{ companies[0].company_name }}</h1>
    <div v-for="item in companies" :key="item.id">
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
    <h2>沿革詳細</h2>
    <p>{{ companies }}</p>
  </div>
</template>

<script>
export default {
  async asyncData({ app, params }) {
    const company = await app.$axios.$get(
      `http://localhost:8000/api/company/${params.id}`
    );
    return {
      companies: company,
    };
  },
};
</script>