<template>
    <div class="content content-with-timer">
        <div class="block">
            <audio :src="selected.link" ref="audioElement" loop></audio>
            <a href="#" :class="music" v-on:click="showSelect" v-if="!select">{{ selected.title }}</a>
            <div :class="musicSelector" v-else>
                <nutro-music-value link="not-file-link"
                                   :music-name="locale === 'ru' ? 'Без звука' : 'No sound'"
                                   :music-class="musicSelectorValue"
                                   :selected="prepareSelected('not-file-link')"></nutro-music-value>
                <nutro-music-value v-for="item in sound"
                                   :key="item.id"
                                   :link="'/storage/' + item.file_path"
                                   :music-name="locale === 'ru' ? item.ru_name : item.en_name"
                                   :music-class="musicSelectorValue"
                                   :selected="prepareSelected('/storage/' + item.file_path)"></nutro-music-value>
            </div>
            <button :class="'button ' + fill + ' button-s button-start'" v-on:click="startMeditation" v-if="start">
                {{ locale === 'ru' ? 'Начать' : 'Start' }}
            </button>
            <button :class="'button ' + transparent + ' button-pause'" v-if="!start && pause" v-on:click="meditationControl">
                {{ locale === 'ru' ? 'Пауза' : 'Pause' }}
            </button>
            <span v-if="!start && !pause">
                <button :class="'button ' + fill + ' button-s button-start'" v-on:click="meditationControl">
                    {{ locale === 'ru' ? 'Продолжить' : 'Continue' }}
                </button>
                <button :class="'button ' + fill + ' button-s button-end'" v-on:click="endMeditation">
                    {{ locale === 'ru' ? 'Закончить' : 'Finish' }}
                </button>
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
        },
        musicSelector: {
            type: String,
            require: true
        },
        musicSelectorValue: {
            type: String,
            require: true
        },
        locale: {
            type: String,
            require: true
        }
    },
    data() {
        return {
            start: true,
            pause: true,
            select: false,
            sound: [],
            selected:{
                link: 'not-file-link',
                title: this.locale === 'ru' ? 'Без звука' : 'No sound'
            },
            audioSrc: 'not-file-link'
        }
    },
    mounted(){
        this.getMusic();
        let currentComponent = this;
        this.$root.$on('selected-music', function (data){
            currentComponent.$nextTick(() => currentComponent.scrollToElement(data));
        });
        this.$root.$on('return_link', function (link, name){
            currentComponent.selected.link = link;
            currentComponent.selected.title = name;
            currentComponent.select = false;
        });
    },
    methods: {
        getMusic()
        {
            axios.get('/api/music')
            .then(response => {
                this.sound = response.data;
            });
        },
        startMeditation()
        {
            this.start = false
            if(this.selected.link !== 'not-file-link') this.$refs.audioElement.play();
            this.$root.$emit('first_start', this.$el);
        },
        meditationControl()
        {
            this.pause = !this.pause;
            if(this.selected.link !== 'not-file-link'){
                this.pause ? this.$refs.audioElement.play() : this.$refs.audioElement.pause();
            }
            this.pause ? this.$root.$emit('start', this.$el) : this.$root.$emit('pause', this.$el);
        },
        endMeditation()
        {
            if(this.selected.link !== 'not-file-link') this.$refs.audioElement.stop();
            this.$root.$emit('end', this.$el)
        },
        showSelect()
        {
            if(this.start){
                this.select = true;
            }
        },
        prepareSelected(link)
        {
            return link === this.selected.link;
        },
        scrollToElement(elem) {
            const el = elem;
            if (el) {
                el.scrollIntoView({block: "center", behavior: 'smooth'});
            }
        },
    }
}
</script>

<style scoped>

</style>
