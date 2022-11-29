import Home from '../pages/Home.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';
import RestaurantsShow from '../pages/RestaurantsShow.vue';
import PlateShow from '../pages/PlateShow.vue';
import Page404 from '../pages/404.vue';
import Cart from '../pages/Cart.vue';
import CheckOut from '../pages/CheckOut.vue';
import SuccessPayment from '../pages/SuccessPayment.vue';

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
        path: '/carrello',
        name: 'cart',
        component: Cart,
    },
    {
        path: '/checkout',
        name: 'CheckOut',
        component: CheckOut,
    },
    {
        path: '/success',
        name: 'SuccessPayment',
        component: SuccessPayment,
    },
    {
        path: '*',
        name: '404',
        component: Page404,
    }
];

export default routes;