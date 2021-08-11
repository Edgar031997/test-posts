<template>
    <div>
        <div class="row">
            <div v-for="(post,index) in allPosts.data" :key="index" class="card m-1" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <h5 class="card-title"><a :href="'/author/'+post.author.author_ip">Author IP {{ post.author.author_ip }}</a></h5>
                    <p class="card-text">{{post.text.length > 150?post.text.slice(0,150)+'...':post.text}}</p>
                    <a :href="'/post/'+post.slug" class="btn btn-primary">Show post</a>
                </div>
            </div>
        </div>
        <pagination :data="allPosts" @pagination-change-page="paginate"></pagination>
    </div>
</template>

<script>
    export default {
        props:['posts'],
        data(){
            return{
                allPosts:this.posts
            }
        },
        methods:{
            paginate(page){
                axios.get('/?page='+page).then((response) => {
                    this.allPosts = response.data
                },(xhr)=>{
                    console.log(xhr)
                });
            },
        },
    }
</script>
