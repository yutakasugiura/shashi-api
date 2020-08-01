<template>
  <div class="side-menu shadow-sm">
    <div class="top-item">
      <img src="https://the-shashi.com/img-top/icon/cat.png" class="icon rounded-circle shadow-sm" />
      The社史
    </div>
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box shadow-sm">
          <img
            src="https://the-shashi.com/img-top/icon/cat.png"
            class="icon rounded-circle shadow-sm"
          />
          企業一覧
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/tse/6758/">
        <div class="link-box shadow-sm">
          <img
            src="https://the-shashi.com/img-contents/6758/morita-akio.png"
            class="icon rounded-circle shadow-sm"
          />
          高収益企業
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/tse/6758/">
        <div class="link-box shadow-sm">
          <img
            src="https://the-shashi.com/img-contents/6758/morita-akio.png"
            class="icon rounded-circle shadow-sm"
          />
          高シェア企業
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/tse/6758/">
        <div class="link-box shadow-sm">
          <img
            src="https://the-shashi.com/img-contents/6758/morita-akio.png"
            class="icon rounded-circle shadow-sm"
          />
          倒産/消滅企業
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/tse/6758/">
        <div class="link-box shadow-sm">
          <img
            src="https://the-shashi.com/img-contents/6758/morita-akio.png"
            class="icon rounded-circle shadow-sm"
          />
          地方発企業
        </div>
      </nuxt-link>
    </div>
    <div class="item">
      <nuxt-link to="/">
        <div class="link-box shadow-sm">
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
        <div class="link-box shadow-sm">
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
        <div class="link-box shadow-sm">
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
  width: 180px;
  height: 100vmax;
  float: left;
  background-color: rgb(131, 161, 150);
  // background-image: url("/component/side-bar.png");
  color: #fff;
  padding: 0;
  & div.top-item {
    margin: 10px;
    padding: 10px;
    font-weight: bold;
  }
  & div.item {
    padding: 3px;
    & a {
      color: rgb(255, 255, 255);
      font-weight: bold;
    }
  }
  & div.link-box a {
    color: rgb(255, 255, 255);
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