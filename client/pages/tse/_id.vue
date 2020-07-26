<template>
  <div class="content">
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
                  <strong>{{ company.summary }}</strong>
                </h2>
                <p style="white-space: pre-wrap;">{{ company.detail }}</p>
              </div>
            </div>
          </div>
          <!-- 作者コメント -->
          <div class="col-md-3">
            <div class="content-comment shadow-sm">
              <img
                src="https://the-shashi.com/img-top/face-light.png"
                width="40px"
                class="rounded-circle"
              />
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
// 全体設定（仮置き）
html {
  font-family: serif;
  font-size: 13px;
  line-height: 1.5;
}
.content {
  width: 75%;
  margin: 10px;
}
p {
  line-height: 1.7;
}
a {
  color: #5f5f5f;
}
// 全体設定（共通）
span.unit-80percent {
  font-size: 60%;
}
.center {
  text-align: center;
}
.right {
  text-align: right;
}
.divide {
  padding: 5px 0px;
}

//　全体設定(Bootstrap)
.row,
.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12 {
  padding: 0px;
  margin: 0px;
}

// 歴史概略設定
.color-test {
  color: rgb(163, 206, 255);
}
.tse-v4 {
  color: #5f5f5f;
  & h1 {
    font-size: 250%;
  }
  & h2 {
    font-size: 150%;
    padding: 10px;
  }
  & .msg-box {
    background: #fff;
    padding: 10px;
    border-radius: 5px;
  }
  & .content-title {
    padding: 10px;
  }
  & .content-summary {
    padding: 5px;
    background: rgb(220, 240, 230);
    border-radius: 5px;
  }
  .content-comment {
    position: relative;
    display: inline-block;
    margin: 20px;
    padding: 10px;
    width: 90%;
    color: rgb(32, 32, 32);
    background: rgb(232, 255, 241);
    & :before {
      content: "";
      position: absolute;
      top: 50%;
      left: -30px;
      margin-top: -20px;
      border: 15px solid transparent;
      border-right: 15px solid rgb(232, 255, 241);
    }
  }
  & .content-dataset {
    padding: 0px;
    background: rgb(220, 240, 230);
    border-radius: 5px;
  }
  & .content-graph {
    margin: 5px;
    padding: 5px;
    background: #fff;
    border-radius: 10px;
  }
  //テーブル
}
</style>