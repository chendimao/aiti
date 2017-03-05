<template>
    <span>

        <a class=""
                v-text="BtnValue"
                v-on:click="ShowSendMessage"
        ></a>


    </span>

</template>

<script>
    export default{
        props:['user'],

        data(){
            return {
                body:'',
                BtnValue:'发送私信',
                status:false,
                HideMsgBox:true
            }
        },
        methods:{
            store(){
                this.$http.post('/api/message/store',{'user':this.user,'body':this.body}).then(
                        response=>{

                            this.status=response.data.status;
                           setTimeout(function(){
                               $("#modal-send-message").modal('hide');
                           },500);
                           this.body='';
                            this.status=false;
                           console.log(this.status);

                        }

                );

            },
            ShowSendMessage(){
                $("#modal-send-message").modal('show');
            }
        },


    }
</script>

<style>

</style>