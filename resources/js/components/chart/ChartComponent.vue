<template>
    <div>
        <canvas class="background-color">
        </canvas>
    </div>
</template>

<script>
import Chart from "chart.js/dist/chart";
export default {
    name: "ChartComponent",
    props: {
        chartType:String,
        chartData:Object,
        chartOptions:Object
    },
    mounted() {
        let {chartType, chartData, chartOptions} = this;
        this.chartConstructor(chartType, chartData, chartOptions);
    },
    methods:{
        chartConstructor(chartType, chartData, chartOptions) {
            const chartElement = document.querySelector("canvas");
            const chart = new Chart(chartElement, {
                type: chartType,
                data: chartData,
                options: chartOptions,
            });
        }
    }
}
</script>

<style scoped>
.background-color{
    background: white;
}
</style>
