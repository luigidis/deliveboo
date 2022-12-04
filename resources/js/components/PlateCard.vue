<template>
    <div class="relative box_shadow_stroke pb-20 hover:shadow-none hover:scale-95 transition-transform ">
        <router-link :to="{
            name: 'restaurants.plateShow',
            params: { slug: plate.slug, restSlug: slug }
        }" class="absolute inset-0" :title="`Vedi piatto ${plate.name}`"></router-link>
        <div class="h-60">
            <img class="block object-cover w-full h-full" :src="plate.image_path" :alt="`Foto piatto ${plate.name}`">
        </div>
        <div class="p-2 flex flex-column">
            <h3 class="text-4xl font-bold truncate">
                {{ plate.name }}
            </h3>
            <p class="font-normal text-xl block leading-none mb-2 truncate">
                {{ plate.description }}
            </p>
            <span class="font-bold text-4xl text-center items-end">
                {{ plate.price }}€
            </span>
        </div>
        <div class="absolute bottom-5 inset-x-0 flex justify-center">
            <ButtonToCart class="w-4/5" :plate="plate" v-if="!ids.includes(plate.id)" />

            <QuantityHandler class="w-4/5" :plate="plate" v-else />
        </div>
    </div>
</template>

<script>

import ButtonToCart from './ButtonToCart.vue'
import state from '../store'
import QuantityHandler from './QuantityHandler.vue';

export default {
    name: "PlateCard",

    props: ['plate', 'slug'],

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