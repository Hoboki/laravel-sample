<template>

<div style="display: inline-block; _display: inline;">
    <button type="submit" class="btn" :class="(isLiked) ? 'btn-danger' : 'btn-primary'" 
    @click="fetch">like</button>
</div>
</template>

<script>
    export default {
        props: {
            propIsLiked: String,
            propPersonId: String,
            propPostId: String,
        },
        data() {
            return { 
                isLiked: this.propIsLiked,
                url: '',
            }
        },
        created(){

        },

        methods: {
            fetch(){
                if (this.isLiked){
                    this.url = '/posts/dislike';
                }else{
                    this.url = '/posts/like';
                }
                axios.post(this.url,{
                    postId: this.propPostId,
                    personId: this.propPersonId
                }).then(response=>{
                    this.isLiked = !this.isLiked;
                }).catch(error=>{
                    console.log(error);
                })
            }
        }

        
    }
</script>
