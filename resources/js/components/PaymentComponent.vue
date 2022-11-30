<template>
    <v-braintree :authorization="authorization" locale="it_IT" @load="onLoad" @success="onSuccess" @error="onError"
        :btnText="disable ? 'Caricamento' : 'Procedi col pagamento'"
        btnClass="add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none">
        <template v-slot:button="slotProps">
            <!-- <v-btn @click="slotProps.submit" :class="{
                'cursor-pointer add_to_cart box_shadow_stroke_small bg_link_color c_text_color text-xl py-1 px-2 hover:shadow-none': true,
                'opacity-25': disable
                }">
                {{ disable ? 'Caricamento' : 'Procedi col pagamento' }}
            </v-btn> -->
            <v-btn @click="slotProps.submit" ref="paymentBraintreeBtn" />
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
            data: JSON.stringify(this.form),
            config: {
                method: "post",
                url: "http://localhost:8000/api/orders/payment",
                headers: { "Content-Type": "application/json" },
                data: this.data,
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
        // makeOrder() {
        //     axios.get(`api/orders/making/${this.ids}`)
        //         .then(res => {
        //             console.log(res.data);
        //         }).catch(err => {
        //             console.log(err);
        //             //redirect to 404
        //             this.$router.push({ name: "404" });
        //         });
        // },
        onLoad() {
            this.disable = false
        },
        onSuccess(payload) {
            const token = payload.nonce;
            this.form.token = token

            axios(this.config)
                .then(function (response) {
                    console.log(JSON.stringify(response.data));
                })
                .catch(function (error) {
                    console.log(error);
                });


            setTimeout(() => {
                this.$router.push({ name: "SuccessPayment" });
            }, "1000")
        },
        onError(error) {
            console.log(`onError => ${error.message}`);
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