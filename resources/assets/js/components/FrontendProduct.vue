<script>

    export default {
        components:{
            'product-image-slider': require('./snippets/ProductImageSlider.vue')
        },
        props: {
            variants:{
                type: Array,
                required: false,
                default: []
            }
        },
        data:function(){
            return {
                selectedVariantIndex:0,
                buttonDisabled:false
            }
        },
        computed:{
            variant: function(){
                return this.variants[this.selectedVariantIndex]
            }
        },
        methods:{
            updateVariant:function(index){
                this.selectedVariantIndex = index
            },
            addToCart:function(variantId){
                this.$http.post('/selector',{variant_id:variantId}).then(function(response){
                    this.buttonDisabled = true
                }.bind(this), function(response) {
                    console.log('There is an error')
                });
            }
        }

    }
</script>
