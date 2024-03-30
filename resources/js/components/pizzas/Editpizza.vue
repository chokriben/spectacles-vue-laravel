<template>
    <button
        type="button"
        class="btn btn-warning rounded-circle"
        @click="visible = true"
    >
        <span style="color: rgb(233, 240, 241)">
            <i class="fa-solid fa-pen-to-square"></i>
        </span>
    </button>
    <form>
        <div class="card flex justify-content-center">
            <Dialog v-model:visible="visible">
                <div class="row">
                    <div class="col-md-6">
                        <label for="reference" class="form-label"
                            >Référence</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="reference"
                            v-model="pizza.nom"
                        />
                    </div>
                    <div class="col-md-6 ms-auto">
                        <label for="designation" class="form-label"
                            >Désignation</label
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
                    @click="modifierproduit"
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
import api from "../config/api.js";
import { ref, onMounted } from "vue";

import Dialog from "primevue/dialog";
const props = defineProps(["art"]);
const visible = ref(false);
const pizza = ref({});
const loadpizza = () => {
    console.log(props.art);
    pizza.value = props.art;
};
onMounted(() => {
    loadpizza();
});
const modifierproduit = () => {
    api.put(`/api/pizzas/${pizza.value.id}`, pizza.value)
        .then(() => {
            visible.value = false;
        })
        .catch((error) => {
            console.error("There was an error!", error);
        });
};
const cancel = () => {
    visible.value = false;
};
</script>
<style scoped></style>
