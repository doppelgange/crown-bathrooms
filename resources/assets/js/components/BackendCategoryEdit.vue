<script>
    var SummernoteEditor = require('./snippets/SummernoteEditor.vue')
    export default {
        data:function(){
            return {
                description:''
            }
        },
        components:{
            'summernote-editor': SummernoteEditor
        },
        ready:function(){
            $('.summernote').summernote({
                minHeight: 300,             // set minimum height of editor
                callbacks: {
                    onImageUpload: function(files) {
                        var data = new FormData();
                        for(var i=0;i<files.length ;i++){
                            data.append("file_"+i, files[i]);
                        }
                        this.$http.post('/backend/image',data).then((response) => {
                            for(var filename in response.data){
                                var img = document.createElement
                                var img = document.createElement("img");
                                img.setAttribute("src", response.data[filename]);
                                $('.summernote').summernote('insertNode',img );

                            }
                        }, (response) => {
                            console.log('There is an error')
                        });
                    }.bind(this)
                }
            });
        }
    }
</script>

<style>
    .form-horizontal .modal-body .form-group{
        margin-left: 0px;
        margin-right: 0px;
   }
</style>