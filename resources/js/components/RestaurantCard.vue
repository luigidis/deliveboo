<template>
    <div
        class="transition-transform flex flex-column box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95 relative">
        <router-link :to="{
            name: 'restaurants.show',
            params: { slug: data.slug }
        }" class="absolute inset-0"></router-link>
        <div class="h-60">
            <img class="block object-cover object-center w-full h-full" :src="checkImg(data.image) ? data.image : 'images/' + data.image" :alt="`Sala ristorante ${data.name}`">
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
    methods: {
        checkImg(src) {
            if (this.isValidUrl(src))
                return true;
            else
                return false;
        },
        isValidUrl(urlString) {
            // https://media-assets.lacucinaitaliana.it/photos/61fabb4351116b1ead93053e/16:9/w_2560%2Cc_limit/landscape-italiani-nel-mondo.jpg

            // https://images2.corriereobjects.it/methode_image/2018/12/18/Cucina/Foto%20Cucina%20-%20Trattate/3_l3hXlyM-kyJI-RMonksirHP8Q8h6Urr6Et5O-590x445@Corriere-Web-Sezioni.jpg?v=201812181819
            const expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
            const regex = new RegExp(expression);
            return regex.test(urlString);
        }
    },
}

</script>