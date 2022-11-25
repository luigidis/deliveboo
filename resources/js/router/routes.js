import Home from '../pages/Home.vue';
// import ContactUs from '../pages/ContactUs.vue';
// import AboutUs from '../pages/AboutUs.vue';
// import PostsIndex from '../pages/Posts.index.vue';
// import PostsShow from '../pages/Posts.show.vue';
import AdvancedSearch from '../pages/AdvancedSearch.vue';
import Page404 from '../pages/404.vue';
import ProductList from '../pages/ProductList.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    // {
    //     path: '/contatti',
    //     name: 'contact-us',
    //     component: ContactUs
    // },
    // {
    //     path: '/chi-siamo',
    //     name: 'about-us',
    //     component: AboutUs
    // },
    // {
    //     path: '/blog',
    //     name: 'posts.index',
    //     component: PostsIndex
    // },
    {
        path: '/products',
        name: 'products',
        component: ProductList,
    },
    {
        path: '/ricerca',
        name: 'restaurants.search',
        component: AdvancedSearch,
        props: true
    },
    {
        path: '*',
        name: '404',
        component: Page404,
    }
];

export default routes;