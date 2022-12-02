<template>
    <div class="container py-20">
        <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-5">
                    <h1 class="font-bold text-6xl">
                        Contatti
                    </h1>
                </div>
            </div>
        <div class="container_card">
            <ContactCard2 :links="link_team"/>
        </div>
       
    </div>
</template>

<script>
import ContactCard2 from '../components/ContactCard2.vue';
    
    export default {
        components: {
            ContactCard2
        },
        data() {
            return {
                link_team: [
                    {
                        nome: 'Francesco Pieraccini',
                        img: require('../assets/images/5.png'),
                        linkedin: 'https://www.linkedin.com/in/francescopieraccini/',
                        github: 'https://github.com/Amreal-Lamanera/'
                    },
                    {
                        nome: 'Giuseppe Cosenza',
                        img: require('../assets/images/2.png'),
                        linkedin: 'https://www.linkedin.com/in/stefanocracco',
                        github: 'https://github.com/giusscos'
                    },
                    {
                        nome: 'Luigi Di Stefano',
                        img: require('../assets/images/3.png'),
                        linkedin: 'https://www.linkedin.com/in/luigi-distefano/',
                        github: 'https://github.com/luigidis'
                    },
                    {
                        nome: 'Fabio Longoni',
                        img: require('../assets/images/4.png'),
                        linkedin: 'https://www.linkedin.com/in/fabio-longoni/',
                        github: 'https://github.com/FabioLongoni'
                    },
                    {
                        nome: 'Stefano Cracco',
                        img: require('../assets/images/1.png'),
                        linkedin: 'https://www.linkedin.com/in/stefanocracco',
                        github: 'https://github.com/Ste-cracco'
                    },
                ]
            }
        },
        methods: {
            
        }
    }
</script>