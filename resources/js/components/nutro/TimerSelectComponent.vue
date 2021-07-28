<template>
    <div>
        <div class="title-container" v-if="timer">
            <div class="page-title text-white" v-if="!timerWork">
                <h1 class="page-title-l timer" v-on:click="startSelectTime">{{ value }}</h1>
            </div>
            <div class="page-title text-white" v-else>
                <h1 class="page-title-l timer" >{{ value }}</h1>
            </div>
        </div>
        <div class="timer-values" v-else>
            <div class="timer-value-empty"></div>
            <nutro-timer-value v-for="n in 60"
                               :value="prepareValue(n)"
                               :selected="prepareSelected(n)"
                               :key="n" />
            <div class="timer-value-empty"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TimerSelectComponent",
    data() {
        return {
            timer: true,
            timerWork: false,
            value: '10:00',
            selected: '10:00',
            timerElement: null
        }
    },
    mounted() {
        let currentComponent = this;
        this.$root.$on('selected', function (data){
            currentComponent.$nextTick(() => currentComponent.scrollToElement(data));
        });
        this.$root.$on('return_value', function (data){
            currentComponent.value = data;
            currentComponent.selected = data;
            currentComponent.timer = true;
            currentComponent.$root.$emit('selection');
        });
        this.$root.$on('first_start', function (){
            currentComponent.timerWork = true;
            currentComponent.startMeditationTimer();
        });
        this.$root.$on('start', function (){
            currentComponent.startMeditationTimer();
        });
        this.$root.$on('pause', function (){
            currentComponent.pauseMeditationTimer();
        });
        this.$root.$on('end', function (){
            currentComponent.pauseMeditationTimer();
            currentComponent.endMeditation();
        });
    },
    methods: {
        startSelectTime()
        {
            this.timer = false;
            this.$root.$emit('selection');
        },
        prepareValue(n)
        {
            return n < 10 ? '0'+n+':00' : n+':00';
        },
        prepareSelected(n)
        {
            let val = parseInt(this.value.split(':')[0]);
            return n === val;
        },
        scrollToElement(elem) {
            const el = elem;
            if (el) {
                el.scrollIntoView({block: "center", behavior: 'smooth'});
            }
        },
        startMeditationTimer()
        {
            this.timerElement = setInterval(() => {
                this.workWithTime();
            }, 1000)
        },
        pauseMeditationTimer()
        {
            clearInterval(this.timerElement);
        },
        endMeditation()
        {
            let selectedTime = this.selected.split(':');
            let currentTime = this.value.split(':');
            let minutes = parseInt(selectedTime[0], 10) - parseInt(currentTime[0], 10);
            let seconds = (parseInt(selectedTime[1], 10) - parseInt(currentTime[1], 10))*(-1);
            if(seconds >= 29){
                minutes = minutes - 1;
            }
            let time = minutes+'.'+seconds;
            window.location.href = '/result?time=' + time;
        },
        workWithTime()
        {
            let time = this.value.split(':'), sec = '', minutes = '';
            if(time[1] === '00'){
                sec = '59';
            }else{
                if((parseInt(time[1], 10) - 1) < 10){
                    sec = '0'+(parseInt(time[1], 10) - 1).toString();
                }else{
                    sec = (parseInt(time[1], 10) - 1).toString();
                }
            }
            if(time[1] === '00'){
                if((parseInt(time[0], 10) - 1) < 10){
                    minutes = '0'+(parseInt(time[0], 10) - 1).toString();
                }else{
                    minutes = (parseInt(time[0], 10) - 1).toString();
                }
            }else{
                minutes = time[0];
            }
            if(minutes === '00' && sec === '00'){
                this.pauseMeditationTimer();
                this.endMeditation();
            }
            this.value = minutes + ':' + sec;
        }
    }
}
</script>

<style scoped>

</style>
