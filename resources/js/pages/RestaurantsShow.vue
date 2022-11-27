<template>
    <div class="container py-20">
        <h1 class="text-6xl font-bold text-center pb-6">
            {{ restaurant.name }}
        </h1>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div v-for="plate, i in plates" :key="i"
                class="relative card_restaurant box_shadow_stroke hover:no-underline hover:bg-red-500 cursor-pointer pb-20">
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
            </div>

        </div>
        <div class="layover" v-if="error">
            <div class="my_alert">
                <span class="text-xl text-center">
                    Hai un ordine in corso per un altro ristorante, svuotare il carrello?
                </span>
                <div class="flex gap-6">
                    <button @click="clearCart(true)" class="btn bg-red-500 font-bold hover:bg-red-800">
                        Svuota
                    </button>
                    <button @click="clearCart(false)" class="btn bg-sky-500 font-bold hover:bg-sky-800">
                        Annulla
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonToCart from '../components/ButtonToCart.vue';
import state from "../store";

export default {
    props: ['slug'],

    components: {
        ButtonToCart,
    },

    data() {
        return {
            restaurant: '',
            plates: new Array,
        }
    },
    computed: {
        error() {
            return state.error;
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
        },
        clearCart(bool) {
            if(!bool) {
                state.error = false;
            } else {
                localStorage.clear();
                localStorage.setItem('totalPrice', state.lastPlate.price);
                localStorage.setItem('restaurantId', state.lastPlate.restaurant_id);
                state.totalItems = 1;
                localStorage.setItem('totalItems', 1);
                localStorage.setItem(`quantity%${state.lastPlate.id}`, 1);
                state.error = false;
            }
        },
    },
    beforeMount() {
        console.log(this.$route)
        this.fetchRestaurant();
    }
}

</script>

<style lang="scss" scoped>

    .cartBtn{
        position: absolute;
        bottom: 1rem;
        left: 50%;
        transform: translateX(-50%);
    }

    .layover {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 100000;
        background-color: rgba(0, 0, 0, 0.5);

        .my_alert {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #FFF;
            flex-direction: column;
            gap: 3rem;
            box-shadow: 0 0 5px #000;
            border-radius: 2rem;
        }
    }

</style>