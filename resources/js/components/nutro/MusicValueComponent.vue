<template>
    <div :class="itemClass" v-on:click="selectMusic">
        {{ musicName }}
    </div>
</template>

<script>
export default {
    name: "MusicValueComponent",
    props:{
        link: {
            type: String,
            required: true
        },
        musicName: {
            type: String,
            required: true
        },
        selected: {
            type: Boolean,
            required: true
        },
    },
    data(){
        return {
            itemClass: ''
        }
    },
    mounted () {
        this.itemClass = this.selected ? 'music-value timer-value-selected' : 'music-value';
        if(this.selected){
            this.$root.$emit('selected-music', this.$el);
        }
    },
    methods: {
        selectMusic()
        {
            this.$root.$emit('return_link', this.link, this.musicName);
        }
    }
}
</script>

<style scoped>

</style>
