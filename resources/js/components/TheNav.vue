<template>
    <nav class="navigation ml-auto">
        <ul class="flex items-center h-full gap-6">
            <li class="relative">
                <a href="/admin" class="absolute inset-0" title="Accedi al tuo ristorante">
                </a>
                <SvgRestaurant class="md:hidden svg_icon" />
                <span class="hidden md:block font-normal text-xl">
                    Il tuo ristorante
                </span>
            </li>
            <li class="relative">
                <SvgAbout class="md:hidden svg_icon" />
                <span class="hidden md:block font-normal text-xl">
                    Il Team
                </span>
                <router-link :to="{ name: 'about-us' }" class="router" title="Scopri il nostro Team"></router-link>
            </li>
            <li class="relative">
                <SvgContacts class="md:hidden svg_icon" />
                <span class="hidden md:block font-normal text-xl">
                    Contatti
                </span>
                <router-link :to="{ name: 'contacts' }" class="router" title="Vai ai Contatti"></router-link>
            </li>
            <li class="flex gap-1 justify-center items-center relative">
                <span class="rounded-full flex items-center justify-center totalItems text-sm">
                    {{ totalItems }}
                </span>
                <SvgCart class="svg_icon" />
                <router-link :to="{ name: 'cart' }" class="router" title="Vai al carrello"></router-link>
            </li>
        </ul>
    </nav>
</template>
<script>
import state from "../store";
import SvgAbout from "./svgs/SvgAbout.vue";
import SvgCart from "./svgs/SvgCart.vue";
import SvgContacts from "./svgs/SvgContacts.vue";
import SvgRestaurant from "./svgs/SvgRestaurant.vue";

export default {
    name: "TheHeader",
    computed: {
        totalItems() {
            return state.totalItems;
        }
    },
    components: {
    SvgCart,
    SvgRestaurant,
    SvgAbout,
    SvgContacts
}
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables';
.totalItems {
    position: absolute;
    top: -0.5rem;
    right: -0.5rem;
    width: 1.15rem;
    aspect-ratio: 1/1;
    color: $text-color;
    background-color: $seco-color;
}

.svg_icon {
    width: 1.75rem;
    aspect-ratio: 1/1;
    fill: $prim-color;
}

.router {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    cursor: pointer;
}
</style>