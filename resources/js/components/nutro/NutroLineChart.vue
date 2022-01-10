<template>
    <div class="statistic_graph">
        <v-chart v-if="show"
                 :chartData="chartData"
                 :chartOptions="chartOptions"
                 :chartType="chartType"
                 :theme="chartColor"/>
    </div>
</template>

<script>
export default {
    name: "NutroLineChart",
    props:{
        uid:{
            type: Number,
            required: true
        },
        translate: {
            type: String,
            require: true
        },
        theme: {
            type: Boolean,
            require: true
        },
    },
    data()
    {
        return {
            chartColor: '',
            chartType: 'line',
            chartData: {
                labels: [],
                datasets: [{
                    label: this.translate,
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
        this.chartColor = this.theme ? 'chart-background' : 'chart-background-wb';
        this.chartData.datasets[0].borderColor = this.theme ? 'rgb(75, 192, 192)' : 'rgb(255 255 255)';
        this.chartOptions.legend.labels.fontColor = this.theme ? '#686956' : '#FFFFFF';
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
