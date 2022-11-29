<template>
    <div class="h-screen flex flex-column justify-center items-center gap-3">
        <h2 class="text-5xl">
            Grazie per aver ordinato sul nostro sito!
        </h2>
        <h3 class="text-3xl">
            Il tuo ordine verrà elaborato il prima possibile!
        </h3>
    </div>
</template>
<script>
export default {
    name: "SuccessPayment",
    mounted() {
        setTimeout(() => {
            this.$router.push({ name: "home" });
        }, "4000")
    }
}
</script>