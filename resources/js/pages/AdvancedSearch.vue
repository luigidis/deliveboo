<template>
    <section class="relative">
            <div class="container py-16">
                <div class="card-wrap grid grid-cols-4 gap-6">
                    <div class="card" v-for="(restaurant, i) in restaurantsArray" :key="i">
                        <img :src="restaurant.image" alt="">
                        <div class="desc p-2">
                            <div>
                                {{ restaurant.name }}
                            </div>
                            <div>
                                {{ restaurant.address }}
                            </div>
                            <div>
                                {{ restaurant.phone }}
                            </div>
                            <div>
                                {{ restaurant.p_iva }}
                            </div>
                            <ul>
                                <li v-for="(category, i) in restaurant.categories" :key="1000-i">
                                    {{ category.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>
<script>
export default {
    name: 'AdvancedSearch',
    data(){
        return{
            restaurantsArray: new Array,
        }
    },
    // props: {
    //     restaurants: Array,
    // },
    methods: {
        fetchRestaurants() {
            const par = this.$route.query.categories;
            axios.get(`/api/restaurants/categories/${par}`).then(res => {
                this.restaurantsArray = res.data.finalRestaurants;
                // this.categories = res.data.categories;
                // console.log(res.data.result.data);
                // console.log(res);
            }).catch(err => {
                // console.log(err);
                // this.$router.push({ name: '404' });
            })
        },
    },
    mounted() {
        console.log(this.$route.query.categories);
        console.log(this.$route.query.name);
        this.fetchRestaurants()
    }
}
</script>