<template>
    <!-- <div class="flex gap-3"> -->
    <section class="py-20">
        <div class="container" v-if="restaurant">
            <div class="flex flex-wrap items-center gap-3 pb-20">
                <div class="box_shadow_stroke p-2">
                    <h2 class="text-6xl font-bold">
                        {{ restaurant.name }}
                    </h2>
                </div>

                <div class="box_shadow_stroke lg:ml-auto p-3">
                    <router-link :to="{
                        name: 'home'
                    }"
                        class="bg_seco_color c_text_color text-3xl font-bold box_shadow_stroke_small py-1 px-2 hover:shadow-none hover:text-white hover:no-underline">
                        Torna alla home
                    </router-link>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <PlateCard :slug="slug" :plate="plate" v-for="(plate, i) in plates" :key="92 * i" />
            </div>
            <LayoverAlert />
        </div>
        <TheLoading class="min-h-screen" v-else />
    </section>

    <!-- <div v-if="(restaurant.id == restaurantId)" class="py-20 stroke_left px-3">
            <h4 class="text-2xl">
                Il tuo carrello
            </h4>

            <div class="cart_card">
                code here
            </div>
        </div>
    </div> -->
</template>

<script>
import LayoverAlert from '../components/LayoverAlert.vue'
import PlateCard from '../components/PlateCard.vue'
import TheLoading from '../components/TheLoading.vue'
import state from '../store'


export default {
    props: ['slug'],
    components: {
    PlateCard,
    LayoverAlert,
    TheLoading
},
    data() {
        return {
            restaurant: '',
            plates: new Array,
        }
    },
    computed: {
        restaurantId() {
            return state.restaurantId;
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