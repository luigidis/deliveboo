<template>
    <div >
        <button @click="clearCart"
            class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2 hover:shadow-none">
            Svuota carrello
        </button>
    </div>
</template>
        
            
                

<script>
import state from '../store'

export default {
    methods: {
        clearCart() {
            localStorage.clear();
            state.restaurantId = localStorage.getItem('restaurantId');
            
            state.totalItems = localStorage.getItem('totalPrice') || 0;
            state.ids = [];
            state.quantity = [];
        },
    }
            
           
            



}
</script>

<style lang="scss" scoped>

</style>