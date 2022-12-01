<template>
    <header class="main_heder py-2 px-3 fixed w-full top-0 bg_text_color stroke_bottom z-50">
        <div class="container flex">
            <SmallLogo />
            <TheNav />
        </div>
    </header>
</template>
<script>
import SmallLogo from "./SmallLogo.vue";
import TheNav from "./TheNav.vue";

export default {
    name: "TheHeader",
    components: {
        SmallLogo,
        TheNav,
    }
}
</script>