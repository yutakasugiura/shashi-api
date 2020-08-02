<template>
  <div>
    <div v-if="$mq === 'pc'">
      <div class="row">
        <sidebar />
        <div class="main">
          <Nuxt />
        </div>
      </div>
    </div>
    <div v-if="$mq === 'sp'">
      <Nuxt />
    </div>
  </div>
</template>

<script>
import Sidebar from "~/components/common/Sidebar";

export default {
  components: {
    Sidebar,
  },
};
</script>

<style lang="scss">
.main {
  margin: 0px 0px 0px 200px;
  width: 100%;
}
</style>