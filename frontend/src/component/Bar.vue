<template>
    <nav class="navbar d-flex justify-content-center bottom-0 position-absolute w-100 bg-warning">
    <div @click.prevent="piaciuti(0)" class="p-2 text-center"><p><span class="material-symbols-outlined">
saved_search
</span> <br>Cerca</p></div>
    <div @click.prevent="piaciuti(1)" class="p-2 text-center"><p><span class="material-symbols-outlined">
    favorite
    </span> <br>Piaciuti</p></div>
</nav>
</template>
<script>
export default{
    methods:{
        piaciuti(i){
            this.$emit('bottoni', i);
        }
    }
}
</script>