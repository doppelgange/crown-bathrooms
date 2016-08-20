import Vue from 'vue'

Vue.use(require('vue-resource'));

 //State
var store = {
    state: {
        cart: {}
    },
    updateCart: function (cart) {
        this.state.cart = cart
    }
}

new Vue({
    el: 'body',
    components: {
        CartCount: require('./components/snippets/CartCount.vue'),
        AlertMessage: require('./components/snippets/AlertMessage.vue'),

        FrontendHomeIndex:require('./components/FrontendHomeIndex.vue'),
        BackendCategoryEdit:require('./components/BackendCategoryEdit.vue'),
        BackendProductEdit:require('./components/BackendProductEdit.vue'),
        FrontendProduct:require('./components/FrontendProduct.vue'),
        FrontendCart:require('./components/FrontendCart.vue')
    }
})
