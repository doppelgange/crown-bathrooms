<template>
    <div class="product-carousel-wrapper">
        <div id="product-carousel" class="owl-carousel owl-theme owl-loaded">
            <div class="item">
                <img :src="featureImage" class="img-responsive feature-image" alt=""></div>
            <div class="controls">
                <img v-for="image in images" :src="image.path"
                     class="thumbnail col-md-2"
                     @click="changeFeatureImage($index)"/>
            </div>
        </div>
    </div>
</template>
<style>
    .feature-image{
        transition: 1s;
    }
    .controls{
        margin: 10px 0;
    }
    .thumbnail{
        cursor: pointer;
        margin-right: 10px;
    }
</style>
<script>

    export default {
        props: {
            images: {
                type: Array,
                required: true,
                default: []
            },
            featureImage:{
                required: true,
                default:''
            },
            currentVariantId:{
                required: false,
                default: ''
            }
        },
        methods:{
            changeFeatureImage:function($index){
                this.featureImage = this.images[$index].path
            }
        }
    }
</script>
