<template>
    <div class="Cover">
        <form @submit="formSubmit">
            <h3>Logo Photo</h3>
            <ImageUpload v-on:dataurls="updateLogoPhoto" />
            <hr>
            <h3>Posts Information</h3>
            <Post 
                v-for="post in posts" 
                :key="post.id" v-on:comment="updateComment($event, post.id)" 
                v-on:file="updateFile($event, post.id)" 
            />
            <v-btn type="submit" color="success">Submit</v-btn>
        </form>
    </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
import Post from './Post/Post';

export default {
    mounted() {
        console.log(this.$store.state);
        console.log(this.posts);
    },  
    components: {
        ImageUpload,
        Post
    },
    data() {
        return {
            logo_photo: '',
            post: {
                id: 0,
                image: '',
                comment: ''
            }
        }
    },
    computed: {
        posts() {
            let posts = [];
            let postsNumber = this.$store.state.socialmedia.postsNumber;
            for(var i=0; i < postsNumber; i++) {
                let post = {
                    ...this.post,
                    id: i+1
                };
                posts.push(post);
            }

            return posts;

        }
    },
    methods: {
        updateLogoPhoto(url) {
            this.logo_photo = url[0];
            console.log('Logo Photo  -> ',this.logo_photo);
        },
        updateComment(comment, id) {
            
            console.log('Comment Update function', comment,id);
            this.posts.forEach(post => {
                // console.log(post);
                if(post.id === id) {
                    post.comment = comment;
                }
            });
        },
        updateFile(file, id) {
            console.log('File Update function');
            this.posts.forEach(post => {
                if(post.id === id) {
                    post.image = file; 
                }
            });
            console.log('After updating posts with file', this.posts);
        },
        formSubmit() {
            event.preventDefault();
            console.log(this.posts);

            let postsToSend = [...this.posts];
            // Array.from(postsToSend).forEach(post => {
            //     delete post['id'];
            // });
            console.log('Posts to send',postsToSend);
            console.log('Posts', this.posts);
            this.$store.dispatch('socialmedia/setLogo', this.logo_photo);
            this.$store.dispatch('socialmedia/setPosts', postsToSend);
            let data = {
                user_id: 1,
                package: this.$store.state.socialmedia.package,
                logo_photo: this.$store.state.socialmedia.logo_photo,
                posts: [
                    ...this.$store.state.socialmedia.posts
                ]
            };
            console.log('Data', data);
            console.log('FinalState',this.$store.state);
            // axios.post('http://hawiya.net/api/orders/social-media', data)
            // .then(res => console.log(res.data))
            // .catch(error => console.log(error.response));
        }
    }

}
</script>

<style scoped>

</style>
