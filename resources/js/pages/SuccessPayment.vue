<template>
    <div>
        <div class="h-screen flex flex-column justify-center items-center gap-3" v-if="bool">
            <h2 class="text-5xl">
                Grazie per aver ordinato sul nostro sito!
            </h2>
            <h3 class="text-3xl">
                Il tuo ordine verrà elaborato il prima possibile!
            </h3>
        </div>

        <div class="flex items-center justify-center h-screen flex-col gap-3 py-5" v-else>
            <h1 class="text-4xl font-bold text-center pb-6">
                Qualcosa è andato storto!
            </h1>

            <h2 class="text-4xl text-center pb-6">
                A breve verrai reindirizzato alla home...
            </h2>
        </div>
    </div>
</template>
<script>
export default {
    name: "SuccessPayment",
    props: ['bool'],
    mounted() {
        setTimeout(() => {
            this.$router.push({ name: "home" });
        }, "4000")
    }
}
</script>