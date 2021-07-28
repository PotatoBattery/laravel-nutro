<template>
    <div :class="selectedClass" v-on:click="sendValue">
        {{ value }}
    </div>
</template>

<script>
export default {
    name: "TimerValueComponent",
    props: {
        value: {
            type: String,
            required: true
        },
        selected: {
            type: Boolean,
            required: true
        }
    },
    data(){
        return {
            selectedClass: ''
        }
    },
    mounted() {
        this.selectedClass = this.selected ? 'timer-value timer-value-selected' : 'timer-value';
        if(this.selected){
            this.$root.$emit('selected', this.$el);
        }
    },
    methods: {
        sendValue()
        {
            this.$root.$emit('return_value', this.value);

        }
    }
}
</script>

<style scoped>

</style>
