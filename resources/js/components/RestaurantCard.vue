<template>
    <router-link
    :to="{
        name: 'restaurants.show',
        params: { slug: data.slug }
    }"
    class="card_content card_restaurant box_shadow_stroke hover:no-underline hover:bg-red-500">
        <div class="h-1/3">
            <img class="block object-cover w-full h-full" :src="data.image" alt="">
        </div>
        <div class="desc p-2">
            <h3 class="text-xl font-bold">
                {{ data.name }}
            </h3>
            <div>
                <span class="font-normal text-lg block leading-none mb-2">
                    {{ data.address }}
                </span>
                <span class="font-normal block">
                    {{ data.phone }}
                </span>
            </div>
            <ul class="flex flex-wrap gap-2 pt-2">
                <li v-for="(category, i) in data.categories" :key="1000 - i" class="box_shadow_stroke_small py-1 px-2 font-bold c_seco_color">
                    {{ category.name }}
                </li>
            </ul>
        </div>
    </router-link>
</template>
<script>
export default {
    name: 'RestaurantCard',
    props: ['data']
}
</script>