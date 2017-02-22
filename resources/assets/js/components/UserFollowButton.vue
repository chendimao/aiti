<template>
    <button class="btn btn-default"
            v-text="text"
            v-bind:class="{'btn-success':followed}"
            v-on:click="ToggleFollow"
    ></button>
</template>

<script>
    export default{
        props:['user'],
        mounted(){

            this.$http.get('/api/user/'+this.user+'/follower').then(response=>{
                console.log(response.data);
                this.followed=response.data.followed
            });
        },
        data(){
            return {
                followed:false,
            }
        },
        methods:{
            ToggleFollow(){
                this.$http.post('/api/user/'+this.user+'/ToggleFollow',{'user':this.user}).then(response=>{
                    console.log(response.data);
                    this.followed=response.data.followed
                });
            }
        },
        computed:{
            text(){
                return this.followed?'已关注':'关注TA'
            }
        }

    }
</script>

<style>

</style>