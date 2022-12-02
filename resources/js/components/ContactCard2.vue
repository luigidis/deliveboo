<template>
    <ul class="grid rid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6 ">
        <li v-for="(link, i) in links" :key="i" class="mb-2 box_shadow_stroke hover:shadow-none hover:scale-95">
            <a href="#" class="flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" :src="link.img" alt="">
                <div class="flex flex-col justify-between px-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{link.nome}}</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Full Stack Web Developer</p>
                    <div class="flex gap-3">
                        <a :href="link.linkedin">
                            <SvgLinkedIn class="svg_icon w-10 pb-3"  />
                        </a>
                        <a :href="link.github">
                            <SvgGitHub class="svg_icon w-10 " />
                        </a>
                    </div>
                </div>
            </a>
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