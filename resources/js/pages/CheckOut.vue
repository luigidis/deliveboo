<template>
    <div class="flex items-center justify-center h-screen flex-column gap-3 py-5">
        <PaymentComponent v-if="show" :authorization="tokenApi" />
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
        }
    },
    components: {
        PaymentComponent
    },
    mounted() {
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