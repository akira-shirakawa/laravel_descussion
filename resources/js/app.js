import './bootstrap'
import Vue from 'vue'
import Vote from './components/Vote.vue'
import Like from './components/Like.vue'

const app = new Vue({
  el: '#app',
  components: {
    Vote,
    Like,
  }
})