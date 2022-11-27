<template>
    <div>
        <!-- <div class="container flex-wrap">
            Go to Shop
            <a href="#"><i class="fa-solid fa-cart-shopping"></i> <span class="count_item">{{ productNumber }} in
                    Cart</span></a>
            <button>View Cart</button>
        </div> -->
        <button v-on:click="addCart(plate)" class="btn btn-primary add_to_cart">Add to Cart</button>
    </div>
</template>

<script>
export default {
    name: 'ButtonToCart',
    props: [
        'plate',
        // 'cartPrice',
        // 'productNumber'
    ],
    
    data() {
        return {
            // plates: new Array,
            cartPrice: null,
            productNumber: 0,
        }
    },

    methods: {
        // getTheCart(product) {
        //     this.totalPrice(product);
        //     this.cartNumber();
        // },
        addCart(plate) {
            if(localStorage.totalPrice)
                localStorage.totalPrice= parseFloat(localStorage.totalPrice) + plate.price;
            else
                localStorage.setItem('totalPrice', plate.price);
            // if(localStorage.arrayId)
            //     localStorage.arrayId+=`,${plate.id}`;
            // else
            //     localStorage.setItem('arrayId', plate.id);
            if(localStorage.getItem(`quantity%${plate.id}`))
                localStorage.setItem(`quantity%${plate.id}`,parseFloat(localStorage.getItem(`quantity%${plate.id}`)) + 1);
            else
                localStorage.setItem(`quantity%${plate.id}`, 1);
        },

        // totalPrice(product) {
        //     console.log(this.cartPrice)
        //     if (this.cartPrice != null) {
        //         this.cartPrice = parseInt(this.cartPrice);
        //         localStorage.setItem('totalPrice', this.cartPrice + product.price);
        //         return this.cartPrice = localStorage.getItem('totalPrice')
        //     } else {
        //         localStorage.setItem('totalPrice', product.price)
        //         return this.cartPrice = localStorage.getItem('totalPrice')
        //     }
        // },

        // cartNumber() {
        //     console.log(this.productNumber)
        //     this.productNumber = parseInt(this.productNumber);
        //     if (this.productNumber !== 0) {
        //         localStorage.setItem('cartNumber', this.productNumber + 1);
        //         return this.productNumber = localStorage.getItem('cartNumber')
        //     } else {
        //         localStorage.setItem('cartNumber', 1);
        //         return this.productNumber = localStorage.getItem('cartNumber');
        //     }
        // },

        // onLoad() {
        //     this.productNumber = localStorage.getItem('cartNumber');
        // },
    },
    created() {
        // this.onLoad()
    },
}
</script>

<style lang="scss" scoped>

</style>