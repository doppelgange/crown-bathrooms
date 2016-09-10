<template>
    <div class="product-carousel-wrapper">
        <div id="product-carousel" class="owl-carousel owl-theme owl-loaded">
            <div class="item">
                <img :src="featureImage"
                     class="img-responsive feature-image"
                     ></div>
            <div class="controls">
                <img v-for="image in images" :src="image.path"
                     class="thumbnail col-md-2"
                     :class = "{ 'selected': image.path == featureImage, 'selected-variant': image.variant_id == currentVariantId }"
                     @click="changeFeatureImage($index)"/>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .feature-image{
        transition: 1s;
    }
    .controls{
        margin: 10px 0;
    }
    .thumbnail{
        cursor: pointer;
        margin-right: 10px;
        opacity: 0.6;
    }
    .selected {
        opacity: 1;
    }
    .selected-variant {
        border: 1px solid rgba(0,0,0,0.1) ;
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
                default: ''
            },
            currentVariantId:{
                required: false,
                default: ''
            },
            variants:{
                type: Array,
                required: false,
                default: undefined
            }
        },
        methods:{
            changeFeatureImage:function(index){
                this.featureImage = this.images[index].path
            }
        },
        events: {
            'variant-change': function (variantId) {
                console.log(variantId)
                var variantImages = this.images.filter(function(item){
                   return item.variant_id ==  variantId
                })
                if(variantImages.length > 0 ){
                    this.featureImage = variantImages[0].path
                }
            }
        }
    }
</script>
