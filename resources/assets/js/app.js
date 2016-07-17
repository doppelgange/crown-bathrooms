import Vue from 'vue'
import FrontendHomeIndex from './components/FrontendHomeIndex.vue'
import BackendCategoryEdit from './components/BackendCategoryEdit.vue'
import BackendProductEdit from './components/BackendProductEdit.vue'

Vue.use(require('vue-resource'));

new Vue({
    el: 'body',
    components: {
        FrontendHomeIndex,
        BackendCategoryEdit,
        BackendProductEdit
    }
})
