<template>
    <header class="main_heder py-2 px-3 fixed w-full top-0 bg_text_color stroke_bottom">
        <div class="container flex">
            <div class="logo_wrapper">
                <h1 class="logo text-3xl font-bold relative">
                    <router-link to="/" class="absolute w-full h-full" title="Vai alla home"></router-link>
                    Delive<span class="c_seco_color">Boo</span>
                </h1>
            </div>
            <nav class="navigation ml-auto">
                <ul class="flex items-center h-full">
                    <li>
                        <a href="/admin" class="font-normal text-xl" title="Accedi al tuo ristorante">
                            Il tuo ristorante
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>
<script>
export default {
    name: 'TheHeader',
}
</script>
<style lang="scss" scoped>

</style>