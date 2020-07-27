<template>
  <div>
    <div class="container-fulid">
      <div class="layout">
        <div class="row">
          <sidebar />
          <div class="main">
            <Nuxt />
          </div>
          <!-- <div class="col-lg-2 right-bar">
            <h2>共通サイドバー</h2>
          </div>-->
        </div>
      </div>
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
  margin: 0px 0px 0px 210px;
  width: 1000px;
}
</style>