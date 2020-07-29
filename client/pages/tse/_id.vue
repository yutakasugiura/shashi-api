<template>
  <div class="tse-v4">
    <div class="content-title">
      <h1>
        {{ company.name }}
        <span class="unit-80percent">の歴史</span>
      </h1>
      <div>{{ company.found_year }}年：{{ company.found_region }}にて{{ company.found_type }} | {{ company.ipo_year }}年：{{ company.ipo_type }}</div>
    </div>
    <div class="divide">
      <div class="row">
        <div class="col-md-9">
          <div class="content-summary">
            <div class="msg-box">
              <h2>
                歴史の原点：
                <strong>{{ company.summary }}</strong>
              </h2>
              <p style="white-space: pre-wrap;">{{ company.detail }}</p>
            </div>
          </div>
        </div>
        <!-- 作者コメント -->
        <div class="col-md-3">
          <div class="content-comment shadow-sm">
            <a href="https://the-shashi.com">
              <img
                src="https://the-shashi.com/img-top/face-light.png"
                width="40px"
                class="rounded-circle"
              />
            </a>
            <span>作者コメント</span>
            <p>{{ company.summary }}ことが、{{ company.name }}の歴史における原点です。</p>
            <div class="right">
              文責：
              <a href="https://the-shashi.com">Yutaka-Sugiura</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 業績ファクト -->
    <div class="divide">
      <div class="content-dataset shadow-sm">
        <div class="row">
          <!-- 経営者イラスト -->
          <div class="col-md-4">
            <div class="content-graph shadow-sm">
              <h2 class="center">創業者：{{ company.founder }}</h2>
              <img :src="company.person_img_path" :alt="founder" width="100%" />
              <div class="right">イラスト - 筆者作成</div>
            </div>
          </div>
          <!-- 売上高グラフ -->
          <div class="col-md-4">
            <div class="content-graph shadow-sm">
              <h2 class="center">売上高の歴史的推移</h2>
              <div>
                <barchart :labels="company.closing_year" :datasets="bar.sales_datasets" />
              </div>
              <div class="right">{{ company.name }} - 有価証券報告書</div>
            </div>
          </div>
          <!-- 利益グラフ -->
          <div class="col-md-4">
            <div class="content-graph shadow-sm">
              <h2 class="center">純利益の歴史的推移</h2>
              <div>
                <barchart :labels="labels" :datasets="bar.profit_datasets" />
              </div>
              <div class="right">{{ company.name }} - 有価証券報告書</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- PCおよびタブレット用の表示画面 nuxt-mqを使用 -->
    <div v-if="$mq === 'pc'">
      <div class="divide">
        <div class="content-history-title shadow-sm">
          <h2 class="center">{{ company.name }} - 歴史と沿革</h2>
        </div>
      </div>
      <table>
        <div>
          <tr>
            <th class="center year">年</th>
            <th class="center region">地域</th>
            <th class="center tag">タグ</th>
            <th class="center summary">沿革の要約</th>
            <th class="center details">沿革の詳細</th>
          </tr>
        </div>
        <div v-for="item in company.histories" :key="item.year">
          <tr class="table" for="item in company.histories" :key="item.year">
            <td class="year center">{{ item.year }}年</td>
            <td class="region center tag-type">
              <span class="region">{{ item.region }}</span>
            </td>
            <td class="tag center tag-type">
              <span :class="item.history_tag_classification">{{ item.history_tag_name }}</span>
            </td>
            <td class="summary">{{ item.summary }}</td>
            <td class="details">
              <p>{{ item.detail }}</p>
            </td>
          </tr>
        </div>
      </table>
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
      bar: {
        sales_datasets: [
          {
            label: company.datasets.sales_label,
            data: company.datasets.sales,
            backgroundColor: "rgba(150, 200, 250, 0.5)",
          },
        ],
        profit_datasets: [
          {
            label: company.datasets.profit_label,
            data: company.datasets.profit,
            backgroundColor: "rgba(250, 100, 100, 0.5)",
          },
        ],
      },
    };
  },
};
</script>

<style lang="scss">
// コンテンツの位置（サイド確定後に除去）
.content {
  width: 100%;
  margin: 10px;
}
</style>