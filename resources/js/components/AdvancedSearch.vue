<template>
    <section class="flex flex-column items-center container">

        <h2 class="text-3xl pb-4 font-bold">
            Ristoranti trovati:
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <RestaurantCard :data="restaurant" v-for="(restaurant, i) in restaurantsArray" :key="i" />
        </div>
    </section>
</template>
<script>
import RestaurantCard from '../components/RestaurantCard.vue';

export default {
    name: 'AdvancedSearch',
    props: ['par'],
    components: {
        RestaurantCard
    },
    data() {
        return {
            restaurantsArray: new Array,
        }
    },
    methods: {
        fetchRestaurants() {
            axios.get(`/api/restaurants/categories/${this.par}`).then(res => {
                this.restaurantsArray = res.data.finalRestaurants;
                console.log(res);
            }).catch(err => {
                console.log(err);
                this.$router.push({ name: '404' });
            })
        },
    },
    mounted() {
        this.fetchRestaurants()
    },
    watch: {
        par: {
            immediate: true,
            handler() {
                this.fetchRestaurants();
            }
        }
    }
}
</script>