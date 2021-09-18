<template>
    <div>
        <nutro-timer :timer-values="classes.timer_values" :timer-value="classes.timer_value" :text="classes.text_white"></nutro-timer>
        <nutro-music-start v-if="!timeSelect" :fill="classes.button_fill" :transparent="classes.button_transparent" :music="classes.music_link"></nutro-music-start>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    props: {
        classes: {
            type: Object,
            require: true
        }
    },
    data(){
        return {
            timeSelect: false
        }
    },
    mounted() {
        console.log(this.classes);
        let root = this;
        this.$root.$on('selection', function (){
            root.timeSelect = !root.timeSelect;
        });
    }
}
</script>

<style scoped>

</style>
