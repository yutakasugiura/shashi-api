<template>
  <div>
    <h1>Hello Company</h1>
    <p>{{ $route.params.id }}</p>
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