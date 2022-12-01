<template>
    <div class="layover" @click="clearCart(false)" v-if="error">
        <div class="my_alert box_shadow_stroke" @click.stop>
            <span class="text-3xl text-center font-bold">
                Hai un ordine in corso per un altro ristorante, svuotare il carrello?
            </span>
            <div class="flex gap-6">
                <button @click="clearCart(true)"
                    class="box_shadow_stroke_small bg_seco_color c_text_color text-xl py-1 px-2 leading-none font-normal hover:shadow-none">
                    Conferma
                </button>
                <button @click="clearCart(false)"
                    class="box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 leading-none font-normal hover:shadow-none">
                    Annulla
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import state from '../store'

export default {
    computed: {
        error() {
            const bodyEl = document.querySelector('body')
            if (state.error) {
                bodyEl.style.overflowY = 'hidden';
            } else {
                bodyEl.style.overflowY = 'auto';
            }
            return state.error;
        }
    },
    methods: {
        clearCart(bool) {
            if (!bool) {
                state.error = false;
            } else {
                localStorage.clear();
                localStorage.setItem('totalPrice', state.lastPlate.price);
                localStorage.setItem('restaurantId', state.lastPlate.restaurant_id);
                state.restaurantId = state.lastPlate.restaurant_id;
                localStorage.setItem('totalItems', 1);
                state.totalItems = 1;
                localStorage.setItem(`quantity%${state.lastPlate.id}`, 1);
                state.ids = [state.lastPlate.id];
                state.quantity = [1];
                state.error = false;
            }
        },
    }
}
</script>
<style lang="scss" scoped>
.layover {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 100000;
    background-color: #00000095;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    .my_alert {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 5rem;
        gap: 3rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        background-color: #f7f7f7;
    }
}
</style>