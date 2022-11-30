<template>
    <div class="relative card_restaurant box_shadow_stroke pb-20 hover:shadow-none hover:scale-95 ">
        <router-link :to="{
            name: 'restaurants.plateShow',
            params: { slug: plate.slug }
        }" class="absolute inset-0" :title="`Vedi piatto ${plate.name}`"></router-link>
        <div>
            <img class="block object-cover w-full h-full" :src="plate.img" :alt="`Foto piatto ${plate.name}`">
        </div>
        <div class="desc p-2 flex flex-column">
            <h3 class="text-xl font-bold">
                {{ plate.name }}
            </h3>
            <p class="font-normal text-lg block leading-none mb-2">
                {{ plate.description }}
            </p>
            <span class="font-bold block text-xl items-end grow">
                {{ plate.price }}€
            </span>
        </div>

        <ButtonToCart class="cartBtn" :plate="plate" v-if="!ids.includes(plate.id)" />

        <div class="cartBtn flex justify-center items-center gap-3" v-else>
            <span @click="removeCart()" class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">-</span>
            <span class="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-3xl py-1 px-2 font-bold">{{ plateQuantity }}</span>
            <span @click="addCart()" class="add_to_cart cursor-pointer box_shadow_stroke_small bg_text_color c_prim_color text-2xl py-1 px-2 font-normal hover:shadow-none">+</span>
        </div>
    </div>
</template>

<script>

    import ButtonToCart from './ButtonToCart.vue'
    import state from '../store'

    export default {
        name: "PlateCard",
        props: ['plate'],
        components: {
            ButtonToCart
        },
        data() {
            return {
                plateQuantity: 1,
            }
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
                    console.log('Visto fra?')
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


<style lang="scss" scoped>

    .cartBtn {
        position: absolute;
        bottom: 1rem;
        left: 50%;
        transform: translateX(-50%);
    }

</style>