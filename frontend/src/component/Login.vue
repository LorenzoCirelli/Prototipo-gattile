<template>
    <div class="card">
  <div class="card-header">
    Login
  </div>
  <div class="card-body">
        <form>
  <div class="form-group">
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Token</label>
    <input type="password" v-model="key" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary" @click.prevent="login({key})">Accedi</button>
</form>


  </div>
</div>
</template>
<script>
export default{
    methods:{
       login(key){
        this.$emit('log',key);
       }     
    }
}
</script>