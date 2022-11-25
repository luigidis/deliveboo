<template>
    <main class="container">
        <section class="py-20">
            <div class="card-wrap grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
                            <li v-for="(category, i) in restaurant.categories" :key="1000 - i">
                                {{ category.name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default {
    name: 'AdvancedSearch',
    data() {
        return {
            restaurantsArray: new Array,
        }
    },
    methods: {
        fetchRestaurants() {
            let par = new Array;
            if (this.$route.query.categories.length) {
                if (typeof this.$route.query.categories === 'object') {
                    par = this.$route.query.categories;
                } else {
                    par.push(this.$route.query.categories);
                }
            }

            if (this.$route.query.name !== '') {
                console.log('SONO DENTRO');
                par.push('%');
                par.push(this.$route.query.name);
            }
            console.log(par);
            axios.get(`/api/restaurants/categories/${par}`).then(res => {
                this.restaurantsArray = res.data.finalRestaurants;
                // console.log(res.data.result.data);
                console.log(res);
            }).catch(err => {
                // console.log(err);
                this.$router.push({ name: '404' });
            })
        },
    },
    mounted() {
        // console.log(this.$route.query.categories);
        // console.log(this.$route.query.name);
        this.fetchRestaurants()
    }
}
</script>