<template>
    <div class="gsap_anim relative box_shadow_stroke pb-20 hover:shadow-none">
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
import gsap from 'gsap'
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
    mounted(){
        gsap.to('.gsap_anim', {
            y: 0,    
            opacity: 1,
            stagger: 0.2,
            duration: 2.5,
            ease: "power4.inOut",
        })
    }
}
</script>
<style lang="scss" scoped>
.gsap_anim{
    transform: translateY(200px);
    opacity: 0;
    transition: transform 800ms cubic-bezier(0.075, 0.82, 0.165, 1);
    &:hover{
        transform: scale(0.95) !important;
    }
}
</style>