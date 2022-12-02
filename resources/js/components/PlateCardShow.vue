<template>

    <div class="card_restaurant box_shadow_stroke max-w-xl mx-auto relative">

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
            <ButtonToCart :plate="plate" v-if="!ids.includes(plate.id)" />
            
            <QuantityHandler :plate="plate" v-else />

        </div>
    </div>

</template>
<script>

    import ButtonToCart from './ButtonToCart.vue'
    import state from '../store'
    import QuantityHandler from './QuantityHandler.vue';

    export default {
        name: 'PlateCardShow',

        props: ['plate'],

        components: {
            ButtonToCart,
            QuantityHandler
        },

        computed: {
            ids() {
                return state.ids;
            },
        },
    }

</script>