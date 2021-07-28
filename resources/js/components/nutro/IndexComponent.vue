<template>
    <div>
        <nutro-timer></nutro-timer>
        <nutro-music-start v-if="!timeSelect"></nutro-music-start>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",
    data(){
        return {
            timeSelect: false
        }
    },
    mounted() {
        let root = this;
        this.$root.$on('selection', function (){
            root.timeSelect = !root.timeSelect;
        });
    }
}
</script>

<style scoped>

</style>
