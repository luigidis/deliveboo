<template>
    <main class="flex flex-column justify-center py-16">
        <JumboTron />
        <RestaurantSearch />
        <SuggestedRestaurants v-if="!Object.keys(query).length"/>
        <AdvancedSearch v-else :par="par" />
    </main>
</template>

<script>
import TheLogo from '../components/TheLogo.vue';
import RestaurantSearch from '../components/RestaurantSearch.vue';
import SuggestedRestaurants from '../components/SuggestedRestaurants.vue';
import AdvancedSearch from '../components/AdvancedSearch.vue';

import JumboTron from '../components/JumboTron.vue';

export default {
    components: {
        RestaurantSearch,
        TheLogo,
        SuggestedRestaurants,
        JumboTron,
        AdvancedSearch
    },
    computed: {
        query() {
            return this.$route.query;
        }
    },
    data() {
        return {
            par: '',
        }
    },
    watch: {
        '$route.query': {
            immediate: true,
            handler() {
                let par = new Array;
                if (Object.keys(this.query).length) {
                    if (this.query.categories.length) {
                        if (typeof this.query.categories === 'object') {
                            par = this.query.categories;
                        } else {
                            par.push(this.query.categories);
                        }
                    }
    
                    if (this.query.name !== '') {
                        par.push('%');
                        par.push(this.query.name);
                    }
    
                    this.par = par;
                }
            }
        }
    },
    mounted() {
        console.log(this.$route.query);
    },
}

</script>