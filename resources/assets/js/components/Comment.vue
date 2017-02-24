<template>
    <span>

        <button class="btn btn-danger"
                v-text="text"
                v-on:click="ShowCommentsMessage"
        ></button>

        <div class="modal fade" id="dialog" tabindex="-1" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">
                            评论列表
                        </h4>
                    </div>

                    <div class="modal-body">

                        <!--<textarea class="form-control" name="body" id="" cols="10" rows="5" v-model="body" v-if="!status"></textarea>-->
                        <!--<div class="alert alert-success" v-if="status">-->
                            <!--私信发送成功-->
                        <!--</div>-->
                        <!--&lt;!&ndash;<div class="alert alert-success" v-if="!status">&ndash;&gt;-->
                        <!--&lt;!&ndash;私信发送失败&ndash;&gt;-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->

                        <div v-if="comments.length > 0">

                            <div class="meida" v-for="comment in comments">
                                <div class="media-left">

                                    <a href=""><img :src="comment.user.avatar" alt="" class="media-object"></a>

                                </div>

                                <div class="media-body">

                                    <h4 class="media-heading">{{comment.user.name}}</h4>
                                    {{comment.body}}

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="modal-footer">


                        <input type="text" class="form-control" v-model="body">

                        <!--<button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>-->
                        <button class="btn btn-primary" type="button" @click="store">评论</button>

                    </div>

                </div>

            </div>

        </div>
    </span>

</template>

<script>
    export default{
        props:['type','id','count'],

        data(){
            return {
                body:'',
                status:false,
                comments:[]
            }
        },

        computed:{
            dialog() {
                return 'comments-dialog-'+this.type+'-'+this.id
            },

            dialogId(){
                return '#'+this.dialog
            },

            text(){
                return this.count+'评论'
            }
        },

        methods:{
            store(){
                this.$http.post('/api/comment',{'type':this.type,'id':this.id,'body':this.body}).then(
                    response=>{
                    console.log(response.data);

                    }

                );

            },
            ShowCommentsMessage(){
                this.dialogId.modal('show');
               // this.getComments();
            },

            getComments(){
              this.$http.get('/api/'+this.type+'/'+this.id+'/comments').then(
                  response=>{
                      this.comments=response.data.comments
                  }
              );
            },
        },


    }
</script>

<style>

</style>