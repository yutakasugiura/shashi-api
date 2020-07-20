<template>
  <div>
    <h1>Hello Company</h1>
    <p>{{ $route.params.id }}</p>
    <p>{{ companies }}</p>
  </div>
</template>

<script>
export default {
  async asyncData({ app, params }) {
    // const res = await app.$axios.$get("http://localhost:8000/api/company/");
    const res = await app.$axios.$get(
      `http://localhost:8000/api/history/${params.id}`
    );
    return {
      companies: res
    };
  }
};
</script>