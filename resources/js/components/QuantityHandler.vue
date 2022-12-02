<template>
    <div class="flex justify-center items-center gap-3">
            <span @click="removeCart()" class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">-</span>
            <span class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-3xl py-1 px-2 font-bold">{{ plateQuantity }}</span>
            <span @click="addCart()" class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">+</span>
        </div>
</template>

<script>

    import state from '../store';


    export default {
        props: ['plate'],

        data() {
                return {
                    plateQuantity: 1,
                }
        },

        methods: {
            addCart() {
                localStorage.setItem(`quantity%${this.plate.id}`, parseFloat(localStorage.getItem(`quantity%${this.plate.id}`)) + 1);
                localStorage.totalPrice = parseFloat(parseFloat(localStorage.totalPrice) + this.plate.price).toFixed(2);
                state.totalPrice = localStorage.totalPrice;
                this.plateQuantity = localStorage.getItem(`quantity%${this.plate.id}`);
                state.totalItems++;
                localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) + 1);
                const index = state.ids.indexOf(this.plate.id);
                if(index != -1) 
                    state.quantity[index]++;
            },

            removeCart() {
                localStorage.totalPrice = parseFloat(parseFloat(localStorage.totalPrice) - this.plate.price).toFixed(2);
                state.totalPrice = localStorage.totalPrice;
                const index = state.ids.indexOf(this.plate.id);
                state.totalItems--;
                localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) - 1);

                // se ha quantità 1
                if(this.plateQuantity == 1) {
                    // rimuovo l'id dall'array id dello store
                    state.ids.splice(index, 1);
                    // rimuovo la quantità dall'array quantity dello store
                    state.quantity.splice(index, 1);
                    // lo rimuovo dal localStorage
                    localStorage.removeItem(`quantity%${this.plate.id}`)
                    // se non sono rimasti altri piati
                    if(!state.totalItems) {
                        // svuoto lo store
                        localStorage.clear();
                        state.restaurantId = null;
                    }
                }
                // altrimenti
                else {
                    // tolgo 1 alla quantità nel localStorage
                    localStorage.setItem(`quantity%${this.plate.id}`, parseFloat(localStorage.getItem(`quantity%${this.plate.id}`)) - 1);
                    // tolgo 1 al plateQuantity
                    this.plateQuantity = localStorage.getItem(`quantity%${this.plate.id}`);
                     if(index != -1)
                     // tolgo 1 alla sua quantity nello store
                        state.quantity[index]--;
                }
            },
        },
        
        mounted() {
            const index = state.ids.indexOf(this.plate.id);
            if(index != -1) 
                this.plateQuantity = state.quantity[index];
        },
    }

</script>