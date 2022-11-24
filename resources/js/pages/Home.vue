<template>
    <main>
        <section>
            <div class="container py-4">
                <input type="text" name="" id="" v-model="filter" class="border-2 border-rose-500">

                <div v-for="(category,                                                                                                                                                                                                     i) in categories" :key="20                                                                                                                                                                                                     -                                                                                                                                                                                                     i">
                    <input type="checkbox" :name="category.name" :value="category.id" @click="addfilCat(category.name)">
                    <label :for="category.name">
                        {{ category.name }}
                    </label>
                </div>
            </div>
        </section>

        <section class="relative">
            <div class="container py-16">
                <div class="card-wrap grid grid-cols-4 gap-6">
                    <div class="card" v-for="(restaurant, i) in filteredRestaurants" :key="i">
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
                                <li v-for="(category,                                                                                                                                                                                                     i) in restaurant.categories" :key="1000                                                                                                                                                                                                     -                                                                                                                                                                                                     i">
                                    {{ category.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    data() {
        return {
            title: 'Ciao Deliveboo',
            restaurants: new Array,
            categories: new Array,
            filter: '',
            filterCat: new Array,
        }
    },
    computed: {
        filteredRestaurants() {
            return this.restaurants.filter((el) => {
                const name = el.name.toLowerCase()
                const filter = this.filter.toLowerCase()
                const categories = el.categories;

                const categoriesName = categories.map(element => {
                    return element.name
                });

                if (name.includes(filter) && this.arrayContains(categoriesName, this.filterCat)) {
                    return true
                }
                return false
            })
        }
    },
    methods: {
        fetchRestaurants() {
            axios.get('/api/restaurants').then(res => {
                this.restaurants = res.data.result.data;
                this.categories = res.data.categories;
                // console.log(res.data.result.data);
                // console.log(res.data.categories);
            }).catch(err => {
                // console.log(err);
                this.$router.push({ name: '404' });
            })
        },
        addfilCat(category) {
            // this.bool = !this.bool;
            if (!this.filterCat.includes(category)) {
                this.filterCat.push(category);
            } else {
                const index = this.filterCat.indexOf(category);
                this.filterCat.splice(index, 1);
            }
            // console.log(this.filterCat);
        },
        arrayContains(a, s) {
            for (var i = 0, l = s.length; i < l; i++) {
                if (!~a.indexOf(s[i])) {
                    return false;
                }
            }
            return true;
        }
    },
    beforeMount() {
        this.fetchRestaurants();
    },
}
</script>

<style>

</style>