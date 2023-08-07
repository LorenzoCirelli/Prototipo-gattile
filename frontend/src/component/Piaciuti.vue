<template>
   <h2 class="p-4">Preferiti</h2>
<ul class="list-group p-3">
  <li class="list-group-item" v-for="i in piaciuti">
    <h2>{{i.nome}}</h2>
    <p>{{i.eta}} Anni</p>
    <button type="button" class="btn btn-warning">Incontra</button>
  </li>
</ul>

</template>
<script>
export default{
    created(){
        this.server();
    },
    data(){
        return{
            piaciuti:[],
        }
    },
    methods:{
        server(){
            console.log("avvio connessione");
            const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://127.0.0.1/Progetti/gattile_backend/Piaciuti.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = () => {
          if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            this.piaciuti=response;
        } else {
            console.error('Error:', xhr.status, xhr.statusText);
          }
        };
        xhr.onerror = () => {
          console.error('Network Error');
        };
        const data = JSON.stringify({ query: localStorage.getItem('key')});
        xhr.send(data);
        }
    }
}
</script>