<template>
    <div class="container py-20">
        <h1 class="text-6xl font-bold text-center pb-6">
            {{ plate.name }}
        </h1>

        <div class="card_restaurant box_shadow_stroke">

            <div class="">
                <img class="block object-cover w-full h-full" :src="plate.img" alt="">
            </div>
            <div class="desc p-2">
                <h3 class="text-xl font-bold">
                    {{ plate.name }}
                </h3>
                <div>
                    <span class="font-normal text-lg block leading-none mb-2">
                        {{ plate.description }}
                    </span>
                    <span class="font-normal block">
                        {{ plate.price }}€
                    </span>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
export default {
    props: ['slug'],
    data() {
        return {
            plate: '',
        }
    },
    methods: {
            fetchPlate() {
                axios.get(`/api/plates/${this.slug}`).then(res => {
                    console.log(res.data);
                    this.plate = res.data.plate;
                }).catch(err =>{
                    console.log(err);
                    //redirect to 404
                    this.$router.push({ name: '404' });
                })
            }
        },
        beforeMount() {
            console.log(this.$route)
            this.fetchPlate();
        }
}

</script>

<style>

</style>