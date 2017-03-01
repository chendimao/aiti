<template>
        <button v-on:click="ToggleFollow"   class="follow btn btn-normal btn-success pull-left "  v-bind:class="{'btn-success':followed}"><span v-text="text">关注</span> <em>|</em> <b v-text="follower_count"></b></button>
</template>

<script>
    export default{
        props:['question','follower_count'],
        mounted(){
        this.$http.post('/api/question/'+this.question+'/follower').then(response=>{

            this.followed=response.data.followed
        });

        },





        data(){
            return {
                followed:false,
                follower_count:0,
            }
        },
        methods:{
            ToggleFollow(){
                this.$http.post('/api/question/'+this.question+'/ToggleFollow').then(response=>{

                    if(response.data.followed){
                        ++this.follower_count;
                    }else{
                        --this.follower_count;

                    }

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