<template>
    <v-braintree :authorization="authorization" locale="it_IT" @load="onLoad" @success="onSuccess" @error="onError"
        :btnText="disable ? 'Caricamento' : 'Procedi col pagamento'"
        btnClass="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none" class="w-full">
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
        },
        onError(error) {
            this.$emit('onError', error)
        },
    },
    mounted() {
        this.form.amount = localStorage.getItem("totalPrice");
    }
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables';
</style>