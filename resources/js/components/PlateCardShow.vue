<template>
    <div class="card_restaurant box_shadow_stroke max-w-xl  mx-auto">
        <div class="">
            <img class="block object-cover w-full h-full" :src="plate.img" alt="">
        </div>
        <div class="desc p-2">
            <div class="py-2">
                <span class="font-normal text-lg block leading-none mb-2">
                    {{ plate.description }}
                </span>
                <span class="font-bold text-xl block">
                    {{ plate.price }}€
                </span>
            </div>
            <ButtonToCart :plate="plate" v-if="!ids.includes(plate.id)" />
            <div class="cartBtn flex justify-center items-center gap-3" v-else>
                <span @click="removeCart()"
                    class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">-</span>
                <span
                    class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-3xl py-1 px-2 font-bold">{{
                            plateQuantity
                    }}</span>
                <span @click="addCart()"
                    class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">+</span>
            </div>
        </div>
    </div>
</template>
<script>
import ButtonToCart from './ButtonToCart.vue'
import state from '../store'

export default {
    name: 'PlateCardShow',
    props: ['plate'],
    data() {
        return {
            plateQuantity: 1,
        }
    },
    components: {
        ButtonToCart
    },
    computed: {
        ids() {
            return state.ids;
        },
        quantity() {
            return state.quantity;
        },
    },
    methods: {
            addCart() {
                localStorage.setItem(`quantity%${this.plate.id}`, parseFloat(localStorage.getItem(`quantity%${this.plate.id}`)) + 1);
                this.plateQuantity = localStorage.getItem(`quantity%${this.plate.id}`);
                state.totalItems++;
                localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) + 1);
            },
            removeCart() {
                if(this.plateQuantity == 1) {
                    localStorage.removeItem(`quantity%${this.plate.id}`);
                    const index = this.ids.indexOf(this.plate.id);
                    state.ids.splice(index, 1);
                    state.totalItems--;
                    localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) - 1);
                    if(!state.totalItems) {
                        localStorage.clear();
                    }
                }
                else {
                    localStorage.setItem(`quantity%${this.plate.id}`, parseFloat(localStorage.getItem(`quantity%${this.plate.id}`)) - 1);
                    this.plateQuantity = localStorage.getItem(`quantity%${this.plate.id}`);
                    state.totalItems--;
                    localStorage.totalItems = parseInt(parseInt(localStorage.totalItems) - 1);
                }
            },
        },
        mounted() {
            const index = this.ids.indexOf(this.plate.id);
            if(index != -1) 
                this.plateQuantity = this.quantity[index];
        }
}
</script>