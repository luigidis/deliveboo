<template>
    <div class="relative card_restaurant box_shadow_stroke pb-20 hover:shadow-none hover:scale-95 ">
        <router-link :to="{
            name: 'restaurants.plateShow',
            params: { slug: plate.slug }
        }" class="absolute inset-0" :title="`Vedi piatto ${plate.name}`"></router-link>
        <div>
            <img class="block object-cover w-full h-full" :src="plate.img" :alt="`Foto piatto ${plate.name}`">
        </div>
        <div class="desc p-2 flex flex-column h-full">
            <h3 class="text-xl font-bold">
                {{ plate.name }}
            </h3>
            <p class="font-normal text-lg block leading-none mb-2">
                {{ plate.description }}
            </p>
            <span class="font-bold block text-xl items-end grow">
                {{ plate.price }}€
            </span>
        </div>
        <ButtonToCart class="cartBtn" :plate="plate" />
    </div>
</template>
<script>
import ButtonToCart from './ButtonToCart.vue'
export default {
    name: "PlateCard",
    props: ['plate'],
    components: {
        ButtonToCart
    }
}
</script>
<style lang="scss" scoped>
.cartBtn {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
}
</style>