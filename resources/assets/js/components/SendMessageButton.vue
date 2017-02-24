<template>
    <span>

        <button class="btn btn-default"
                v-text="BtnValue"
                v-on:click="ShowSendMessage"
        ></button>

        <div class="modal fade" id="modal-send-message" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">
                            发送私信
                        </h4>
                    </div>

                    <div class="modal-body">

                        <textarea class="form-control" name="body" id="" cols="10" rows="5" v-model="body" v-if="!status"></textarea>
                        <div class="alert alert-success" v-if="status">
                            私信发送成功
                        </div>
                        <!--<div class="alert alert-success" v-if="!status">-->
                            <!--私信发送失败-->
                        <!--</div>-->
                    </div>


                    <div class="modal-footer">

                        <button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>
                        <button class="btn btn-primary" type="button" @click="store">发送私信</button>

                    </div>

                </div>

            </div>

        </div>
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