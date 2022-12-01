<template>
    <div class="container py-28">
        <div v-if="plates">
                   <h1 class="text-4xl font-bold text-center pb-6">
                        Ordine per il ristorante: {{ restaurant.name }}
                    </h1>
            <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                <div class="card_restaurant box_shadow_stroke flex flex-column" v-for="plate, i in plates" :key="i">
                    <div class="">
                        <img class="block object-cover w-full h-full" :src="plate.img" alt="">
                    </div>
                    <div class="desc p-2 flex flex-column gap-3 justify-between grow">
                        <h3 class="text-lg font-bold mb-2">
                            {{ plate.name }}
                        </h3>
                        <div>

                            <QuantityHandler :plate="plate" v-if="plates"/>

                            <span class="font-normal block pt-3 text-md">
                                Totale: {{ (parseFloat(quantity[i]) * parseFloat(plate.price)).toFixed(2) }}€
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-column gap-4 items-start">
                <div class="text-xl">
                    Totale: {{ totalPrice }}€
                </div>
                <router-link :to="{
                    name: 'checkout',
                    params: { bool: true }
                }"
                    class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none">
                    Checkout
                </router-link>
            </div>
        </div>
        <div v-else>
            <h1 class="text-4xl font-bold text-center pb-6">
                Carrello vuoto
            </h1>
        </div>
    </div>
</template>

<script>
import QuantityHandler from '../components/QuantityHandler.vue';
import state from '../store';

export default {
    data() {
        return {
            plates: "",
            restaurant: "",
        };
    },
    computed: {
        totalPrice(){
            return state.totalPrice;
        },
        quantity() {
            return state.quantity;
        },
    },
    methods: {
        fetchPlates() {
            axios.get(`api/cart/plates/${state.ids}`)
                .then(res => {
                this.plates = res.data.plates;
                this.restaurant = res.data.restaurant;
            }).catch(err => {
                console.log(err);
                //redirect to 404
                this.$router.push({ name: "404" });
            });
        },
    },
    mounted() {
        this.fetchPlates();
    },
    components: { QuantityHandler }
}
</script>