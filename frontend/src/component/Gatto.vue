<template>
    <div class="w-100" v-if="mostra < dati.length">
        <img :src="dati[mostra].foto" class="img-thumbnail" alt="gatto">
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column text-center">
            <h5>{{ dati[mostra].nome }}</h5>
            <p>{{ dati[mostra].eta }} Anni</p>
        </div>
    </div>
    </div>
</template>
<script>
export default{
    props:['dati','mostra'],
    data(){
        return {
            
        }
    }
}
</script>
<style>
img{
    height: 100%;
}
</style>