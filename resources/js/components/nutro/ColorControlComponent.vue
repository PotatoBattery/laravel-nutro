<template>
    <div :class="colorClass">
        <label for="color" :class="labelColor">{{ label }}</label>
        <input type="checkbox" name="color" id="color" v-model="checked">
        <label for="color" v-on:click="changeColor"></label>
    </div>
</template>

<script>
export default {
    name: "ColorControlComponent",
    props:{
        label: {
            type: String,
            require: true
        },
        theme: {
            type: String,
            require: true
        },
        selectedClass: {
            type: String,
            require: true
        }
    },
    data(){
        return {
            checked: this.theme === 'wb',
            colorClass: 'setting-menu-item '+this.selectedClass,
            labelColor: ''
        }
    },
    mounted() {
        this.labelColor = this.checked ? 'black' : '';
    },
    methods: {
        changeColor(){
            let theme = this.checked ? 'colored' : 'wb';
            axios.get('/api/color?theme=' + theme)
            .then(() => {
                window.location.reload(true);
            });
        }
    }
}
</script>

<style scoped>
    .black{
        color: black;
    }
</style>
