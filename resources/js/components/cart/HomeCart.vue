<template>
    <div class="drag">
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else class="row">
            <div
                class="col-md-12"
                style="display: flex; flex-wrap: wrap; justify-content: center"
            >
                <div
                    class="card"
                    style="width: 18rem; margin: 6px"
                    v-for="prod in pizzas"
                    :key="prod.id"
                >

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ prod.nom.substr(0, 20) }}
                        </h5>
                        <div style="text-align: center">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prix : {{ prod.prix }} TND
                                </li>
                            </ul>
                            <button
                                class="btn btn-outline-primary"
                                @click="addToCart($event, prod)"
                                v-if="prod.qtestock > 1"

                            >
                                Add to Cart
                            </button>
                            <button
                                class="btn btn-default"
                                v-if="prod.qtestock <= 1"
                            >
                                OUT OF STOCK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import axios from "../config/api";
import { ref, onMounted } from "vue";
import store from "../../store";

const pizzas = ref([]);
const isLoading = ref(true);

onMounted(() => {
    getpizzas();
});

const getpizzas = (page = 1) => {
    axios.get("/api/pizzas/")
    .then((response) => {
        pizzas.value = response.data;
        isLoading.value = false;
    });
};

const addToCart = (event, prod) => {
    event.preventDefault();
    store.commit("Pizzasstore/addCart", { product: prod, qty: 1 });
};
</script>
<style scoped>
.drag {
    margin-top: 70px;
}
</style>
