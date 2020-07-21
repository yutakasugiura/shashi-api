<template>
  <div>
    <h1>{{ histories.name }}</h1>
    <p>{{ histories.id }}</p>
    <div v-for="item in timelines" :key="item.id">
      <p>{{ item.year }}</p>
      <p>{{ item.detail }}</p>
      <p>{{ item.summary }}</p>
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
      histories: history,
      timelines: history.histories
    };
  }
};
</script>