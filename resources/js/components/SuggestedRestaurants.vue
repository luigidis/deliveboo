<template>
    <div class="container">
        <h2 class="text-center text-3xl pt-10 pb-4 font-bold">
            I ristoranti del momento:
        </h2>

        <div class="grid grid-cols-6 gap-6" v-if="restaurants">

            <div class="card_content card_restaurant box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95 relative" v-for="(restaurant,i) in restaurants" :key="i">
                <router-link :to="{
                        name: 'restaurants.show',
                        params: { slug: restaurant.slug }
                    }"
                class="absolute inset-0"></router-link>
                <div class="h-1/3">
                    <img class="block object-cover w-full h-full" :src="restaurant.image" alt="">
                </div>
                <div class="desc p-2">
                    <h3 class="text-xl font-bold">
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
                    <ul class="flex flex-wrap gap-2 pt-2">
                        <li v-for="(category, i) in restaurant.categories" :key="1000 - i"
                        class="box_shadow_stroke_small py-1 px-2 font-bold c_seco_color">
                        {{ category.name }}
                    </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: 'SuggestedRestaurants',
        data() {
            return {
                restaurants: null,
            }
        },
        methods: {
            fetchBestRestaurants() {
                axios.post('/api/restaurants/best')
                .then(res => {
                    this.restaurants = res.data.restaurants;
                    console.log(res);
            }).catch(err => {
                console.log(err);
                // this.$router.push({ name: '404' });
            });
            },
        },
        mounted() {
            this.fetchBestRestaurants();
        },
    }

</script>

<style>

</style>