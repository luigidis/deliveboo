import Home from '../pages/Home.vue';
// import ContactUs from '../pages/ContactUs.vue';
// import AboutUs from '../pages/AboutUs.vue';
// import PostsIndex from '../pages/Posts.index.vue';
// import PostsShow from '../pages/Posts.show.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';
import RestaurantsShow from '../pages/RestaurantsShow.vue';
import PlateShow from '../pages/PlateShow.vue';
import Page404 from '../pages/404.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/ricerca',
        name: 'restaurants.search',
        component: AdvancedSearch,
    },
    {
        path: '/ristoranti/:slug',
        name: 'restaurants.show',
        component: RestaurantsShow,
        props: true
    },
    {
        path: '/ristoranti/piatti/:slug',
        name: 'restaurants.plateShow',
        component: PlateShow,
        props: true
    },
    {
        path: '*',
        name: '404',
        component: Page404,
    }
];

export default routes;