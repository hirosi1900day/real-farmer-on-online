<template>
    <div class="flex">
        <div>
            <router-link to="/templateService">利用規約</router-link>
            <router-link to="/contact">お問合せ</router-link>
        </div>
        <div>
        　　<router-link to="/plant">植えることが可能な植物</router-link>
        　　<div>footer</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
