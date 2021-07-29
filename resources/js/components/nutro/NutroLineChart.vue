<template>
    <div class="statistic_graph">
        <v-chart v-if="show"
                 :chartData="chartData"
                 :chartOptions="chartOptions"
                 :chartType="chartType"/>
    </div>
</template>

<script>
export default {
    name: "NutroLineChart",
    props:{
      uid:{
          type: Number,
          required: true
      }
    },
    data()
    {
        return {
            chartType: 'line',
            chartData: {
                labels: [],
                datasets: [{
                    label: 'Статистика медитаций',
                    data: [],
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            chartOptions: {
                legend: {
                    labels: {
                        fontColor: '#686956'
                    }
                },

            },
            show: false
        }
    },
    mounted() {
        this.getChart();
    },
    methods: {
        getChart()
        {
            axios.get('/api/chart?id=' + this.uid)
            .then(response => {
                let labels = [], values = [];
                response.data.forEach(element => {
                    labels.push(element.day)
                    values.push(element.time);
                });
                this.chartData.labels = labels;
                this.chartData.datasets[0].data = values;
                this.show = true;
            });
        }
    }
}
</script>

<style scoped>

</style>
