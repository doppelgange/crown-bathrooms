<template>
    <div class="alert alert-dismissible animated"
         :class="styleClass"
         transition="fade"
         v-show="message">
        <button type="button" class="close" aria-label="Close" @click="clearMessage"><span>×</span></button>
        {{message}}
    </div>
</template>

<script>
    import Vue from 'vue'
    Vue.transition('fade', {
        enterClass: 'fadeIn',
        leaveClass: 'fadeOut'
    })

    export default {
        data:function(){
            return {
                styleClass:'',
                message:''
            }
        },
        methods:{
            showMessage:function(data){
                this.clearMessage()
                this.styleClass =data.styleClass
                this.message = data.message
                setTimeout(this.clearMessage, 5000);
            },
            clearMessage:function(){
                this.message=''
                this.styleClass=''
            }
        },
        events: {
            'show-message': function (data) {
                this.showMessage(data)
            }
        }

    }
</script>

<style>
    .alert{
        position:fixed ;
        top: 10px;
        z-index: 1;
    }
</style>



