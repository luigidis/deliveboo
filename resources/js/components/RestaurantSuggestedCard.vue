<template>
    <div :class="{
        'flex gap-3 flex-wrap': true,
        'justify-end': index % 2 == 1,
    }">
        <div :class="{
            'sm:w-2/5 box_shadow_stroke_small min_size': true,
            'sm:order-1': index % 2 == 1,
        }">
            <img class="block object-cover object-center w-full h-full" :src="data.image" alt="">
        </div>
        <div :class="{
            'flex flex-column box_shadow_stroke_small bg-white min_size py-2': true,
            'text-left items-start pr-10 pl-2': index % 2 == 0,
            'text-right items-end pl-10 pr-2': index % 2 == 1,
        }">
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
            <router-link :to="{
                name: 'restaurants.show',
                params: { slug: data.slug }
            }" class="box_shadow_stroke_small bg_link_color c_text_color font-bold text-xl px-2 py-1 leading-none card_button">Vai
                al men&uacute;</router-link>
        </div>
    </div>
</template>

<script>

export default {
    name: 'RestaurantSuggestedCard',
    props: ['data', 'index']
}

</script>

<style lang="scss" scoped>
.min_size {
    max-width: 300px;
    min-width: 100%;
    min-height: 250px;
}
@media (min-width: 768px){
    .min_size {
        min-width: 150px;
        min-height: 350px;
    }
}
</style>