<template>
    <button class="btn btn-default"
            v-text="text"
            v-bind:class="{'btn-success':followed}"
            v-on:click="ToggleFollow"
    ></button>
</template>

<script>
    export default{
        props:['question','user'],
        mounted(){
        this.$http.post('/api/question/follower',{'question':this.question,'user':this.user}).then(response=>{
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

                this.$http.post('/api/question/ToggleFollow',{'question':this.question,'user':this.user}).then(response=>{

                    console.log(response.data);
                    this.followed=response.data.followed
                });
            }
        },
        computed:{
            text(){
                return this.followed?'已关注':'关注问题'
            }
        }

    }
</script>

<style>

</style>