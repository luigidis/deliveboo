<template>
    <main>
        <!-- <TheLogo />
        <RestaurantSearch /> -->
        <JumboTron />
    </main>
</template>

<script>
import TheLogo from '../components/TheLogo.vue';
import RestaurantSearch from '../components/RestaurantSearch.vue';
import JumboTron from '../components/JumboTron.vue';

export default {
    components: {
    RestaurantSearch,
    TheLogo,
    JumboTron
}
}
</script>