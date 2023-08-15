import { createRouter, createWebHistory } from "vue-router";
import Home from "./components/Home.vue";
import Ajouter from "./components/Ajout.vue";
import Liste from "./components/Liste.vue";
import Modifier from "./components/update.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/ajouter",
    name: "Ajouter",
    component: Ajouter,
  },
  {
    path: "/liste",
    name: "Liste",
    component: Liste,
  },
  {
    path: "/update/:id",
    name: "update",
    component: Modifier,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
