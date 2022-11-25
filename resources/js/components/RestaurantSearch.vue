<template>
    <div class="flex w-full items-center justify-center flex-column gap-5 py-5">
        <input type="text" v-model="filter" class="box_shadow_stroke_small text-3xl font-normal" style="width: 300px;">

        <div class="flex gap-4 w-2/3 flex-wrap justify-center">
            <div v-for="(category, i) in categories" :key="20 - i">
                <!-- <input type="checkbox" :name="category.name" :value="category.id" > -->
                <span @click="addfilCat(category.name)" :class="{
                    'box_shadow_stroke_small text-lg font-normal px-2 py-1 cursor-pointer': !filterCat.includes(category.name),
                    'box_shadow_stroke_small bg_link_color c_text_color text-lg font-normal px-2 py-1 cursor-pointer': filterCat.includes(category.name),}"
                    :title="`Seleziona ${category.name}`">
                    {{ category.name }}
                </span>
            </div>
        </div>
        <!-- <input type="button" value="VAI" @click="fetchRestaurants"> -->
        <router-link :to="{
            name: 'restaurants.search',
            query: { categories: filterCat, name: filter }
        }" class="text-3xl bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button">
            Cerca ristorante
        </router-link>
    </div>
</template>
<script>
export default {
    name: 'RestaurantSearch',
    data() {
        return {
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
                    return element.name.toLowerCase()
                });

                if (name.includes(filter) && this.arrayContains(categoriesName, this.filterCat)) {
                    return true
                }
                return false
            })
        }
    },
    methods: {
        fetchCategories() {
            axios.get(`/api/restaurants`).then(res => {
                // this.restaurants = res.data.result.data;
                this.categories = res.data.categories;
                // console.log(res.data.result.data);
                // console.log(res);
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
        this.fetchCategories();
    },
}
</script>