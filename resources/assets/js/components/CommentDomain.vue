<template>
  <div>




  </div>
</template>

<script>
    export default{
        props:['user'],
        mounted(){
            this.$http.get('/api/answer/'+this.user+'/commend').then(response=>{

                this.IsCommend=response.data.commend
                this.CountCommend=response.data.CountCommend
            });
        },
        data(){
            return {
                CountCommend:0,
                IsCommend:false,
            }
        },
        methods:{
            ToggleAnswer(){

                this.$http.post('/api/answer/'+this.user+'/ToggleCommend').then(response=>{

                    this.IsCommend=response.data.Commend;
                    this.CountCommend=response.data.CountCommend;

                });
            }
        },

        computed(){
            CountCommend:{
                return   this.IsCommend?(this.IsCommend=true):(this.IsCommend=false)
            }
        }


    }
</script>

<style>

</style>