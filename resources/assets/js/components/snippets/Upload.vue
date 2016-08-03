<template>
    <div v-if="images" v-for="image in images" class="img-thumbnail">
        <img :src="image.path"/>
        <input :name="name" :value="image.id" type="hidden">
        <span class="fa fa-trash remove-image" @click="removeImage" aria-hidden="true"></span>
    </div>
    <input type="file" @change = "uploadImage" multiple>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: false,
                default: ''
            },
            url: {
                required: false,
                default: '/backend/image'
            }
        },
        data:function(){
                return {images:[]};
        },
        methods:{
            uploadImage:function(e) {
                var files = e.target.files || e.dataTransfer.files;
                var data = new FormData();
                for(var i=0;i<files.length ;i++){
                    data.append("file_"+i, files[i]);
                }
                this.$http.post('/backend/image',data).then(function(response){
                    for(var file in response.data){
                        console.log(response.data[file].path)
                        this.images.push(response.data[file]);
                    }
                }.bind(this), function(response) {
                    console.log('There is an error')
                });
            },
            removeImage:function(e){
                var image = e.path[1];
                image.remove();
            }
        }

    }
</script>

<style>
    .img-thumbnail img{
        max-width: 200px;
        max-height: 200px;
    }
    .img-thumbnail{
        margin:5px;
        position: relative;
    }

    .img-thumbnail:hover .remove-image {
        background: rgba(255,255,255,1);
        color: #ff0000;
    }
    .remove-image {
        position: absolute;
        top: 1em;
        right: 1em;
        background: rgba(255,255,255,0.8);
        width: 2em;
        height: 2em;
        border-radius: 1em;
        line-height: 2em;
        text-align: center;
        cursor: pointer;
    }
</style>



