<script>

    export default {
        data:function(){
            return { hideItems:[]}
        },
        methods:{
            removeItem:function(rowId,e){
                this.$http.delete('/api/selector/'+rowId).then(function(response){
                    this.$parent.$broadcast(
                        'show-message',{
                            message:'Item has been deleted successfully!',
                            styleClass:'alert-success'
                        }
                    )
                }.bind(this), function(response) {
                    console.log('There is an error')
                });
                this.$parent.$broadcast('cart-change')
                this.hideItems.$set(this.hideItems.length,rowId)
            },
            updateQty:function(rowId,e){
                var qty = e.target.value
                this.$http.put('/api/selector/'+rowId,{qty: qty}).then(function(response){
                    this.$parent.$broadcast('cart-change')
                    this.$parent.$broadcast(
                        'show-message',{
                            message:'Item qty has been updated to '+qty+' successfully!',
                            styleClass:'alert-success'
                        }
                    )
                }.bind(this), function(response) {
                    console.log('There is an error')
                });
            }
        }

    }
</script>
