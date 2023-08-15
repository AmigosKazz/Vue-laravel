<template>
  <div>
    <h2 class="title">AJOUTER VISITEUR</h2>

    <br />

    <form action="" @submit="saveVisiteur">
      <label for="">Numero visiteur</label
      ><input type="text" v-model="numero_visiteur" />
      <br />
      <br />
      <label for="">Nom de visiteur</label><input type="text" v-model="nom" />
      <br />
      <br />
      <label for="">Nombre de jour</label>
      <input type="text" v-model="nombre_jour" />
      <br />
      <br />
      <label for="">Tarif</label><input type="text" v-model="tarif" />
      <br />
      <br />
      <br />
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {};
  },
  methods: {
    async saveVisiteur(event) {
      event.preventDefault();

      let visiteur = {
        numero_visiteur: this.numero_visiteur,
        nom: this.nom,
        nombre_jour: this.nombre_jour,
        tarif: this.tarif,
      };

      console.log(visiteur);
      await axios
        .post("http://127.0.0.1:8000/api/ajouter/traitement", visiteur)
        .then((response) => {
          console.log(response.data);
          alert(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="css" scoped>
form {
  width: 50%;
  margin-left: 25%;
  background-color: rgb(187, 192, 191);
  padding: 3vw;
  border-radius: 1vw;
}

hr {
  width: 30%;
}

.title {
  margin-left: 43%;
}

* {
  font-family: sans-serif;
}

label {
  min-width: 120%;
  display: inline-block;
  font-size: 20px;
}

input,
select {
  width: 85%;
  height: 2vw;
}

button {
  border: 0;
  background-color: blue;
  color: white;
  width: 15%;
  height: 2vw;
  margin-left: 40%;
}
</style>
