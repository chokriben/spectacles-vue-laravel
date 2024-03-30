import Accueil from './components/accueil.vue';
import Viewsalles from "./components/salles/Viewsalles.vue";
import Addsalle from "./components/salles/Addsalle.vue";
import Editsalle from "./components/salles/Editsalle.vue";
import Addspectacle from "./components/spectacles/Addspectacle.vue";
import Addpizza from './components/pizzas/Addpizza.vue';
import Editpizza from './components/pizzas/Editpizza.vue';
import Viewpizzas from './components/pizzas/Viewpizzas.vue';
import Cardpizza from "./components/pizzas/Cardpizza.vue";
import Cart from "./components/cart/Cart.vue";
import HomeCart from "./components/cart/HomeCart.vue";

export const routes = [
    {
        name: "Viewsalles",
        path: "/listsal",
        component: Viewsalles,
    },
{
name: 'accueil',
path: '/',
component: Accueil
},
{
    name: "Addsalle",
    path: "/addsalle",
    component: Addsalle,
},
{
    name: "Editsalle",
    path: "/editsalle/:id",
    component: Editsalle,
},
{
    name: "Addspectacle",
    path: "/addspectacle",
    component: Addspectacle,
},

{
    name: "Addpizza",
    path: "/addpizza",
    component: Addpizza,
},
{
    name: "Editpizza",
    path: "/Editpizza/:id",
    component: Editpizza,
},
{
    name: "Viewpizzas",
    path: "/listpizza",
    component: Viewpizzas,
},
{
    path: "/Cardpizza",
    name: "cardpizza",
    component: Cardpizza,
},
{
    path: "/cart",
    name: "Cart",
    component: Cart,
},

{
    path: "/shopping",
    name: "HomeCart",
    component: HomeCart,
},
];
