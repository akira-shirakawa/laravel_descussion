import './bootstrap'
import Vue from 'vue'
import Vote from './components/Vote.vue'

const app = new Vue({
  el: '#app',
  components: {
    Vote,
  }
})