<template>
    <div
        class="transition-transform flex flex-column box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95 relative">
        <router-link :to="{
            name: 'restaurants.show',
            params: { slug: data.slug }
        }" class="absolute inset-0"></router-link>
        <div class="h-60">
            <img class="block object-cover object-center w-full h-full" :src="data.image_path">
        </div>
        <div class="p-2 flex grow flex-column w-full">
            <h3 class="text-3xl font-bold leading-none">
                {{ data.name }}
            </h3>
            <p class="font-normal text-2xl block leading-none mb-2 pt-4">
                {{ data.address }}
            </p>
            <ul class="flex flex-wrap gap-2 py-2 items-end mt-auto">
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
    props: ['data'],
}

</script>