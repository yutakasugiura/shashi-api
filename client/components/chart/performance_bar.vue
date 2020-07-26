<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,
  props: {
    labels: Array,
    datasets: Array,
    options: {
      type: Object,
      default: () => {
        return {
          scales: {
            xAxes: [
              {
                ticks: {
                  autoSkip: true,
                  maxTicksLimit: 2,
                  maxRotation: 0,
                  minRotation: 0,
                },
                gridLines: {
                  display: false,
                },
                scaleLabel: {
                  display: true,
                },
                stacked: true,
              },
            ],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                  // min: 0,
                  maxTicksLimit: 6,
                  callback: function (label, index, labels) {
                    return label
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  },
                },
                stacked: true,
              },
            ],
          },
          legend: {
            display: true,
          },
          tooltips: {
            callbacks: {
              beforeTitle: function () {
                // return '業績推移'
              },
              label: function (tooltipItem, data) {
                return (
                  data.datasets[0].data[tooltipItem.index]
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "億円"
                );
              },
            },
          },
        };
      },
    },
  },
  mounted: function () {
    this.renderChart(
      {
        labels: this.labels,
        datasets: this.datasets,
      },
      this.options
    );
  },
};
</script>
