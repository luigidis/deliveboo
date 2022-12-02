<template>
    <div>
        <footer class="w-full  pt-2 pb-5 debug_me px-3">
            <div class="container container_mine gap-4  ">
                <div class="col_footer debug_me box_shadow_stroke hover:shadow-none hover:scale-95 card_restaurant">
                    <ul>
                        <li>
                            <a href="#">
                                <h6>Scopri DeliveBoo</h6>
                            </a>
                        </li>
                        <li class="pt_175">
                            <a href="#">Chi Siamo</a>
                        </li>
                        <li class="pt_175">
                            <a href="#">Ristoranti</a>

                        </li>
                        <li class="pt_175">
                            <a href="#">Altro</a>
                        </li>
                    </ul>
                </div>
                <div class="col_footer debug_me box_shadow_stroke hover:shadow-none hover:scale-95 card_restaurant">
                    <ul>
                        <li>
                            <a href="#">
                                <h6>Note Legali</h6>
                            </a>
                        </li>
                        <li class="pt_175">
                            <a href="#">Termini &#38; Condizioni</a>
                        </li>
                        <li class="pt_175">
                            <a href="#">Informativa sulla privacy</a>

                        </li>
                        <li class="pt_175">
                            <a href="#">Cookies</a>
                        </li>
                    </ul>
                </div>
                <div class="col_footer debug_me box_shadow_stroke hover:shadow-none hover:scale-95 card_restaurant">
                    <ul>
                        <li>
                            <a href="#">
                                <h6>Help</h6>
                            </a>
                        </li>
                        <li class="pt_175">
                            <a href="#">Contatti</a>
                        </li>
                        <li class="pt_175">
                            <a href="#">FAQ</a>

                        </li>
                        <li class="pt_175">
                            <a href="#">Tipi di cucina</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container container_logo">
                <a href="#" class="my_logo">
                    <FacebookSvgVue />
                </a>
                <a href="#" class="my_logo">
                    <InstagramSvgVue />
                </a>
                <a href="#" class="my_logo">
                    <TwtitterSvgVue />
                </a>
            </div>


        </footer>
    </div>
</template>







<script>
import CopyRightSvgVue from './svgs/CopyRightSvg.vue';
import FacebookSvgVue from './svgs/FacebookSvg.vue';
import InstagramSvgVue from './svgs/InstagramSvg.vue';
import TwtitterSvgVue from './svgs/TwtitterSvg.vue';

export default {
    components: {
        CopyRightSvgVue,
        FacebookSvgVue,
        InstagramSvgVue,
        TwtitterSvgVue,
    }

}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.pt_175 {
    padding-top: 1.175rem;
}

// .debug_me {
//     // border: solid 1px red;
//     // height: 50px;
// }


footer {
    background-color: $link-color;

    .container_mine {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 50px;
    }

    .col_footer {
        max-width: 335px;
        min-width: 300px;
        height: 393px;
        padding: 30px;
        background-color: $text-color;
       h6 {
        font-size: 1.25rem;
        line-height: 1.75rem;
        font-weight: 700;
       }
    }

    @media screen and (max-width: 1023px) {
        .col_footer {
            max-width: 250px;
            min-width: 250px;
            
        }
    }

    @media screen and (max-width: 840px) {
        .col_footer {
            max-width: 200px;
            min-width: 200px;   
        }
    }

    @media screen and (max-width: 680px) {
        .col_footer {
            max-width: 180px;
            min-width: 180px;   
        }
    }

    @media screen and (max-width: 640px) {
        .col_footer {
            max-width: 130px;
            min-width: 130px;   
        }
    }



    .container_logo {
        display: flex;
        height: 80px;
        gap: 50px;
        margin-top: 30px;
        align-items: center;
    }
}
</style>