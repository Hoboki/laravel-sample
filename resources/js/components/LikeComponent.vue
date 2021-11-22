<template>

<div style="display: inline-block; _display: inline;">
    <button type="submit" class="btn" title="いいね" :class="(isLiked) ? 'btn-danger' : 'btn-outline-secondary'" @mouseleave="pleaseLike=false" @mouseover="pleaseLike=true" @click="fetch">like</button>
    <transition
        @before-enter="beforeEnter"
        @enter="enter"
        @leave="leave"
        :css="false"
    >
        <span style="display: inline-block; _display: inline; color: red;" v-if="pleaseLike && !isLiked">
        押せ
        </span>
    </transition>
</div>
</template>

<script>
    import anime from 'animejs';
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
                pleaseLike: false
            }
        },
        created(){

        },

        methods: {
            beforeEnter: function(el) {
                el.style.height = '0px';
                el.style.opacity = '0';
            },
            enter: function(el, done) {
                // 3秒かけて、透明度と高さを変更して出現させる
                anime({
                    targets: el,
                    opacity: 1,
                    height: el.scrollHeight + 'px',
                    duration: 3000,
                    complete: done
                });
            },
            leave: function(el, done) {
            anime({
                targets: el,
                opacity: 0,
                height: el.scrollHeight + 'px',
                duration: 300,
                complete: done
            });
            },
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
                    console.log(response)
                }).catch(error=>{
                    console.log(error);
                })
            }
        }

        
    }
</script>