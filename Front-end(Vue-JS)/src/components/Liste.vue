<script>
import axios from "axios";
export default {
  data() {
    return {
      Visiteurs: Array,
      max: null,
      min: null,
      somme: null,
    };
  },
  mounted() {},
  created() {
    this.getVisiteurs();
    this.getMinim();
    this.getMaxim();
    this.getSomme();
  },
  methods: {
    async getVisiteurs() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/visiteur");

        if (response.data.visiteur) {
          this.Visiteurs = response.data.visiteur;
          console.log(this.Visiteurs);
        } else {
          console.log("DATA VIDE");
        }
      } catch (error) {
        console.error(error);
      }
    },
    deleteVisiteur(visiteurId) {
      if (confirm("t'es sur?")) {
        // console.log(visiteurId);
        axios
          .get(`http://127.0.0.1:8000/api/delete/${visiteurId}`)
          .then((response) => {
            alert(response.data);
            this.getVisiteurs();
          });
      }
    },

    modifier(id) {
      const materiel = {
        numero_materiel: this.elements.numero_materiel,
        design: this.elements.design,
        etat: this.elements.etat,
        quantite: this.elements.quantite,
        id: this.elements.id,
      };
      axios
        .post(`http://localhost:8000/api/update/${id}`, materiel)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getMinim() {
      axios
        .get("http://localhost:8000/api/min")
        .then((res) => {
          this.min = res.data;
          console.log(this.min);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMaxim() {
      axios
        .get("http://localhost:8000/api/max")
        .then((res) => {
          this.max = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getSomme() {
      axios
        .get("http://localhost:8000/api/somme")
        .then((res) => {
          this.somme = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<template>
  <div class="container" text-center>
    <h1>LISTE DE VISITEUR</h1>
    <hr />
    <br />
    <a href="/ajouter" class="btn btn-primary text-center"
      >Ajouter un visiteur</a
    >
    <br />
    <hr />
    <br />
    <div class="container">
      <div class="container text-center">
        <div class="row s12">
          <div class="col">
            <h5>Listes de Visiteurs:</h5>
            <br />
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>N° visiteur</th>
                  <th>Nom</th>
                  <th>Nombre de jour</th>
                  <th>Tarif journer</th>
                  <th>Tarif total</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody v-for="(x, i) in Visiteurs" :key="i">
                <tr>
                  <td>{{ x.id }}</td>
                  <td>{{ x.numero_visiteur }}</td>
                  <td>{{ x.nom }}</td>
                  <td>{{ x.nombre_jour }}</td>
                  <td>{{ x.tarif }}</td>
                  <td>{{ x.tarif_total }}</td>
                  <td>
                    <!-- <a href="" class="btn btn-info">Update</a> -->
                    <router-link
                      :to="{ path: '/update/' + x.id }"
                      class="btn btn-info"
                      >Modifier</router-link
                    >
                    <button
                      @click="deleteVisiteur(x.id)"
                      class="btn btn-danger"
                      style="padding-right: 15px"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>

            <br />
            <br /><br />
          </div>
        </div>
      </div>
    </div>

    <br />
    <br />

    <h4>Tarif TOTAL : {{ somme }}</h4>
    <h4>TARIF MINIMAL : {{ min }}</h4>
    <h4>TARIF MAXIMAL : {{ max }}</h4>
  </div>
</template>

<style scoped>
label {
  display: inline-block;
  min-width: 120px;
  margin-left: 3vw;
}

form {
  margin-left: 25%;
  margin-bottom: 5vw;
  margin-top: 5vw;
}
h1 {
  text-align: center;
}
h5 {
  text-decoration: underline;
}

a {
  margin-left: 45%;
}
</style>
