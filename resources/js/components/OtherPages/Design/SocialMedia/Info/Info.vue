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
                                Post No: {{ post.id }} <img :src="post.show ? '/storage/down-arrow.png' : '/storage/right-arrow.png'" class="arrow" />

                            </div>

                            

                            <transition name="slide-fade">
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
                            </transition>
                        </div>
                        <hr class="darkGrayRuler">   
                                
                    </div>
                </div>
                <SubmitButton buttonType="submit" :buttonDisabled="isButtonDisabled()" />
                <!-- <v-btn type="submit" :disabled="isButtonDisabled()">Click</v-btn> -->
            </div>
        </form>
        
    </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
import Post from '../../../../UI/Post';
import BlackBox from '../../../../UI/BlackBox';
import SubmitButton from '../../../../UI/SubmitButton';

export default {
    mounted() {
        if(!this.$store.state.socialmedia.postsNumber) {
            this.$router.push({
                name: 'socialmediapackage'
            });
        }
        else {
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
        }
        
    },  
    components: {
        ImageUpload,
        BlackBox,
        Post,
        SubmitButton
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
            let payload = {
                posts: this.posts,
                logo_photo: this.logo_photo
            };
            this.$store.dispatch('socialmedia/setInfo', payload);
            console.log('Final State',this.$store.state);
            console.log('Is Social Media Order Valid? ',this.$store.getters['socialmedia/isValid']);

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

    .slide-fade-enter-active {
        transition: all .3s ease;
    }

    .slide-fade-leave-active {
        transition: all .3s cubic-bezier(1.0,0.5,0.8,1.0);
    }

    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateY(-30px);
        opacity:0;
    }

   .arrow {
       width: 15px;
       height: 15px;
    }

    /* .slide-fade-leave-to {
        transform: translateY(-30px);
        opacity: 1;
    } */
</style>
