<template>
    <div>
        <div class="container flex-wrap">
            Go to Shop
            <a href="#"><i class="fa-solid fa-cart-shopping"></i> <span class="count_item">{{ productNumber }} in
                    Cart</span></a>
            <button>View Cart</button>
        </div>

        <div class="container d-flex my-5 ">
            <div v-for="(product, i) in products" :key="2000 - i" class="card mx-3" style="width: 18rem;">
                <img src="https://www.giallozafferano.it/images/221-22163/Spaghetti-al-pomodoro_650x433_wm.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ product.name }} </h5>
                    <p class="card-text">{{ product.description }}</p>
                    <div class="price"><span class="euro">&euro;</span> <span>{{ product.price }}</span></div>

                    <button v-on:click="getTheCart(product)" class="btn btn-primary add_to_cart">Add to
                        Cart</button>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: 'Cart',

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
            cartPrice: null,
            currentProduct: null,
            productNumber: 0
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
                return this.cartPrice = localStorage.getItem('totalPrice')
            } else {
                localStorage.setItem('totalPrice', product.price)
                this.cartPrice = localStorage.getItem('totalPrice')
            }
        },

        cartNumber() {
            this.productNumber = parseInt(this.productNumber);
            if (this.productNumber) {
                localStorage.setItem('cartNumber', this.productNumber + 1);
                return this.productNumber = localStorage.getItem('cartNumber')
            } else {
                localStorage.setItem('cartNumber', 1);
                return this.productNumber = localStorage.getItem('cartNumber');
            }
        },

        onLoad() {
            return this.productNumber = localStorage.getItem('cartNumber');
        }
    },
    
    created() {
        this.onLoad()
    },
           
            
                
                
               
           
          

               

               
                


    


    







}



</script>

<style lang="scss" scoped>

</style>