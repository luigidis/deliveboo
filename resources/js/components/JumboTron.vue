<template>
    <section class="jumbo_wrapper w-full relative">
        <div class="jumbo_header absolute w-3/5 md:w-1/3 xl:w-1/4 z-10">
            <h2 class="c_text_color font-bold text-4xl sm:text-5xl md:text-6xl">
                Scegli<br>Ordina<br>Mangia comodamente a casa tua!
            </h2>
        </div>
        <img class="block object-cover object-center h-full w-full" src="../assets/images/prova.jpg">
        <div class="layover absolute inset-0"></div>
    </section>
</template>

<script>
import TheLogo from './TheLogo.vue';

export default {
    components: { TheLogo }
}
</script>

<style lang="scss" scoped>
.jumbo_wrapper {
    height: calc(60vh - 4rem);

    .jumbo_header {
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
}

.layover {
    background-color: rgba(0, 0, 0, 0.5);
}

@media(min-width: 768px) {
    .jumbo_wrapper {
        height: calc(70vh - 4rem);

        .jumbo_header {
            left: 50%;
            top: 50%;
            transform: translate(-100%, -50%);
        }
    }
}
</style>