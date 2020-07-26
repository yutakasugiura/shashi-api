<template>
  <div class="content">
    <div class="tse-v4">
      <div class="content-title-3">
        <div class="content-grid">
          <div class="content-title-msg">
            <h1>
              {{ company.name }}
              <span class="unit">の歴史</span>
            </h1>
            <p>{{ company.found_year }}年：{{ company.found_region }}にて{{ company.found_type }} | {{ company.ipo_year }}年：{{ company.ipo_type }}</p>
          </div>
          <p>{{company}}</p>
          <hr />
          <p>{{data}}</p>
        </div>
      </div>
      <div class="content-decide-manager">
        <div class="content-box-msg shadow-sm">
          <h2>{{ company.summary }}</h2>
          <p>{{ company.details }}</p>
        </div>
      </div>
      <!-- 本文セクション -->
      <div class="content-found">
        <div class="row">
          <div class="col-sm-4">
            <div class="content-decide-manager">
              <div class="content-box-msg shadow-sm">
                <img
                  :src="company.person_img_path"
                  :alt="founder"
                  class="founder-img shadow-sm"
                  width="100%"
                />
                <p class="content-notice">{{ company.name }} - {{ company.founder }} （イラストは筆者作成）</p>
              </div>
            </div>
          </div>
          <!-- 売上高グラフ -->
          <div class="col-sm-4">
            <div class="content-decide-good">
              <div class="content-box-msg shadow-sm">
                {{ datasets }}
                <div>
                  <barchart :labels="labels" :datasets="bar.datasets" />
                </div>
                <p class="content-notice">{{ company.name }} - 有価証券報告書</p>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <!-- PCおよびタブレット用の表示画面 nuxt-mqを使用 -->
        <div v-if="$mq === 'pc'" class="col-lg-12">
          <h2 class="table-title-shashi shadow-sm">{{ company.name }} - 歴史と沿革</h2>
          <div class="table-pc">
            <table>
              <span>
                <tr>
                  <th class="year">-</th>
                  <th class="region">地域</th>
                  <th class="tag">タグ</th>
                  <th class="summary">沿革の要約</th>
                  <th class="details">沿革の詳細</th>
                </tr>
              </span>
              <span v-for="item in company.histories" :key="item.id" class="table">
                <tr class="link">
                  <td class="year">{{ item.year }}年</td>
                  <td class="region">
                    <span class="tag-region">{{ item.region }}</span>
                  </td>
                  <td class="tag">
                    <span :class="item.tag_type" class="tag-type">{{ item.tag }}</span>
                  </td>
                  <td class="summary">{{ item.summary }}</td>
                  <td class="details">{{ item.detail }}</td>
                </tr>
              </span>
            </table>
          </div>
        </div>
        <!-- SP用の表示画面・nuxt-mqを使用 -->
        <div v-if="$mq === 'sp'" class="sp">
          <div v-for="timeLine in histories" :key="timeLine.year" class="sp-table">
            <div class="sp-timeLine-box">
              <div class="sp-timeLine-content-box shadow-sm">
                <table>
                  <tr>
                    <h3>
                      <span class="year">{{ timeLine.year }}年</span>
                      {{ timeLine.summary }}
                    </h3>
                    <p>{{ timeLine.details }}</p>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- SP/PS共通・注釈表記 -->
        <p class="notice">参考文献：{{ company.reference }}</p>
        <TheButton />
      </div>
    </div>
  </div>
</template>

<script>
import barchart from "@/components/chart/performance_bar";

export default {
  components: {
    barchart,
  },
  async asyncData({ app, params }) {
    const company = await app.$axios.$get(
      `http://localhost:8000/api/company/${params.id}`
    );
    return {
      company: company,
      labels: company.closing_year,
      datasets: company.datasets,
      performance: company.datasets.data,
      bar: {
        datasets: [
          {
            label: company.datasets.label,
            data: company.datasets.data,
            backgroundColor: "rgba(255, 99, 132, 0.8)",
          },
        ],
      },
    };
  },
};
</script>

<style lang="scss">
html {
  font-family: serif;
  font-size: 12px;
  overflow-y: scroll;
}
.tse-v4 {
  color: #5f5f5f;
  & h1 {
    font-size: 250%;
  }
  & h2 {
    font-size: 200%;
  }
}
</style>