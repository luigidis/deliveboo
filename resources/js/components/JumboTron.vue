<template>
    <section class="jumbo_wrapper w-full relative">
        <div class="jumbo_header c_text_color font-bold text-3xl absolute flex justify-center w-3/5 md:w-2/5 items-center text-center z-10 flex flex-column gap-2">
            <TheLogo />
            Scegli, acquista, mangia comodamente a casa tua!
        </div>
        <img class="block object-cover object-center h-full w-full" src="../assets/images/prova.jpg">
        <div class="layover"></div>
    </section>
</template>

<script>
import TheLogo from './TheLogo.vue';


export default{
    components: { TheLogo }
}

</script>


<style lang="scss" scoped>

    .jumbo_wrapper {
        height: calc(50vh - 4rem);

        .jumbo_header {
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    }

    .layover {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }
    
</style>