<template>
    <img v-fallback-image src="../../../public/images/hoboki.jpeg" width="200" height="200">
</template>

<script>
Vue.directive('fallback-image', {
    bind: function(el) {
        el.addEventListener('error', function() {
            el.src = 'https://dummyimage.com/400x400/000/ffffff.png&text=no+image'
        })
    }
})
</script>