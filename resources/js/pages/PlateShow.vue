<template>
    <div class="container py-20">
        <h2 class="text-6xl font-bold text-center pb-6">
            {{ plate.name }}
        </h2>
        <PlateCardShow :plate="plate" />
        <LayoverAlert />
    </div>
</template>

<script>
import LayoverAlert from '../components/LayoverAlert.vue';
import PlateCardShow from '../components/PlateCardShow.vue';

export default {
    props: ["slug",],
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
        // console.log(this.$route);
        this.fetchPlate();
    },
}
</script>