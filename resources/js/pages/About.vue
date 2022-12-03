<template>
    <section class="container py-20">
        <div class="flex flex-wrap items-center">
            <div class="box_shadow_stroke py-2 px-3 mb-5">
                <h2 class="font-bold text-6xl">
                    Il nostro <span class="c_seco_color">Team</span>
                </h2>
            </div>
        </div>
        <div class="pb-20">
            <TeamCards :links="linksTeam" />
        </div>
        <div class="flex flex-wrap items-center">
            <div class="box_shadow_stroke py-2 px-3 mb-5">
                <h2 class="font-bold text-6xl">
                    I nostri <span class="c_seco_color">Valori</span>
                </h2>
            </div>
        </div>
        <div class="lg:flex gap-6 items-center">
            <div class="basis-1/2 mb-4 mb-lg-0">
                <div class="box_shadow_stroke">
                    <img src="../assets/images/values.webp" alt="In cosa Crediamo" class="block w-full">
                </div>
            </div>
            <div class="basis-2/5">
                <div class="box_shadow_stroke p-4">
                    <p class="text-3xl">
                        In DeliveBoo, i nostri valori sono al centro di tutto ciò che facciamo. Guidano il modo in cui lavoriamo insieme e prendiamo decisioni, che si tratti di reclutamento o evoluzione e sviluppo delle nostre persone, team e prodotti.
                    </p>
                </div>
            </div>
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
                    name: 'Luigi Distefano',
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
                    name: 'Stefano Cracco',
                    img: require('../assets/images/profile-stefano.webp'),
                    linkedin: 'https://www.linkedin.com/in/stefanocracco',
                    github: 'https://github.com/Ste-cracco'
                },
            ]
        }
    },
}
</script>