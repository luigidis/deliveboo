<template>
    <div class="container py-20">
        <h2 class="text-6xl font-bold text-center pb-6">
            {{ restaurant.name }}
        </h2>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- <div v-for="plate, i in plates" :key="i"
                class="relative card_restaurant box_shadow_stroke cursor-pointer pb-20 hover:shadow-none hover:scale-95 ">
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
                <ButtonToCart class="cartBtn" :plate="plate" />
            </div> -->
            <PlateCard :plate="plate" v-for="(plate, i) in plates" :key="92 * i" />

        </div>
        <!-- <div class="layover" v-if="error">
            <div class="my_alert box_shadow_stroke ">
                <span class="text-xl text-center font-bold">
                    Hai un ordine in corso per un altro ristorante, svuotare il carrello?
                </span>
                <div class="flex gap-6">
                    <button @click="clearCart(false)"
                        class="box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 leading-none font-normal hover:shadow-none">
                        Non svuotare il carrello
                    </button>
                    <button @click="clearCart(true)"
                        class="box_shadow_stroke_small bg_seco_color c_text_color text-xl py-1 px-2 leading-none font-normal hover:shadow-none">
                        Svuota il carrello
                    </button>
                </div>
            </div>
        </div> -->
        <LayoverAlert />
    </div>
</template>

<script>
import LayoverAlert from '../components/LayoverAlert.vue'
import PlateCard from '../components/PlateCard.vue'
import state from "../store"

export default {
    props: ['slug'],
    components: {
    PlateCard,
    LayoverAlert
},
    data() {
        return {
            restaurant: '',
            plates: new Array,
        }
    },
    // computed: {
    //     error() {
    //         const bodyEl = document.querySelector('body')
    //         if (state.error) {
    //             bodyEl.style.overflowY = 'hidden';
    //         } else {
    //             bodyEl.style.overflowY = 'auto';
    //         }
    //         return state.error;
    //     }
    // },
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
        },
        // clearCart(bool) {
        //     if (!bool) {
        //         state.error = false;
        //     } else {
        //         localStorage.clear();
        //         localStorage.setItem('totalPrice', state.lastPlate.price);
        //         localStorage.setItem('restaurantId', state.lastPlate.restaurant_id);
        //         state.totalItems = 1;
        //         localStorage.setItem('totalItems', 1);
        //         localStorage.setItem(`quantity%${state.lastPlate.id}`, 1);
        //         state.error = false;
        //     }
        // },
    },
    beforeMount() {
        console.log(this.$route)
        this.fetchRestaurant();
    }
}

</script>

<style lang="scss" scoped>
.layover {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 100000;
    background-color: #00000095;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    .my_alert {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 5rem;
        gap: 3rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        background-color: #f7f7f7;
    }
}
</style>