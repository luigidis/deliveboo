<template>
    <div class="container py-28">
        <h1 class="text-4xl font-bold text-center pb-6">
            Ordiner per il ristorante: {{ restaurant.name }}
        </h1>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            <div class="card_restaurant box_shadow_stroke flex flex-column"
            v-for="plate, i in plates" :key="i">
                <div class="">
                    <img class="block object-cover w-full h-full" :src="plate.img" alt="">
                </div>
                <div class="desc p-2 flex flex-column gap-3 justify-between grow">
                    <h3 class="text-md font-bold mb-2">
                        {{ plate.name }}
                    </h3>
                    <div>
                        <span class="font-normal block leading-none mb-2">
                            Quantità:{{ quantity[i] }}
                        </span>
                        <span class="font-normal block">
                            Totale: {{( parseFloat(plate.price)*parseFloat(quantity[i])).toFixed(2) }}€
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-xl">
                Totale: {{ totalPrice }}€
            </span>
            <router-link to="#" class="btn bg-sky-500 font-bold hover:bg-sky-800 text-white">
                Checkout
            </router-link>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            ids: new Array,
            quantity: new Array,
            plates: '',
            restaurant: '',
            totalPrice: 0,
        }
    },
    methods: {
        fetchPlates() {
            axios.get(`api/cart/plates/${this.ids}}`)
            .then(res => {
                this.plates = res.data.plates;
                this.restaurant = res.data.restaurant;
                console.log(res.data.plates);
            }).catch(err => {
                console.log(err);
                //redirect to 404
                this.$router.push({ name: '404' });
            })
        },
    },
    mounted() {
        for (var i = 0; i < localStorage.length-1; i++) {
            if(localStorage.key(i).includes('quantity')) {
                this.ids.push(localStorage.key(i).split('%')[1])
                this.quantity.push(localStorage.getItem(localStorage.key(i)));
            }
        }
        console.log(this.ids);
        console.log(this.quantity);
        this.fetchPlates();
        this.totalPrice = localStorage.getItem('totalPrice');
    },
}
</script>

<style>

</style>