<template>
    <div class="d-flex justify-content-center p-2" v-if="attuale < dati.length">
      <div class="p-2">
        <button type="button" class="btn btn-success" @click.prevent="Avanti(1)">Mi piace</button>
      </div>
      <div class="p-2">
        <button type="button" class="btn btn-warning" @click.prevent="Avanti(0)">Prossimo</button>
      {{ mostra }}
    </div>
    </div>

    <div v-else>
      <br>
      <img src="https://http.cat/204" class="img-thumbnail" alt="No content">
      <h3 class="p-2">Attualmente non ci sono gatti, che tu non abbia già visto, da adottare!</h3>
    </div>
  </template>
  
  <script>
  export default {
    props:['dati'],
    data(){
        return{
            attuale:0,
        }
    },
    methods: {
      Avanti(a){
        this.attuale++;
          this.$emit('attuale-updated', {
            "index":this.attuale, 
            "opz":a,
          });
      }
    }
  };
  </script>
  
  
  