<template>
    <ul class="flex-wrap gap-3  ">
        <li v-for="(link, i) in links" :key="i" class="w-1/3 box_shadow_stroke hover:no-underline hover:shadow-none hover:scale-95">
            <div class="container_img">
                <img :src="link.img" alt="" />
            </div>
            <div class="">
                <span class="text-2xl text-center font-bold block pt-4 pb-2">
                    {{link.nome}}
                </span>
                <h5 class="text-center text-lg">
                    Full Stack Web Developer
                </h5>

            </div>
            <div class="flex justify-center gap-3 p-3">
                <a :href="link.linkedin">
                    <SvgLinkedIn class="svg_icon w-10 pb-3"  />
                </a>
                <a :href="link.github">
                    <SvgGitHub class="svg_icon w-10 " />
                </a>
            </div>
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


</style>