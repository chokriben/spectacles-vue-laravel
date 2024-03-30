<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <button
                type="button"
                class="btn btn-warning rounded-circle"
                @click="visible = true"
            >
                <span style="color: rgb(43, 27, 27)">
                    <i class="fa-solid fa-square-plus"> </i>
                </span>
                New
            </button>

            <!-- Ajouter ce code ci-dessous -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link
                        class="nav-link active"
                        to="/addpizza"
                    ></router-link>
                </li>
            </ul>
            <!-- Fin du code ajouté -->
        </div>
    </nav>

    <form>
        <div class="card flex justify-content-center">
            <Dialog v-model:visible="visible">
                <div class="row">
                    <div class="col-md-6">
                        <label for="reference" class="form-label">nom</label>
                        <input
                            type="text"
                            class="form-control"
                            id="reference"
                            v-model="pizza.nom"
                        />
                    </div>
                    <div class="col-md-6 ms-auto">
                        <label for="designation" class="form-label"
                            >Details</label
                        >
                        <input
                            type="texte"
                            class="form-control"
                            id="designation"
                            v-model="pizza.details"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        .
                        <label for="prix" class="form-label">Prix</label>
                        <input
                            type="text"
                            class="form-control"
                            id="prix"
                            v-model="pizza.prix"
                        />
                    </div>
                    <div class="col-md-6">
                        
                        <label for="prix" class="form-label">Quantity</label>
                        <input
                            type="text"
                            class="form-control"
                            id="prix"
                            v-model="pizza.qtestock"
                        />
                    </div>
                </div>



                <br />
                <button
                    type="submit"
                    className="btn btn-outline-primary"
                    @click="addpizza"
                >
                    <i class="fa-solid fa-floppy-disk"></i>Enregister
                </button>
                <button
                    type="button"
                    className="btn btn-outline-primary"
                    @click="cancel"
                >
                    <i class="fa-solid fa-floppy-disk"></i>cancel
                </button>
            </Dialog>
        </div>
    </form>
</template>
<script setup>
import { ref } from "vue";
import api from "../config/api.js";
import Dialog from "primevue/dialog";
const visible = ref(false);
const pizza = ref({
    nom: "",
    details: "",
    prix: "",
    qtestock: "",
});

const addpizza = async () => {
    try {
        await api.post("/api/pizzas/", pizza.value);
        {
            visible.value = false;
            window.location.reload();
        }
    } catch (error) {}
};

const cancel = () => {
    visible.value = false;
};
</script>
<style scoped></style>
