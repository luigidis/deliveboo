<template>
    <div
        class="transition-transform card_restaurant-size flex flex-column box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95 relative">
        <router-link :to="{
            name: 'restaurants.show',
            params: { slug: data.slug }
        }" class="absolute inset-0"></router-link>
        <div class="h-2/5">
            <img class="block object-cover w-full h-full" :src="data.image" alt="">
        </div>
        <div class="p-2 grow flex flex-column">
            <h3 class="text-3xl font-bold leading-none">
                {{ data.name }}
            </h3>
            <p class="font-normal text-lg block leading-none mb-2 pt-4">
                {{ data.address }}
            </p>
            <ul class="flex flex-wrap gap-2 pt-2 pb-2 grow items-end">
                <li v-for="(category, i) in data.categories" :key="1000 - i"
                    class="box_shadow_stroke_small py-1 px-2 font-bold c_seco_color">
                    {{ category.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
    name: 'RestaurantCard',
    props: ['data']
}

</script>

<style lang="scss" scoped>
.card_restaurant-size {
    max-width: 350px;
    min-height: 450px;
}
</style>