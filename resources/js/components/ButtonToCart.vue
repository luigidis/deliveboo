<template>
    <div>
        <!-- <div class="container flex-wrap">
            Go to Shop
            <a href="#"><i class="fa-solid fa-cart-shopping"></i> <span class="count_item">{{ productNumber }} in
                    Cart</span></a>
            <button>View Cart</button>
        </div> -->
        <button v-on:click="getTheCart(plate)" class="btn btn-primary add_to_cart">Add to Cart</button>
    </div>
</template>

<script>
export default {
    name: 'ButtonToCart',
    props: [
        'plate'
    ],
    
    data() {
        return {
            cartPrice: null,
            productNumber: 0,
        }
    },

    methods: {
        getTheCart(product) {
            this.totalPrice(product);
            this.cartNumber();
        },

        totalPrice(product) {
            if (this.cartPrice != null) {
                this.cartPrice = parseInt(this.cartPrice);
                localStorage.setItem('totalPrice', this.cartPrice + product.price);
                this.cartPrice = localStorage.getItem('totalPrice')
            } else {
                localStorage.setItem('totalPrice', product.price)
                this.cartPrice = localStorage.getItem('totalPrice')
            }
        },

        cartNumber() {
            this.productNumber = parseInt(this.productNumber);
            if (this.productNumber) {
                localStorage.setItem('cartNumber', this.productNumber + 1);
                this.productNumber = localStorage.getItem('cartNumber')
            } else {
                localStorage.setItem('cartNumber', 1);
                this.productNumber = localStorage.getItem('cartNumber');
            }
        },

        onLoad() {
            this.productNumber = localStorage.getItem('cartNumber');
        },
    },
    created() {
        this.onLoad()
    },
}
</script>

<style lang="scss" scoped>

</style>