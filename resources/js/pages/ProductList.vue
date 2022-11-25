<template>
    <div>
        <div class="container flex-wrap">
            Go to Shop
            <a href="#"><i class="fa-solid fa-cart-shopping"></i> <span class="count_item">0</span></a>
        </div>

        <div class="container d-flex my-5 ">
            <div v-for="(product, i) in products" :key="2000 - i" class="card mx-3" style="width: 18rem;">
                <img src="https://www.giallozafferano.it/images/221-22163/Spaghetti-al-pomodoro_650x433_wm.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ product.name }} </h5>
                    <p class="card-text">{{ product.description }}</p>
                    <div class="price"><span class="euro">&euro;</span> <span>{{ product.price }}</span></div>

                    <button @click="createCart" class="btn btn-primary add_to_cart">Add to
                        Cart</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
                {
                    name: "Pasta al Pomodoro",
                    price: 10.00,
                    description: "lorem ipsum dolor sit amet",
                    isInCart: false
                },
            ],
            cart: [],
            currentProduct: null,
        }
    },
    
    mounted() {
        if (localStorage.cart) {
            this.cart = localStorage.cart;
        }
    },

    watch: {
        cart(newCart) {
            localStorage.cart = newCart
        }


    },

    // methods: {
    //     getTheStore(price) {
    //         // totalPrice(price)
    //         cartNumber()
    //     },

    //     totalPrice(product) {
    //         let cartPrice = localStorage.getItem('totalPrice');
    //         if (cartPrice != null) {
    //             //Se ho già qualcosa dentro il mio storage vado a sommare
    //             cartPrice = parseInt(cartPrice);
    //             localStorage.setItem('totalPrice', cartPrice + price);
    //         } else {
    //             localStorage.setItem('totalPrice', price)
    //         }
    //         return localStorage.storedData = this.cartPrice
    //     },
    //     cartNumber() {
    //         //controllo se ho già in conto prodotti nel mio contatore
    //         let productNumber = localStorage.getItem('cartNumber');
    //         productNumber = parseInt(productNumber)
    //         if (productNumber) {
    //             localStorage.setItem('cartNumber', productNumber + 1);
    //             document.querySelector('.count_item').textContent = productNumber + 1;

    //         } else {
    //             localStorage.setItem('cartNumber', 1);
    //             document.querySelector('.count_item').textContent = 1;
    //         }
    //         return this.productNumber = localStorage.storedData;
    //     }
    // },
    // computed: {
    //     setCart() {
    //         if (localStorage.this.cart) {
    //            return  this.cart = localStorage.cart
    //         }
    //     },
    // },


    //   }


}






</script>

<style lang="scss" scoped>

</style>