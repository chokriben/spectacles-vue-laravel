<template>

 <Addpizza />
    <div class="card">
        <DataTable
            :value="pizzas"
            stripedRows
            paginator
            showGridlines
            :rows="3"
            dataKey="id"
            :loading="isLoading"
        >

            <Column field="nom" header="nom"></Column>
            <Column field="details" header="details" sortable></Column>
            <Column field="prix" header="Prix" sortable></Column>
            <Column field="qtestock" header="Quantity" sortable></Column>
            <Column field="id" header="Actions" style="min-width: 12rem">
                <template #body="val">
                    <div class="d-flex">
                        <Editpizza :art="val.data" />
                        <button
                            type="button"
                            class="btn btn-warning rounded-circle"
                            @click="deletearticle(val.data.id)"
                        >
                            <span style="color: rgb(245, 5, 5)">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </button>
                    </div>
                </template>
            </Column>
        </DataTable>
    </div>

</template>
<script setup>
import api from "../config/api.js";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { ref, onMounted } from "vue";
import Editpizza from "./Editpizza.vue";
import Addpizza from "./Addpizza.vue";
const pizzas = ref([]);
const isLoading = ref(true);
const getpizzas = async () => {
    await api
        .get("/api/pizzas")
        .then((res) => {
            pizzas.value = res.data;
            console.log(pizzas.value)
            isLoading.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getpizzas();
});
const deletearticle = async (id) => {
    if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
        try {
            await api.delete(`/api/pizzas/${id}`);
            getpizzas();
        } catch (error) {
            console.log(error);
        }
    }
};
</script>
<style lang="css" scoped></style>
