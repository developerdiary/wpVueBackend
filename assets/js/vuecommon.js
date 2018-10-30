// Define a new component called button-counter
Vue.component('app-display', {
  data: function () {
    return {
      count: 0
    }
  },
  template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
})


var app = new Vue({
  el: '#app',
  data: {
    title: 'Hello Vue!'
  }
})


Vue.config.devtools = true;