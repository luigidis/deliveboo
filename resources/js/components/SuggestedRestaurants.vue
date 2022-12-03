<template>
    <section class="flex flex-column items-center container py-20">
        <h2 class="text-6xl text-center mb-10 font-bold">
            I ristoranti del momento
        </h2>

        <div class="grid grid-cols-1 lg:justify-items-start w-full gap-6" v-if="restaurants">
            <RestaurantSuggestedCard :data="restaurant" :index="i" v-for="(restaurant, i) in restaurants" :key="i" 
            :class="{
                'w-full': true,
                'lg:justify-self-end': i%2 == 1,
                }"/>
        </div>

    </section>
</template>

<script>
import RestaurantSuggestedCard from './RestaurantSuggestedCard.vue';


    export default {
    name: "SuggestedRestaurants",
    data() {
        return {
            restaurants: null,
        };
    },
    methods: {
        fetchBestRestaurants() {
            axios.post("/api/restaurants/best")
                .then(res => {
                this.restaurants = res.data.restaurants;
                console.log(res);
            }).catch(err => {
                console.log(err);
                this.$router.push({ name: "404" });
            });
        },
    },
    mounted() {
        this.fetchBestRestaurants();
    },
    components: { RestaurantSuggestedCard }
}

</script>