<template>
    <span class="badge" :class="{'progress-bar-danger': cartCount > 0 }">{{cartCount}}</span>
</template>

<script>
    export default {
        props: {
//            cartCount:{
//                type: Number,
//                required: true,
//                default: 0
//            },
//            cartItems: {
//                type: Object,
//                required: false,
//                default: ''
//            }
        },
        data:function(){
            return {
                cartCount:0,
                cartItems:[]
            }
        },
        methods:{
            updateCart:function(data){
                if(data){
                    this.cartCount = data.cartCount
                    this.cartItems = data.cartItems
                }else{
                    this.$http.get('/api/selector').then(function(response){
                        var data = response.data
                        this.cartCount = data.cartCount
                        this.cartItems = data.cartItems
                    }.bind(this), function(response) {
                        console.log('There is an error')
                    });
                }
            }
        },
        events: {
            'cart-change': function (cart) {
                this.updateCart(cart)
            }
        },
        ready:function(){
            this.updateCart()
        }

    }
</script>

<style>
</style>



