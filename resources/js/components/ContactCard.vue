<template>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <li v-for="(link, i) in links" :key="i"
            class="box_shadow_stroke flex flex-column">
            <div>
                <img class="object-cover w-full h-full block" :src="link.img" alt="">
            </div>
            <div class="flex flex-col grow justify-start p-2 leading-none c_prim_color">
                <h3 class="mb-2 text-4xl font-bold">
                    {{ link.name }}
                </h3>
                <p class="font-normal text-2xl">
                    Full Stack Web Developer
                </p>
            </div>
            <ul class="list flex items-center gap-3 px-2">
                <li class="list_item relative">
                    <a target="_blank" ef="link.linkedin" class="absolute inset-0" :title="`Profilo linkedin di ${link.name}`"></a>
                    <SvgLinkedIn class="svg_icon" />
                </li>
                <li class="list_item relative">
                    <a target="_blank" :href="link.github" class="absolute inset-0" :title="`Profilo Github di ${link.name}`"></a>
                    <SvgGitHub class="svg_icon" />
                </li>
            </ul>
        </li>
    </ul>
</template>

<script>
import SvgLinkedIn from "./SvgLinkedIn.vue";
import SvgGitHub from "./SvgGitHub.vue";

export default {
    components: {
        SvgLinkedIn,
        SvgGitHub
    },
    props: {
        links: Array
    },
    data() {
        return {

        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.svg_icon {
    width: 2rem;
    aspect-ratio: 1/1;
    fill: $seco-color;
}
</style>