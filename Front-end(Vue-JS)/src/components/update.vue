<template>
  <div>
    <h2 class="title">MODIFIER MATERIEL</h2>
    <br />

    <form action="" @submit="ModifierVisiteur">
      <label for="">Numero visiteur</label
      ><input type="text" v-model="visiteur.numero_visiteur" />
      <br />
      <br />
      <label for="">Nom de visiteur</label
      ><input type="text" v-model="visiteur.nom" />
      <br />
      <br />
      <label for="">Nombre de jour</label>
      <input type="text" v-model="visiteur.nombre_jour" />
      <br />
      <br />
      <label for="">Tarif</label><input type="text" v-model="visiteur.tarif" />
      <br />
      <br />
      <br />
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      visiteur: {
        numero_visiteur: "",
        nom: "",
        nombre_jour: "",
        tarif: "",
      },
    };
  },
  mounted() {
    this.getVisiteur(this.$route.params.id);
  },
  methods: {
    getVisiteur(id) {
      axios.get(`http://localhost:8000/api/update/${id}`).then((res) => {
        console.log(res.data);
        this.visiteur = res.data;
        console.log("GGGGGGGGGGGGGG");
      });
    },

    async ModifierVisiteur(event) {
      event.preventDefault();

      const visiteur = {
        numero_visiteur: this.numero_visiteur,
        nom: this.nom,
        nombre_jour: this.nombre_jour,
        tarif: this.tarif,
        tarif_total: this.tarif_total,
      };

      await axios.post(
        `http://127.0.0.1:8000/api/update/traitement`,
        this.visiteur,
        (response) => {
          console.log("qwerty");
          console.log(response.data);
          (numero_visiteur = ""),
            (nom = ""),
            (nombre_jour = ""),
            (tarif = ""),
            (tarif_total = "");
        }
      );
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

input {
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
