<template>
    <div class="container" :class="plates ? 'py-28' : ''">


        <TheLoading v-if="load" />

        <div v-if="(plates && !empty)">

            <div class="flex mb-3 flex-wrap gap-3 items-start">
                <h1 class="text-5xl px-2 py-3 box_shadow_stroke leading-none grow lg:grow-0">
                    Ordine per il ristorante: <span class="font-bold">{{ restaurant.name }}</span>
                </h1>
                <div
                    class="flex flex-column gap-4 items-start box_shadow_stroke p-2 w-fit sm:mr-auto lg:ml-auto lg:mr-0">
                    <div class="text-4xl">
                        Totale: <span class="font-bold">&euro;{{ totalPrice }}</span>
                    </div>
                    <router-link :to="{
                        name: 'checkout',
                        params: { bool: true }
                    }" title="Vai alla cassa"
                        class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-2xl font-bold py-1 px-2 card_button ml-auto hover:shadow-none">
                        Vai alla cassa
                    </router-link>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                <div class="box_shadow_stroke" v-for="plate, i in plates" :key="i">
                    <div class="h-60">
                        <img class="block object-cover w-full h-full" :src="plate.image_path"
                            :alt="`Foto piatto ${plate.name}`">
                    </div>
                    <div class="p-2 flex flex-column">
                        <h3 class="text-4xl font-bold truncate">
                            {{ plate.name }}
                        </h3>
                        <span class="font-normal text-lg py-3">
                            Totale piatto: <span class="font-bold">&euro;{{ (parseFloat(quantity[i]) *
                                    parseFloat(plate.price)).toFixed(2)
                            }}</span>
                        </span>
                        <QuantityHandler :plate="plate" v-if="plates" />
                    </div>
                </div>
            </div>
            <div class="flex justify-content-end mt-12" @click="clearCart">
                <button
                    class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2 hover:shadow-none">
                    Svuota carrello
                </button>
            </div>

        </div>
        <TheLoading class="min-h-screen" v-if="!plates && !empty" />

        <div class="flex items-center justify-center h-screen flex-col gap-3" v-if="empty">
            <h1 class="text-4xl font-bold text-center pb-6">
                Carrello vuoto.
            </h1>

            <router-link :to="{
                name: 'home',
            }" class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2"
                title="Torna al carrello">
                Torna alla home
            </router-link>
        </div>

    </div>
</template>

<script>
import QuantityHandler from '../components/QuantityHandler.vue';
import state from '../store';
import TheLoading from '../components/TheLoading.vue';


export default {
    data() {
        return {
            plates: "",
            restaurant: "",
            load: false,
            empty: false,
        };
    },
    computed: {
        totalPrice() {
            return state.totalPrice;
        },
        quantity() {
            return state.quantity;
        },
        ids() {
            return state.ids;
        }
    },
    methods: {
        fetchPlates() {
            axios.get(`api/cart/plates/${this.ids}`)
                .then(res => {
                    this.plates = res.data.plates;
                    if (!this.plates)
                        this.empty = true;
                    this.restaurant = res.data.restaurant;
                }).catch(err => {
                    console.log(err);
                    //redirect to 404
                    this.$router.push({ name: "404" });
                });
        },
        clearCart() {
            localStorage.clear();
            state.restaurantId = localStorage.getItem('restaurantId');
            state.totalItems = localStorage.getItem('totalPrice') || 0;
            state.ids = [];
            state.quantity = [];
        },
    },
    mounted() {
        this.fetchPlates();
    },
    watch: {
        ids() {
            this.load = true;
            window.location.reload();
        }
    },
    components: { QuantityHandler, TheLoading }
}
</script>