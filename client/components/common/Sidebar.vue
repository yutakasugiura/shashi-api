<template>
  <div class="side-menu shadow-sm">
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box">
          <img
            src="https://the-shashi.com/img-top/icon/cat.png"
            class="icon rounded-circle shadow-sm"
          />
          The社史
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/tse/6758/">
        <div class="link-box shadow">
          <img
            src="https://the-shashi.com/img-contents/6758/morita-akio.png"
            class="icon rounded-circle shadow-sm"
          />
          最新号
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box shadow">
          <img
            src="https://the-shashi.com/img-top/icon/news.png"
            class="icon rounded-circle shadow-sm"
          />
          メディア
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box shadow">
          <img
            src="https://the-shashi.com/img-top/icon/twitter.png"
            class="icon rounded-circle shadow-sm"
          />
          Twitter
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box shadow">
          <img
            src="https://the-shashi.com/img-top/face-light.png"
            class="icon rounded-circle shadow-sm"
          />
          運営者YS
        </div>
      </nuxt-link>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style scoped lang="scss">
.side-menu {
  top: 0px;
  position: fixed;
  width: 200px;
  height: 100vmax;
  float: left;
  // background-color: rgba(104, 104, 104, 0.5);
  background-image: url("/side-bar.png");
  background-image: url("/side-bar.png");
  color: #fff;
  margin: 0;
  padding: 0;
  & div.item {
    padding: 3px;
    & a {
      color: #fff;
      font-weight: bold;
    }
  }
  & div.link-box a {
    color: white;
    font-weight: bold;
    text-decoration: none;
  }
  & div.link-box {
    border-radius: 5px;
    margin: 5px 5px;
    padding: 5px;
    list-style: none;
  }
  & div.link-box:hover {
    background-color: rgba(206, 206, 206, 0.6);
  }
  & img.icon {
    width: 45px;
  }
  & img.bottom {
    width: 100%;
    bottom: 0;
  }
}
</style>