<template>
  <div>
    <h1>{{ histories[0].company_name }}</h1>
    <div v-for="item in histories" :key="item.id">
      <p>{{ item.year }}</p>
      <p>{{ item.detail }}</p>
      <p>{{ item.summary }}</p>
      <p>{{ item.tag_name }}</p>
      <p>{{ item.region }}</p>
    </div>
    <p>{{ histories }}</p>
  </div>
</template>

<script>
export default {
  async asyncData({ app, params }) {
    const history = await app.$axios.$get(
      `http://localhost:8000/api/history/${params.id}`
    );
    return {
      histories: history
    };
  }
};
</script>