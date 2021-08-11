<template>
    <div class="row d-flex justify-content-center ScrollStyle">
        <div class="col-md-12 col-lg-12">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <div class="form-outline mb-4">
                        <input v-model="comment.name" type="text" class="form-control" placeholder="Name ..."/>
                        <br>
                        <textarea  v-model="comment.text" class="form-control" placeholder="Comment ..."></textarea>
                        <br/><br/>
                        <p v-if="errors.length" v-for="err in errors" class="w-auto alert alert-danger">{{err}}</p>

                        <button class="btn btn-primary" @click="addComment"> Add a comment</button>
                    </div>

                    <div v-for="(comment,index) in allComments" :key="index" class="card mb-4">
                        <div class="card-body">
                            <p>{{comment.text}}</p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img
                                        src="https://mdbootstrap.com/img/Photos/Avatars/img%20(4).jpg"
                                        alt="avatar"
                                        width="25"
                                        height="25"
                                        class="mr-2"
                                    />
                                    <p class="mb-0 ms-2"><b>{{comment.name}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['comments','post_id'],
        data(){
            return{
                errors:[],
                allComments:this.comments,
                comment:{
                    post_id:this.post_id,
                    name:null,
                    text:null
                }
            }
        },
        methods:{
            addComment(){
                this.errors = []

                axios.post('/post/comment',this.comment).then((response)=>{
                    this.comment.name = null
                    this.comment.text = null

                    this.allComments.unshift(response.data)
                },(xhr)=>{
                    for(let err in xhr.response.data.errors){
                        this.errors.push(xhr.response.data.errors[err][0])
                    }
                })
            }
        }
    }
</script>
<style>
    .ScrollStyle {
        max-height: 600px;
        overflow-y: scroll;
    }
</style>
