<template>
    <div>
        <button>
            <slot name="123">123</slot>
        </button>
        <br>
        <button>
            <slot name="456" >{{ textLabel }}</slot>
        </button>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            textLabel: 'child'
        }
    }
}
</script>