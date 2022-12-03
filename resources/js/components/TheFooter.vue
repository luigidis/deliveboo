<template>
    <footer class="w-full py-5 px-3 bg_link_color text-white">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-5 pb-3">
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
                        'route': '/',
                    },
                    {
                        'name': 'Termini & condizioni',
                        'route': '/',
                    },
                    {
                        'name': 'Informativa sulla privacy',
                        'route': '/',
                    },
                    {
                        'name': 'Cookies',
                        'route': '/',
                    },
                ],
                [
                    {
                        'name': 'Help',
                        'route': '/',
                    },
                    {
                        'name': 'FAQ',
                        'route': '/',
                    },
                    {
                        'name': 'Contatti',
                        'route': '/',
                    },
                ],
            ]
        }
    },
    components: {
        SocialLinks
    }
}
</script>

