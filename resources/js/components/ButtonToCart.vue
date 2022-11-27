<template>
    <div>
        <!-- <div class="container flex-wrap">
            Go to Shop
            <a href="#"><i class="fa-solid fa-cart-shopping"></i> <span class="count_item">{{ productNumber }} in
                    Cart</span></a>
            <button>View Cart</button>
        </div> -->
        <button v-on:click="addCart(plate)" class="btn btn-primary add_to_cart text-sm">Aggiungi al carrello</button>
    </div>
</template>

<script>

import state from "../store";

export default {
    name: 'ButtonToCart',
    props: [
        'plate',
    ],
    
    data() {
        return {
            cartPrice: null,
            productNumber: 0,
        }
    },

    methods: {
        addCart(plate) {
            if(localStorage.totalPrice) {
                if(localStorage.restaurantId != plate.restaurant_id) {
                    state.error = true;
                    state.lastPlate = plate;
                    return;
                }
                localStorage.totalPrice= parseFloat(parseFloat(localStorage.totalPrice) + plate.price).toFixed(2);
                state.totalItems++;
                localStorage.totalItems= parseInt(parseInt(localStorage.totalItems) + 1);
            }
            else{
                localStorage.setItem('totalPrice', plate.price);
                localStorage.setItem('restaurantId', plate.restaurant_id);
                state.totalItems = 1;
                localStorage.setItem('totalItems', 1);
            }
            if(localStorage.getItem(`quantity%${plate.id}`))
                localStorage.setItem(`quantity%${plate.id}`,parseFloat(localStorage.getItem(`quantity%${plate.id}`)) + 1);
            else
                localStorage.setItem(`quantity%${plate.id}`, 1);
        },

    },
}
</script>

<style lang="scss" scoped>

</style>