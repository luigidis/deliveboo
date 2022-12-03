<template>
    <div :class="{
        'grid grid-cols-1 lg:grid-cols-2 gap-10': true,
        'justify-end': index % 2 == 1,
    }">
        <div :class="{
            'w-full box_shadow_stroke h-[600px]': true,
            'lg:order-1': index % 2 == 1,
        }">
            <img class="block object-cover object-center w-full h-full" :src="data.image" :alt="`Sala ristorante ${data.name}`">
        </div>
        <div :class="{
            'flex flex-column box_shadow_stroke bg-white py-4 w-full lg:w-3/5': true,
            'text-left lg:justify-self-start pr-10 pl-4': index % 2 == 0,
            'lg:text-right lg:justify-self-end pr-10 pl-4 lg:pl-10 lg:pr-4': index % 2 == 1,
        }">
            <h3 class="text-4xl font-bold leading-none">
                {{ data.name }}
            </h3>
            <p class="font-normal text-2xl block leading-none mb-2 pt-4">
                {{ data.address }}
            </p>
            <ul :class="{
                'flex flex-wrap gap-2 py-3 items-end mt-auto': true,
                'lg:justify-end': index % 2 == 1,
            }">
                <li v-for="(category, i) in data.categories" :key="1000 - i"
                    class="box_shadow_stroke_small py-1 px-2 font-bold c_seco_color">
                    {{ category.name }}
                </li>
            </ul>
            <router-link :to="{
                name: 'restaurants.show',
                params: { slug: data.slug }
            }"
                :title="`Vedi il menù di ${data.name}`"
                :class="{
                    'box_shadow_stroke_small bg_link_color c_text_color font-bold px-2 py-1 leading-none text-3xl w-fit hover:no-underline hover:text-white hover:shadow-none': true,
                    'lg:ml-auto': index % 2 == 1,
                    }">
                Vai al men&uacute;
            </router-link>
        </div>
    </div>
</template>

<script>

export default {
    name: 'RestaurantSuggestedCard',
    props: ['data', 'index']
}

</script>