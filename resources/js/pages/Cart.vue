<template>
    <div class="container py-28">
        <h1 class="text-4xl font-bold text-center pb-6">
            Ordiner per il ristorante: {{ restaurant.name }}
        </h1>
        <div class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            <div class="card_restaurant box_shadow_stroke flex flex-column" v-for="plate, i in plates" :key="i">
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
                            Totale: {{ (parseFloat(plate.price) * parseFloat(quantity[i])).toFixed(2) }}€
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-column gap-4 items-start">
            <div class="text-xl">
                Totale: {{ totalPrice }}€
            </div>
            <!-- <router-link to="#" 
            class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none">
                Checkout
            </router-link> -->
            <span @click="checkOut"
                class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none">
                Checkout
            </span>
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
        checkOut() {
            var data = JSON.stringify({
                "token": "fake-valid-nonce",
                "amount": this.totalPrice
            });

            var config = {
                method: 'post',
                url: 'http://localhost:8000/api/orders/payment',
                headers: {
                    'Content-Type': 'application/json',
                    // 'Cookie': 'XSRF-TOKEN=eyJpdiI6IkQ2YTUxSUU1REhaN0NzQ3RXaElrRkE9PSIsInZhbHVlIjoiU2VZTUFkSUJLZ3NwbDZYcVQ1cFdFdndWZ0I2K1RCM2ErVHgycktkVWU1UnhDMC9ueG9Ib2hQK3dxaVFVZ0xMVENtNzBiczZlL0cycU03UmtiMEV3dVhxakFRUmhSOWFkYjB4ZFR5Um5WUXp5R0RObzlZUy9nMVRxYnlYZS9OdWEiLCJtYWMiOiI0MzE0YzIxYjZkY2UxMzEzMmJmNWY2OGI1ZmY2NTA4YmJkOGNhNmZlYThlYjFlOTRjMWM1YmUyZmFiYWVkM2ZhIn0%3D; deliveboo_session=eyJpdiI6IkwvTlFlRFFhQm5WNXFDYWwyN3JwOEE9PSIsInZhbHVlIjoiWXlURExCaTJkUTR1R21hUHlsMWdma2xLQjkvN1hTTDUzMktYVnNhUkw5bUxoUGE0OW4vODZ0LzBrQ3JhMy9OdmhuVWt3Q0oveGlGbnFhcnVKR3lhWHVMdkRjeFhlRjljVXRFTnR4U050clB2VHFkNzJNaEJNS3VmNkIzWGRaUnMiLCJtYWMiOiJiZDQzYmNjNDJkMDNmMDY4NDZiMWI4NTM5MjZkY2VlMmY0YzY3MWJhNTlhYWQxM2MxNTgyNDNiNWM0ZjY4YzYwIn0%3D'
                },
                data: data,
            };

            axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    mounted() {
        for (var i = 0; i < localStorage.length - 1; i++) {
            if (localStorage.key(i).includes('quantity')) {
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