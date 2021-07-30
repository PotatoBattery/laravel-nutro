/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('v-chart', require('./components/chart/ChartComponent').default);
Vue.component('nutro-index', require('./components/nutro/IndexComponent').default);
Vue.component('nutro-timer', require('./components/nutro/TimerSelectComponent').default);
Vue.component('nutro-timer-value', require('./components/nutro/TimerValueComponent').default);
Vue.component('nutro-music-start', require('./components/nutro/MusicSelectAndStartComponent').default);
Vue.component('nutro-chart', require('./components/nutro/NutroLineChart').default);
Vue.component('nutro-profile-item', require('./components/nutro/ProfileComponent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
