<template>
    <section class="py-20">
        <div class="container" v-if="plate">
            <div class="flex flex-wrap items-center gap-3 pb-20">
                <div class="box_shadow_stroke p-2">
                    <h2 class="text-6xl font-bold">
                        {{ plate.name }}
                    </h2>
                    <span class="font-bold text-5xl c_link_color py-2">
                        &euro;{{ plate.price }}
                    </span>
                </div>
                <div class="box_shadow_stroke lg:ml-auto p-3">
                    <router-link :to="{
                        name: 'restaurants.show',
                        params: { slug: restSlug }
                    }"
                        class="bg_seco_color c_text_color text-3xl font-bold box_shadow_stroke_small py-1 px-2 hover:shadow-none hover:text-white hover:no-underline">
                        Torna ai piatti
                    </router-link>
                </div>
            </div>
            <PlateCardShow :plate="plate" v-if="plate" />
            <LayoverAlert />
        </div>

        <TheLoading class="min-h-screen" v-else />

    </section>
</template>

<script>
import LayoverAlert from '../components/LayoverAlert.vue';
import PlateCardShow from '../components/PlateCardShow.vue';
import TheLoading from '../components/TheLoading.vue';

export default {
    props: ["slug", "restSlug"],
    components: {
        PlateCardShow,
        LayoverAlert,
        TheLoading
    },
    data() {
        return {
            plate: "",
            plates: new Array,
        }
    },
    methods: {
        fetchPlate() {
            axios.get(`/api/plates/${this.slug}`).then(res => {
                console.log(res.data);
                this.plate = res.data.plate;
            }).catch(err => {
                console.log(err);
                //redirect to 404
                this.$router.push({ name: "404" });
            });
        },
    },
    beforeMount() {
        // console.log(this.restSlug);
        this.fetchPlate();
    },
}
</script>