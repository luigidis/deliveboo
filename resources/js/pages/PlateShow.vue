<template>
    <div class="container py-20">
        <h2 class="text-6xl font-bold text-center pb-6">
            {{ plate.name }}
        </h2>
        <!-- <div class="card_restaurant box_shadow_stroke max-w-xl  mx-auto">
            <div class="">
                <img class="block object-cover w-full h-full" :src="plate.img" alt="">
            </div>
            <div class="desc p-2">
                <div class="py-2">
                    <span class="font-normal text-lg block leading-none mb-2">
                        {{ plate.description }}
                    </span>
                    <span class="font-bold text-xl block">
                        {{ plate.price }}€
                    </span>
                </div>
               <ButtonToCart :plate="plate" />
            </div>
        </div> -->
        <PlateCardShow :plate="plate" />

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
import LayoverAlert from '../components/LayoverAlert.vue';
import PlateCardShow from '../components/PlateCardShow.vue';
import state from "../store"

export default {
    props: ["slug",],
    components: {
    PlateCardShow,
    LayoverAlert
},
    data() {
        return {
            plate: "",
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
        fetchPlate() {
            axios.get(`/api/plates/${this.slug}`).then(res => {
                console.log(res.data);
                this.plate = res.data.plate;
            }).catch(err => {
                console.log(err);
                //redirect to 404
                this.$router.push({ name: "404" });
            });
        },
    },
    beforeMount() {
        // console.log(this.$route);
        this.fetchPlate();
    },
}
</script>