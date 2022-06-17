<template>
    <div>
        <!-- loader -->
        <Loader v-if="isLoading" />
        <div v-if="posts.length">
            <div class="card text-center" v-for="post in posts" :key="post.id">
                <div class="card-header">
                    {{post.title}} 
                </div>
                <div class="card-body">
                    <p>Category:  
                        <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill" :style="`background-color: ${tag.color}`">{{tag.label}}</span>
                    </p>
                    <p class="card-text">{{post.content}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <p v-else>Non ci sono post da mostrare</p>
    </div>
</template>

<script>
    import axios from 'axios';
    import Loader from '../Loader.vue';
    export default {
        name: "PostsList",
        components: {
            Loader
        },
        data() {
            return {
                posts: [],
                isLoading: true
            }
        },
        methods: {
            getPosts() {
                axios.get("http://127.0.0.1:8000/api/posts")
                    .then((res) => {
                        this.posts = res.data.posts;
                    }).then(() => {
                        console.log('Caricamento dei post completato!')
                        this.isLoading = false;
                    })
            }
        },
        mounted() {
            this.getPosts();
        }
    }

</script>

<style scoped>

</style>
