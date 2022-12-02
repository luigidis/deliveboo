<template>
    <div class="container py-20">
        
        <div class="flex gap-3">
            
            <h2 class="text-6xl font-bold pb-24 basis-1/2">
                {{ plate.name }}
            </h2>

            <div class="flex items-center justify-end self-start ml-auto pt-2">

                <router-link :to="{
                    name: 'restaurants.show',
                    params: { slug: restSlug}}"
                    class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                    Torna ai piatti
                </router-link>

            </div>

        </div>

    
        <PlateCardShow :plate="plate" v-if="plate"/>
    
        <LayoverAlert />

    </div>
</template>

<script>
    import LayoverAlert from '../components/LayoverAlert.vue';
    import PlateCardShow from '../components/PlateCardShow.vue';

    export default {
        props: ["slug","restSlug"],
        components: {
        PlateCardShow,
        LayoverAlert
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