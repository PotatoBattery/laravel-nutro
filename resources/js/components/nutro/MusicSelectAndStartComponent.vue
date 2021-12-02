<template>
    <div class="content content-with-timer">
        <div class="block">
            <a href="#" :class="music">звуки леса</a>
            <button :class="'button ' + fill + ' button-s button-start'" v-on:click="startMeditation" v-if="start">Начать</button>
            <button :class="'button ' + transparent + ' button-pause'" v-if="!start && pause" v-on:click="meditationControl">Пауза</button>
            <span v-if="!start && !pause">
                <button :class="'button ' + fill + ' button-s button-start'" v-on:click="meditationControl">Продолжить</button>
                <button :class="'button ' + fill + ' button-s button-end'" v-on:click="endMeditation">Закончить</button>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "MusicSelectAndStartComponent",
    props:
    {
        fill: {
            type: String,
            require: true
        },
        transparent: {
            type: String,
            require: true
        },
        music: {
            type: String,
            require: true
        }
    },
    data() {
        return {
            start: true,
            pause: true
        }
    },
    mounted(){
        console.log(this.fill)
    },
    methods: {
        startMeditation()
        {
            this.start = false
            this.$root.$emit('first_start', this.$el);
        },
        meditationControl()
        {
            this.pause = !this.pause;
            this.pause ? this.$root.$emit('start', this.$el) : this.$root.$emit('pause', this.$el);
        },
        endMeditation()
        {
            this.$root.$emit('end', this.$el)
        }
    }
}
</script>

<style scoped>

</style>
