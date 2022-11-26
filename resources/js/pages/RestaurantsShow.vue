<template>
    <div class="container py-20">
        <h1 class="text-6xl font-bold text-center pb-6">
            {{ restaurant.name }}
        </h1>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <router-link
            :to="{
                name: 'restaurants.plateShow',
                params: { slug: plate.slug }
            }"
            v-for="plate,i in plates" :key="i" class="card_restaurant box_shadow_stroke hover:no-underline hover:bg-red-500 cursor-pointer">

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

            </router-link>

        </div>
    </div>
</template>

<script>
export default {
    props: ['slug'],
    data() {
        return {
            restaurant: '',
            plates: new Array,
        }
    },
    methods: {
            fetchRestaurant() {
                axios.get(`/api/restaurants/${this.slug}`).then(res => {
                    console.log(res.data);
                    this.restaurant = res.data.restaurant;
                    this.plates = res.data.plates;
                }).catch(err =>{
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