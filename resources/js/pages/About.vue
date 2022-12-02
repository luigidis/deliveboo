<template>
    <section class="container py-20">
        <div class="flex flex-wrap items-center">
            <div class="box_shadow_stroke py-2 px-3 mb-5">
                <h2 class="font-bold text-6xl">
                    Il nostro <span class="c_seco_color">Team</span>
                </h2>
            </div>
        </div>
        <div>
            <TeamCards :links="linksTeam" />
        </div>
    </section>
</template>

<script>
import TeamCards from '../components/TeamCards.vue';

export default {
    components: {
        TeamCards
    },
    data() {
        return {
            linksTeam: [
                {
                    name: 'Francesco Pieraccini',
                    img: require('../assets/images/profile-francesco.webp'),
                    linkedin: 'https://www.linkedin.com/in/francescopieraccini/',
                    github: 'https://github.com/Amreal-Lamanera/'
                },
                {
                    name: 'Giuseppe Cosenza',
                    img: require('../assets/images/profile-giuseppe.webp'),
                    linkedin: 'https://www.linkedin.com/in/giuseppepio-cosenza',
                    github: 'https://github.com/giusscos'
                },
                {
                    name: 'Luigi Di Stefano',
                    img: require('../assets/images/profile-luigi.webp'),
                    linkedin: 'https://www.linkedin.com/in/luigi-distefano/',
                    github: 'https://github.com/luigidis'
                },
                {
                    name: 'Fabio Longoni',
                    img: require('../assets/images/profile-fabio.webp'),
                    linkedin: 'https://www.linkedin.com/in/fabio-longoni/',
                    github: 'https://github.com/FabioLongoni'
                },
                {
                    nome: 'Stefano Cracco',
                    img: require('../assets/images/profile-stefano.webp'),
                    linkedin: 'https://www.linkedin.com/in/stefanocracco',
                    github: 'https://github.com/Ste-cracco'
                },
            ]
        }
    },
}
</script>