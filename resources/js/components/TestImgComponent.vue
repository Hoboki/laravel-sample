<template>
    <img v-fallback-image.once="noImageURL" :src="src" width="200" height="200" :alt="altText">
</template>

<script>
Vue.directive('fallback-image', {
    bind: function(el, binding) {
        console.log('bind', binding)
        var once = binding.modifiers.once
        el.addEventListener('error', function onError() {
            el.src = binding.value
            if(once) {
                el.removeEventListener('error', onError)
            }
        })
        
    },
    update: function(el, binding) {
        console.log('update', binding)
        if (binding.oldValue !== binding.value && binding.oldValue === el.src) {
            el.src = binding.value
        }
    }
})
export default{
    data: function() {
        return {
            src: '/images/hoboki.jpeg',
            altText: 'logo',
            noImageURL: 'https://dummyimage.com/400x400/000/ffffff.png&text=no+image+fuck'
        }
    }
}
</script>