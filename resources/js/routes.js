import Accueil from './components/accueil.vue';
import Viewsalles from "./components/salles/Viewsalles.vue";
import Addsalle from "./components/salles/Addsalle.vue";
import Editsalle from "./components/salles/Editsalle.vue";
import Addspectacle from "./components/spectacles/Addspectacle.vue";

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
}
];
