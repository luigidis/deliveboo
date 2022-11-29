<template>
    <button v-on:click="addCart(plate)"
        class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 leading-none font-normal hover:shadow-none">
        Aggiungi al carrello
    </button>
</template>

<script>
import state from "../store";

export default {
    name: 'ButtonToCart',
    props: [
        'plate',
    ],
    methods: {
        addCart(plate) {
            if (localStorage.totalPrice) {
                if (localStorage.restaurantId != plate.restaurant_id) {
                    state.error = true;
                    state.lastPlate = plate;
                    return;
                }
                localStorage.totalPrice = parseFloat(parseFloat(localStorage.totalPrice) + plate.price).toFixed(2);
                state.totalItems++;
                localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) + 1);
            }
            else {
                localStorage.setItem('totalPrice', plate.price);
                localStorage.setItem('restaurantId', plate.restaurant_id);
                state.totalItems = 1;
                localStorage.setItem('totalItems', 1);
            }
            if (localStorage.getItem(`quantity%${plate.id}`))
                localStorage.setItem(`quantity%${plate.id}`, parseFloat(localStorage.getItem(`quantity%${plate.id}`)) + 1);
            else
                localStorage.setItem(`quantity%${plate.id}`, 1);
        },

    },
}
</script>