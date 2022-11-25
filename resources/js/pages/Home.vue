<template>
    <main class="container min-h-screen flex flex-column justify-center items-center">
        <TheLogo class="text-5xl font-bold" />
        <RestaurantSearch />
    </main>
</template>

<script>
import TheLogo from '../components/TheLogo.vue'
import RestaurantSearch from '../components/RestaurantSearch.vue'

export default {
    components: {
        RestaurantSearch,
        TheLogo,
    }
}
</script>

<style lang="scss" scoped>
</style>