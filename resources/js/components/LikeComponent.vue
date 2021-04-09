<template>

<div style="display: inline-block; _display: inline;">
    <button type="submit" class="btn btn-outline-primary" v-if="!like" @click="like=!like">like</button>
    <button type="submit" class="btn btn-outline-danger" v-if="like" @click="like=!like">liked!</button>
</div>
</template>

<script>
    export default {
        props: {
            proplike: String
        },
        data() {
            return { like: this.proplike }
        },
        // computed:{
        //     change(like) {
        //         like = !like;
        //     }
        // }
        
    }
</script>
