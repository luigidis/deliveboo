<template>
    <section class="flex flex-column items-center container py-4">
        <h2 class="text-5xl text-center pb-4 font-bold">
            I ristoranti del momento
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6" v-if="restaurants">

            <!-- <div class="transition-transform card_restaurant-size flex flex-column box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95 relative" v-for="(restaurant,i) in restaurants" :key="i">
                <router-link :to="{
                        name: 'restaurants.show',
                        params: { slug: restaurant.slug }
                    }"
                class="absolute inset-0"></router-link>
                <div class="h-2/3">
                    <img class="block object-cover w-full h-full" :src="restaurant.image" alt="">
                </div>
                <div class="p-2 grow">
                    <h3 class="text-2xl font-bold">
                        {{ restaurant.name }}
                    </h3>
                    <div>
                        <span class="font-normal text-lg block leading-none mb-2">
                            {{ restaurant.address }}
                        </span>
                        <span class="font-normal block">
                            {{ restaurant.phone }}
                        </span>
                    </div> 
                    <ul class="flex flex-wrap gap-2 pt-2 pb-2">
                        <li v-for="(category, i) in restaurant.categories" :key="1000 - i"
                        class="box_shadow_stroke_small py-1 px-2 font-bold c_seco_color">
                            {{ category.name }}
                        </li>
                    </ul>
                </div>
            </div> -->
            <RestaurantCard :data="restaurant" v-for="(restaurant, i) in restaurants" :key="i"/>
        </div>

    </section>
</template>

<script>
import RestaurantCard from './RestaurantCard.vue';


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
    components: { RestaurantCard }
}

</script>