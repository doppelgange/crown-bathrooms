<script>

    export default {
        components:{
            'product-image-slider': require('./snippets/ProductImageSlider.vue')
        },
        methods:{
            updateVariant:function(e){
                console.log(e.value);
            }
        }
    }
</script>
