<template>
    <div>

        <div v-if="bool" class="flex items-center justify-center h-full md:h-screen flex-col md:flex-row gap-3 py-5 mt-5 md:mt-none">
            <form @submit.prevent="submitForm" class="box_shadow_stroke py-4 px-2 w-4/5 md:w-2/5">
                <div class="py-2 flex flex-column text-lg">
                    <label class="font-bold" for="name">Nome*</label>
                    <input :class="{
                        'py-2 px-1 box_shadow_stroke_small': true,
                    'shadow_stroke_error': formError && name_client == '',
                    }" type="text" id="name_client" v-model="name_client" name="name_client">
                </div>
                <div class="py-2 flex flex-column text-lg">
                    <label class="font-bold" for="surname">Cognome*</label>
                    <input :class="{
                        'py-2 px-1 box_shadow_stroke_small': true,
                    'shadow_stroke_error': formError && surname_client == '',
                    }" type="text" id="surname_client" v-model="surname_client" name="surname_client">
                </div>
                <div class="py-2 flex flex-column text-lg">
                    <label class="font-bold" for="email_client">Email*</label>
                    <input :class="{
                        'py-2 px-1 box_shadow_stroke_small': true,
                    'shadow_stroke_error': formError && email_client == '',
                    }" type="email" id="email_client" v-model="email_client" name="email_client">
                </div>
                <div class="py-2 flex flex-column text-lg">
                    <label class="font-bold" for="phone_client">Numero di Cellulare*</label>
                    <input :class="{
                        'py-2 px-1 box_shadow_stroke_small': true,
                    'shadow_stroke_error': formError && phone_client == '',
                    }" type="numeric" id="phone_client" v-model="phone_client" name="phone_client">
                </div>
                <div class="py-2 flex flex-column text-lg">
                    <label class="font-bold" for="address_client">Indirizzo di spedizione*</label>
                    <input :class="{
                        'py-2 px-1 box_shadow_stroke_small': true,
                    'shadow_stroke_error': formError && address_client == '',
                    }" type="text" id="address_client" v-model="address_client" name="address_client">
                </div>
            <div class="flex justify-between items-center">
                    <button :class="{
                        'cursor-pointer add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none': true,
                        'opacity-25': !show,
                    }">
                        {{ !show ? 'Caricamento' : 'Procedi col pagamento' }}
                    </button>
                <div v-if="formError" class="text-md c_seco_color font-bold">
                    Compila tutti i campi per procedere
                </div>
            </div>
            </form>
            <PaymentComponent ref="PaymentBtn" v-if="show" :authorization="tokenApi" @onSuccess="paymentSuccess"
                @onError="paymentError" />
        </div>

        <div class="flex items-center justify-center h-screen flex-col gap-3 py-5" v-else>
            <h1 class="text-4xl font-bold text-center pb-6">
                Qualcosa è andato storto...
            </h1>

            <router-link :to="{
                name: 'cart',
            }" class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2" title="Torna al carrello">
                Torna al carrello
            </router-link>
        </div>

    </div>
</template>
<script>
import PaymentComponent from '../components/PaymentComponent.vue'
import state from '../store'

export default {
    name: "CheckOut",
    props: ['bool'],
    data() {
        return {
            show: false,
            tokenApi: '',
            ids: new Array,
            quantity: new Array,
            name_client: '',
            surname_client: '',
            email_client: '',
            address_client: '',
            phone_client: '',
            quantity_plate: '',
            form: {
                token: "",
                amount: "",
            },
            validatePay: false,
            formError: false,
        }
    },
    components: {
        PaymentComponent
    },
    methods: {
        makePayment(){
            let data = JSON.stringify(this.form)

            let config = {
                method: "post",
                url: "http://localhost:8000/api/orders/payment",
                headers: { "Content-Type": "application/json" },
                data: data,
            }

            axios(config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                })
                .catch(function (error) {
                    console.log(`Payment => ${error}`);
                });
        },
        paymentSuccess(token) {
            this.form.token = token
            this.validatePay = true

            // let data = JSON.stringify(this.form)

            // let config = {
            //     method: "post",
            //     url: "http://localhost:8000/api/orders/payment",
            //     headers: { "Content-Type": "application/json" },
            //     data: data,
            // }

            // axios(config)
            //     .then(function (response) {
            //         console.log(JSON.stringify(response.data));
            //     })
            //     .catch(function (error) {
            //         console.log(`Payment => ${error}`);
            //     });
        },
        paymentError(error) {
            if(error.message == 'No payment method is available.'){
                // console.log('Inserisci i dati della carta')
                this.validatePay = false
            }
        },
        clearCart() {
                localStorage.clear();
                state.ids = new Array;
                state.quantity = new Array;
                state.totalItems = 0;
        },
        submitForm() {
            this.$refs.PaymentBtn.$refs.paymentBraintreeBtn.click()

            const dataForm = {
                name_client: this.name_client,
                surname_client: this.surname_client,
                email_client: this.email_client,
                address_client: this.address_client,
                phone_client: this.phone_client,
                quantity_plate: this.quantity,
            }
            
            setTimeout(() => { 
                if(this.name_client && this.surname_client && this.email_client && this.address_client && this.phone_client && this.validatePay){
                    // console.log('non vuoto')
                    axios.post(`api/orders/making/${this.ids}`, dataForm)
                    .then(() => {
                        this.makePayment()
                        this.clearCart()
                        this.name_client = this.surname_client = this.email_client = this.address_client = this.phone_client = ''
                    }).catch(err => {
                        console.log(`Form => ${err}`);
                    })

                    setTimeout(() => {
                        this.$router.push({ name: "successpayment" });
                    }, "1000")                
                } else {
                    this.formError = true
                }
            }, "500")       
        }
    },
    mounted() {

        for (var i = 0; i < localStorage.length - 1; i++) {
            if (localStorage.key(i).includes("quantity")) {
                this.ids.push(localStorage.key(i).split("%")[1]);
                this.quantity.push(localStorage.getItem(localStorage.key(i)));
            }
        }

        this.form.amount = localStorage.getItem("totalPrice");

        // Genero il token 
        axios.get('api/orders/generate')
            .then(res => {
                const { token } = res.data
                this.tokenApi = token
                this.show = true
            })
            .catch(function (error) {
                console.log(error)
                this.show = false
            });
    }
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables';
.shadow_stroke_error{
    border: 2px solid $seco-color;
    box-shadow: 3px 3px 0px $seco-color;
}
</style>