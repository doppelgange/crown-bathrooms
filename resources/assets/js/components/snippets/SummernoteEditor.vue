<template>
    <textarea name="{{name}}" cols="30" rows="10"> </textarea>
</template>

<script>
    export default {
        template:'<textarea :name="name" cols="30" rows="10"> </textarea>',
        props: {
            name: {
                type: String,
                required: false,
                default: ""
            },
            text: {
                required: false,
                default: ""
            },
            class:{
                type:String,
                required:false,
                default:"form-control summernote"
            }
        },
        ready:function(){
            this.control = $(this.$el);
            this.control.summernote({
                lang: this.language,
                height: this.height,
                minHeight: 300,
                maxHeight: 600,
                callbacks: {
                    onInit: function() {
                        this.control.summernote("code", this.text);
                    }.bind(this),
                    onImageUpload: function(files) {
                        var data = new FormData();
                        for(var i=0;i<files.length ;i++){
                            data.append("file_"+i, files[i]);
                        }
                        this.$http.post('/backend/image',data).then(function(response){
                            for(var filename in response.data){
                                var img = document.createElement("img");
                                img.setAttribute("src", response.data[filename]);
                                this.control.summernote('insertNode',img );

                            }
                        }.bind(this), function(response) {
                            console.log('There is an error')
                        });
                    }.bind(this)
                }
            })
        }
    }
</script>

<style>
    .form-horizontal .modal-body .form-group{
        margin-left: 0px;
        margin-right: 0px;
    }
</style>