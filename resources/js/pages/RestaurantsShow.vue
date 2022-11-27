<template>
    <div class="container py-20">
        <h1 class="text-6xl font-bold text-center pb-6">
            {{ restaurant.name }}
        </h1>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div v-for="plate, i in plates" :key="i"
                class="relative card_restaurant box_shadow_stroke hover:no-underline hover:bg-red-500 cursor-pointer ">
                <router-link :to="{
                    name: 'restaurants.plateShow',
                    params: { slug: plate.slug }
                }" class="absolute inset-0"></router-link>


                <div class="">
                    <img class="block object-cover w-full h-full" :src="plate.img" alt="">
                </div>
                <div class="desc p-2">
                    <h3 class="text-xl font-bold">
                        {{ plate.name }}
                    </h3>
                    <div>
                        <span class="font-normal text-lg block leading-none mb-2">
                            {{ plate.description }}
                        </span>
                        <span class="font-normal block">
                            {{ plate.price }}€
                        </span>
                    </div>
                </div>
                <!-- :cartPrice="cartPrice" :productNumber="productNumber" -->
                <ButtonToCart
                class="absolute bottom-0 z-10" :plate="plate" />
            </div>

        </div>
    </div>
</template>

<script>
import ButtonToCart from '../components/ButtonToCart.vue';

export default {
    props: ['slug'],

    components: {
        ButtonToCart,
    },

    data() {
        return {
            restaurant: '',
            plates: new Array,
            // cartPrice: null,
            // productNumber: 0,
        }
    },
    methods: {
        fetchRestaurant() {
            axios.get(`/api/restaurants/${this.slug}`).then(res => {
                console.log(res.data);
                this.restaurant = res.data.restaurant;
                this.plates = res.data.plates;
            }).catch(err => {
                console.log(err);
                //redirect to 404
                this.$router.push({ name: '404' });
            })
        }
    },
    beforeMount() {
        console.log(this.$route)
        this.fetchRestaurant();
    }
}

</script>

<style>

</style>