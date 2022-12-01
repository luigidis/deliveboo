<template>
    <main class="flex flex-column justify-center py-16">
        <!-- <div class="min-h-screen flex flex-column justify-center"> -->
            <TheLogo />
            <RestaurantSearch />
        <!-- </div> -->
        <SuggestedRestaurants />
        <!-- <JumboTron /> -->
    </main>
</template>

<script>
import TheLogo from '../components/TheLogo.vue';
import RestaurantSearch from '../components/RestaurantSearch.vue';
import SuggestedRestaurants from '../components/SuggestedRestaurants.vue';

// import JumboTron from '../components/JumboTron.vue';

export default {
    components: {
        RestaurantSearch,
        TheLogo,
        SuggestedRestaurants
        // JumboTron
    }
}

</script>