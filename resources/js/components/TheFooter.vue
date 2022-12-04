<template>
    <footer class="w-full bg_link_color text-white relative">
        <span class="absolute top-0 left-10 w-[150px]">
            <SvgLogo class="w-full h-full object-cover fill-white"/>
        </span>
        <div class="container py-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-10 pb-3">
                <div class="box_shadow_stroke bg_seco_color py-3 px-2 w-full" v-for="(link, i) in footerLinks" :key="i">
                    <ul class="list">
                        <li class="list_item" v-for="(item, j) in link" :key="1000 - j">
                            <router-link :to="{name: item.route}"
                                class="item_link font-bold text-3xl hover:opacity-75 hover:text-white py-2 px-1 block"
                                :title="`Vai a ${item.name}`">
                                {{ item.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <SocialLinks />
        </div>
    </footer>
</template>
<script>
import SocialLinks from './SocialLinks.vue';
import SvgLogo from './svgs/SvgLogo.vue';

export default {
    data() {
        return {
            footerLinks: [
                [
                    {
                        'name': 'Scopri DeliveBoo',
                        'route': 'home',
                    },
                    {
                        'name': 'Chi Siamo',
                        'route': 'about-us',
                    },
                    {
                        'name': 'Ristoranti',
                        'route': 'home',
                    },
                ],
                [
                    {
                        'name': 'Note legali',
                        'route': 'home',
                    },
                    {
                        'name': 'Termini & condizioni',
                        'route': 'home',
                    },
                    {
                        'name': 'Informativa sulla privacy',
                        'route': 'home',
                    },
                    {
                        'name': 'Cookies',
                        'route': 'home',
                    },
                ],
                [
                    {
                        'name': 'Help',
                        'route': 'home',
                    },
                    {
                        'name': 'FAQ',
                        'route': 'home',
                    },
                    {
                        'name': 'Contatti',
                        'route': 'contacts',
                    },
                ],
            ]
        }
    },
    components: {
    SocialLinks,
    SvgLogo
}
}
</script>

