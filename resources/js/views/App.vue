<template>
    <div>
        <TheHeader />
        <router-view></router-view>
        <TheFooter />
    </div>
</template>

<script>
import TheHeader from '../components/TheHeader.vue';
import TheFooter from '../components/TheFooter.vue';

export default {
    components: {
        TheHeader,
        TheFooter
    },
    watch: {
        $route() {
            console.log('aioaiao');
            window.scrollTo({
                top: 0
            });
        },
    },
}
</script>