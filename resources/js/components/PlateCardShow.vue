<template>
    <div class="box_shadow_stroke max-w-xl mx-auto relative">
        <div>
            <img class="block object-cover w-full h-full" :src="plate.image_path" :alt="`Foto piatto ${plate.name}`">
        </div>
        <div class="desc p-2">
            <div class="py-2">
                <span class="font-normal text-3xl block leading-none mb-2">
                    {{ plate.description }}
                </span>
                <!-- <span class="font-bold text-5xl py-2 block">
                    &euro;{{ plate.price }}
                </span> -->
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