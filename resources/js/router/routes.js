import Home from '../pages/Home.vue';
import RestaurantsShow from '../pages/RestaurantsShow.vue';
import PlateShow from '../pages/PlateShow.vue';
import Page404 from '../pages/404.vue';
import Cart from '../pages/Cart.vue';
import CheckOut from '../pages/CheckOut.vue';
import SuccessPayment from '../pages/SuccessPayment.vue';
import About from '../pages/About.vue';
import Contacts from '../pages/Contacts.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/ristoranti/:slug/piatti',
        name: 'restaurants.show',
        component: RestaurantsShow,
        props: true
    },
    {
        path: '/ristoranti/:restSlug/piatti/:slug',
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
        name: 'checkout',
        component: CheckOut,
        props: true
    },
    {
        path: '/success',
        name: 'successpayment',
        component: SuccessPayment,
        props: true
    },
    {
        path: '/chi-siamo',
        name: 'about-us',
        component: About,
    },
    {
        path: '/contatti',
        name: 'contacts',
        component: Contacts,
    },
    {
        path: '*',
        name: '404',
        component: Page404,
    },
];

export default routes;