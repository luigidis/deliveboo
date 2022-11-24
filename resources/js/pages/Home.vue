<template>
    <main>
        <section>
            <div class="container py-4">
                <input type="text" name="" id="" v-model="filter" class="border-2 border-rose-500">

                <div v-for="(category,i) in categories" :key="20-i">
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
                                <li v-for="(category,i) in restaurant.categories" :key="1000-i">
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
            // bool: true
        }
    },
    computed: {
        filteredRestaurants() {
            return this.restaurants.filter((el) => {
                const name = el.name.toLowerCase()
                const filter = this.filter.toLowerCase()
                const categories = el.categories;
                let bool = false;

                categories.forEach(element => {
                    if(this.filterCat.includes(element.name))
                        bool = true;
                });

                if (name.includes(filter) && bool) {
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
                console.log(res.data.result.data);
                // console.log(res.data.categories);
            }).catch(err =>{
                // console.log(err);
                this.$router.push({ name: '404' });
            })
        },
        addfilCat(category) {
            // this.bool = !this.bool;
            if(!this.filterCat.includes(category)) {
                this.filterCat.push(category);
            } else {
                const index = this.filterCat.indexOf(category);
                this.filterCat.splice(index, 1);
            }
            // console.log(this.filterCat);
        }
    },
    beforeMount() {
        this.fetchRestaurants();
    },
}
</script>

<style>

</style>