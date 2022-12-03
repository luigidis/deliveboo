<template>
    <div class="logo_wrapper">
        <h1 class="logo text-3xl font-bold relative flex items-center gap-2">
            <router-link to="/" class="absolute inset-0" title="Vai alla home"></router-link>
            <span class="w-[70px]">
                <SvgLogo class="fill-white object-fit w-full h-full" />
            </span>
            <span class="hidden md:inline">
                Delive<span class="c_seco_color">Boo</span>
            </span>
        </h1>
    </div>
</template>
<script>
import SvgLogo from './svgs/SvgLogo.vue';

export default{
    components: { SvgLogo }
}
</script>