<template>
    <div class="flex justify-center gap-5">
        <a href="#">
            <FacebookSvgVue class="svg_icon" id="fb-svg" />
        </a>
        <a href="#">
            <InstagramSvgVue class="svg_icon" id="insta-svg" />
        </a>
        <a href="#">
            <TwtitterSvgVue class="svg_icon" id="twitter-svg" />
        </a>
    </div>
</template>
<script>
import FacebookSvgVue from './svgs/FacebookSvg.vue';
import InstagramSvgVue from './svgs/InstagramSvg.vue';
import TwtitterSvgVue from './svgs/TwtitterSvg.vue';

export default {
    components: {
        FacebookSvgVue,
        InstagramSvgVue,
        TwtitterSvgVue,
    }
}
</script>
<style lang="scss" scoped>
@import '../../sass/variables';

.svg_icon {
    width: 4rem;
    padding: 0.5rem;
    aspect-ratio: 1/1;
    fill: $text-color;
    border: 3px solid transparent;
    transition: 300ms cubic-bezier(0.075, 0.82, 0.165, 1);

    &:hover {
        transform: scale(1.10);
        // fill: $seco-color;
        background-color: $text-color;

        &#fb-svg {
            border: 3px solid #0879e9;
            fill: #0879e9;
        }

        &#insta-svg {
            border: 3px solid $text-color;
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            -webkit-text-fill-color: transparent;

        }

        &#twitter-svg {
            border: 3px solid #1DA1F2;
            fill: #1DA1F2;
        }
    }

}
</style>