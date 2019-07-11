<template>
    <div class="Cover">
        <p>{{ this.package }} / Package</p>
        <div class="row">
            <div class="col-md-3">
                <BlackBox>
                    <h3>{{ this.package }}</h3>
                </BlackBox>
            </div>
            <div class="col-md-9 borderBottomYellow"></div>
        </div>

        <form @submit="formSubmit">
            <div class="postsSection">
                <div v-if="posts.length < 2">
                    <Post 
                        :post="post"
                        :logo="true"
                        v-on:comment="updateComment($event, 1)"
                        v-on:file="updateFile($event, 1)"
                    />
                </div>
                <div v-else>
                    <div v-for="post in posts" :key="post.id">
                        <div class="row">
                            <div class="col-md-4 postLabel" @click="togglePost(post)">
                                Post No: {{ post.id }} >>
                            </div>

                            

                            
                            <div class="col-md-8" v-show="post.show">
                                <div v-if="post.id === 1">
                                    <Post 
                                        :post="post" 
                                        :logo="true"
                                        v-on:comment="updateComment($event, 1)"
                                        v-on:file="updateFile($event,1)"
                                    />
                                </div>
                                <div v-else>
                                    <Post 
                                        :post="post"
                                        v-on:comment="updateComment($event, post.id)"
                                        v-on:file="updateFile($event, post.id)"
                                    />
                                </div>
                            </div>
                            
                        </div>
                        <hr class="darkGrayRuler">   
                                
                    </div>
                </div>
                <v-btn type="submit" :disabled="isButtonDisabled()">Click</v-btn>
            </div>
        </form>
        
    </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
import Post from '../../../../UI/Post';
import BlackBox from '../../../../UI/BlackBox';


export default {
    mounted() {
        console.log(this.$store.state);
        console.log(this.posts);
        let postsNumber = this.$store.state.socialmedia.postsNumber;
        for(var i=0; i < postsNumber; i++) {
            let post = {
                ...this.post,
                id: i+1
            };
            this.posts.push(post);
        }
    },  
    components: {
        ImageUpload,
        BlackBox,
        Post
    },
    data() {
        return {
            logo_photo: '',
            post: {
                id: 0,
                image: '',
                comment: '',
                show: true
            },
            posts: [],
            showSomething: false
        }
    },
    computed: {
        package() {
            return this.$store.state.socialmedia.package;
        }
    },
    methods: {
        updateComment(comment, id) {
            
            console.log('Comment Update function', comment,id);
            this.posts.forEach(post => {
                // console.log(post);
                if(post.id === id) {
                    post.comment = comment;
                }
            });
        },
        updateFile(payload, id) {
            console.log('File Update function payload', payload);
            if(payload.type === 'logo') {
                this.logo_photo = payload.file === null ? '' : payload.file;
            } else if(payload.type === 'post') {
                this.posts.forEach(post => {
                    if(post.id === id) {
                        post.image = payload.file === null ? '' : payload.file;
                    }
                    return post;
                });
            }
            
            console.log('After updating file', 'Posts', this.posts, 'Logo Photo', this.logo_photo);
        },
        togglePost(postToToggle) {           
            this.posts.forEach(post => {
                if(post.id === postToToggle.id) {
                    post.show = !post.show;
                }
                return post;
            })
            console.log('All Posts', this.posts);
        },
        showPost(id) {
            console.log("Inside showPost", id);
            let post = this.posts.find(post => {
                return post.id === id;
            });
            return post.show;
            // return post['show'];
        },  
        buttonClicked() {
            event.preventDefault();
            console.log('ALL INFO', this.posts, this.logo_photo);
        },
        isButtonDisabled() {
            let value = false;
            this.posts.forEach(post => {
                if(!post.show || post.image === '' || post.comment === '') {
                    value = true;
                }
            });
            return value;
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
    .postLabel {
        font-size: 1.1rem;
        cursor: pointer;
    }

    .darkGrayRuler {
        background-color: gray;
    }

    .postsSection {
        padding: 10px;
    }
</style>
