<template>
    <div class="flex items-center justify-center h-full md:h-screen flex-col md:flex-row gap-3 py-5 mt-5 md:mt-none">
        <div v-if="success">
            Form inviato
        </div>
        <form v-else @submit.prevent="submitForm" class="box_shadow_stroke py-4 px-2 w-4/5 md:w-2/5">
            <div class="py-2 flex flex-column text-lg">
                <label class="font-bold" for="name">Nome</label>
                <input class="py-2 px-1 box_shadow_stroke_small" type="text" id="name_client" v-model="name_client"
                    name="name_client">
                <!-- <small v-if="errors.name_client" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.name_client" :key="i">
                        {{ error }}
                    </span>
                </small> -->
            </div>
            <div class="py-2 flex flex-column text-lg">
                <label class="font-bold" for="surname">Cognome</label>
                <input class="py-2 px-1 box_shadow_stroke_small" type="text" id="surname_client"
                    v-model="surname_client" name="surname_client">
                <!-- <small v-if="errors.surname_client" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.surname_client" :key="i">
                        {{ error }}
                    </span>
                </small> -->
            </div>
            <div class="py-2 flex flex-column text-lg">
                <label class="font-bold" for="email_client">Email</label>
                <input class="py-2 px-1 box_shadow_stroke_small" type="text" id="email_client" v-model="email_client"
                    name="email_client">
                <!-- <small v-if="errors.email_client" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.email_client" :key="i">
                        {{ error }}
                    </span>
                </small> -->
            </div>
            <div class="py-2 flex flex-column text-lg">
                <label class="font-bold" for="phone_client">Numero di Cellulare</label>
                <input class="py-2 px-1 box_shadow_stroke_small" type="text" id="phone_client" v-model="phone_client"
                    name="phone_client">
                <!-- <small v-if="errors.phone_client" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.phone_client" :key="i">
                        {{ error }}
                    </span>
                </small> -->
            </div>
            <div class="py-2 flex flex-column text-lg">
                <label class="font-bold" for="address_client">Indirizzo di spedizione</label>
                <input class="py-2 px-1 box_shadow_stroke_small" type="text" id="address_client"
                    v-model="address_client" name="address_client">
                <!-- <small v-if="errors.address_client" class="flex gap-3 text-red-400 text-sm">
                    <span v-for="(error, i) in errors.address_client" :key="i">
                        {{ error }}
                    </span>
                </small> -->
            </div>
            <button @click="getPayment" :class="{
                'cursor-pointer add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none': true,
                'opacity-25': !show,
            }">
                {{ !show ? 'Caricamento' : 'Procedi col pagamento' }}
            </button>
        </form>
        <PaymentComponent ref="PaymentBtn" v-if="show" :authorization="tokenApi" />
    </div>
</template>
<script>
import PaymentComponent from '../components/PaymentComponent.vue'

export default {
    name: "CheckOut",
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
            errors: {},
            success: null,
        }
    },
    components: {
        PaymentComponent
    },
    methods: {
        getPayment() {
            this.$refs.PaymentBtn.$refs.paymentBraintreeBtn.click()
        },
        submitForm() {
            const data = {
                name_client: this.name_client,
                surname_client: this.surname_client,
                email_client: this.email_client,
                address_client: this.address_client,
                phone_client: this.phone_client,
                quantity_plate: this.quantity,
            }
            axios.post(`api/orders/making/${this.ids}`, data)
                .then(() => {
                    this.name_client = this.surname_client = this.email_client = this.address_client = this.phone_client = ''
                    this.show = true
                    this.errors = {}
                    this.success = true
                }).catch(err => {
                    console.log(err.response)
                    const { errors } = err.response.data
                    this.errors = errors
                })
        }
    },
    mounted() {

        for (var i = 0; i < localStorage.length - 1; i++) {
            if (localStorage.key(i).includes("quantity")) {
                this.ids.push(localStorage.key(i).split("%")[1]);
                this.quantity.push(localStorage.getItem(localStorage.key(i)));
            }
        }
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