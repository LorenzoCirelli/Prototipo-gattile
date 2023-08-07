<template>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <div v-if="app">
    <Gatto v-if="load" :mostra="index" :dati="lista"></Gatto>
    <Controls v-if="load" :dati="lista" @attuale-updated="updateIndex"></Controls>
  </div>
    <Barra @bottoni="bottone" v-if="barra"></Barra>
  
  <div v-if="login">
    <Login @log="key"></Login>
  </div>

  <div v-if="preferiti">
    <Piaciuti></Piaciuti>
  </div>
  
</template>

<script>
import Piaciuti from './component/Piaciuti.vue';
import Gatto from './component/Gatto.vue';
import Controls from './component/Controls.vue';
import Barra from './component/Bar.vue';
import '../node_modules/bootstrap/dist/css/bootstrap.css';
import Login from './component/Login.vue';
export default {
  name: 'Gattile',
  components: {
    Gatto,
    Controls,
    Barra,
    Login,
    Piaciuti
  },
  data(){
    return{
      index:0, //posizione vettore
      lista:[], //lista gatti
      load:false,
      tipo:"r", //tipo richiesta verso server
      dati:[], //dati da inviare per essere salvati su server
      app:false,
      login:true,
      preferiti:false,
      barra:false,
    }
  },
  created(){
    this.auth();
  },
  methods: {

    auth(){
      this.tipo="l";
        this.dati=[localStorage.getItem('key')];
        this.server();
    },

      server() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://127.0.0.1/Progetti/gattile_backend/backend.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = () => {
          if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            if(this.tipo === "r"){
              this.lista = response;
              sessionStorage.setItem("gatti",response.length)
              this.load = true;
              this.barra = true;
              this.app=true;
            }else if(this.tipo === "l"){
              if(response.success){
                localStorage.setItem('key',response.key);
                console.log("logegd");
                this.tipo="r";
                this.server();
                this.login=false;
                this.dati=[response.key];
              }
            }
          } else {
            console.error('Error:', xhr.status, xhr.statusText);
          }
          this.tipo="r";
        };
        xhr.onerror = () => {
          console.error('Network Error');
        };
        const data = JSON.stringify({ query: this.tipo, dati:this.dati});
        xhr.send(data);
      },

      updateIndex(newIndex) {
      this.index = newIndex.index;
      var id = this.lista[this.index-1].id;
        this.tipo="w";
        var user=localStorage.getItem('key');
        this.dati=[id,newIndex.opz,user];
        this.server();
        
    },
    key(key){
        this.tipo="l";
        this.dati=[key.key];
        this.server();
    },

    bottone(i){
      if(i===1){
        this.preferiti=true;
        this.app = false;
      }else{
        this.preferiti=false;
        this.app = true;
        this.barra = true;
      }

    },
    },
}
</script>