<template>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <li v-for="(link, i) in links" :key="i"
            class="box_shadow_stroke flex flex-column">
            <div>
                <img class="object-cover w-full h-full block" :src="link.img" :alt="`Immagine profilo di ${link.name}`">
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
                    <a target="_blank" :href="link.linkedin" class="absolute inset-0" :title="`Profilo linkedin di ${link.name}`"></a>
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
import SvgLinkedIn from "./svgs/SvgLinkedIn.vue";
import SvgGitHub from "./svgs/SvgGitHub.vue";

export default {
    components: {
        SvgLinkedIn,
        SvgGitHub
    },
    props: {
        links: Array
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.svg_icon {
    width: 2.5rem;
    aspect-ratio: 1/1;
    fill: $seco-color;
    transition: 300ms cubic-bezier(0.075, 0.82, 0.165, 1);
}

.list_item{
    &:hover{
        .svg_icon{
            fill: $prim-color;
        }
    }
}
</style>