<template>
    <v-braintree :authorization="authorization" locale="it_IT" @load="onLoad" @success="onSuccess" @error="onError"
        :btnText="disable ? 'Caricamento' : 'Procedi col pagamento'"
        btnClass="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none">
        <template v-slot:button="slotProps">
            <button @click="slotProps.submit" color="success" ref="paymentBraintreeBtn"></button>
        </template>
    </v-braintree>
</template>
<script>
export default {
    name: "PaymentComponent",
    data() {
        return {
            disable: true,
            form: {
                token: "",
                amount: "",
            },
        }
    },
    props: {
        authorization: {
            required: true,
            type: String
        },
    },
    methods: {
        onLoad() {
            this.disable = false
        },
        onSuccess(payload) {
            const token = payload.nonce;
            this.$emit('onSuccess', token)

            // this.form.token = token
            
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
            //         console.log(`Axios => ${error}`);
            //     });
        },
        onError(error) {
            // console.log(`onError => ${error.message}`);
            this.$emit('onError', error)
        },
    },
    mounted() {
        this.form.amount = localStorage.getItem("totalPrice");
    }
}
</script>
<style lang="scss" scoped>
.payment {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>