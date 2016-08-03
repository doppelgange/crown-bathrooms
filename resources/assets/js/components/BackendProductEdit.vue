<script>
    export default {
        components:{
            'summernote-editor': require('./snippets/SummernoteEditor.vue'),
            'upload': require('./snippets/Upload.vue')
        },
        methods:{
            removeImage:function(e){
                var image = e.path[1];
                image.remove();
            }
        }
    }
</script>
