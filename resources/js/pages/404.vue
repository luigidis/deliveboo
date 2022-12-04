<template>
        <div class="container flex flex-column justify-center items-center">
            <h2 class="text-[64px] pb-6">
                404 | Pagina non trovata
            </h2>
            <h3 class="text-4xl text-center">
                A breve verrai reindirizzato alla home...
            </h3>
        </div>
</template>
<script>
export default {
    mounted(){
        setTimeout(() => {
            this.$router.push({ name: "home" });
        }, "2000")
        window.scrollTo(0,0)
    }
}
</script>

<style scoped>
    .container{
        height: 95vh;
    }
</style>