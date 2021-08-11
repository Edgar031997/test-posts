<template>
    <div class="form-outline mb-4">
        <input v-model="post.title" type="text" class="form-control" placeholder="Title ..."/>
        <br>
        <textarea  v-model="post.text" class="form-control" placeholder="Text ..."></textarea>
        <br/><br/>
        <p v-if="errors.length" v-for="err in errors" class="w-auto alert alert-danger">{{err}}</p>

        <button class="btn btn-primary" @click="postCreate">Create post</button>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                errors:[],
                post:{
                    title:null,
                    text:null
                }
            }
        },
        methods:{
            postCreate(){
                axios.post('/post/create',this.post).then(()=>{
                    location.href = '/'
                },(xhr)=>{
                    for(let err in xhr.response.data.errors){
                        this.errors.push(xhr.response.data.errors[err][0])
                    }
                })
            }
        }
    }
</script>
