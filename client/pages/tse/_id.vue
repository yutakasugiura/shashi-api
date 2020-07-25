<template>
  <div>
    <h1>{{ companies[1].name }}</h1>
    <div v-for="item in companies" :key="item.id">
      <p>{{ item.year }}</p>
      <p>{{ item.detail }}</p>
      <p>{{ item.summary }}</p>
      <p>{{ item.tag_name }}</p>
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