<template>
    <div class="content content-with-timer">
        <div class="block">
            <a href="#" class="music-link">звуки леса</a>
            <button class="button button-fill button-s button-start" v-on:click="startMeditation" v-if="start">Начать</button>
            <button class="button button-transparent button-pause" v-if="!start && pause" v-on:click="meditationControl">Пауза</button>
            <span v-if="!start && !pause">
                <button class="button button-transparent button-start" v-on:click="meditationControl">Продолжить</button>
                <button class="button button-fill button-end " v-on:click="endMeditation">Закончить</button>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "MusicSelectAndStartComponent",
    data() {
        return {
            start: true,
            pause: true
        }
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
