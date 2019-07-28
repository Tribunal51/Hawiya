<template>
    <div id="cover">
        <!-- <div class="container">
            <div class="row" style="height: 100%">
                <div class="col-md-6" id="intro">
                    <h3>Meet the Team! </h3>
                    <h5>Collaborating with service-based small businesses owners, helping them translate their offline business into an online digital experience.</h5>
                    <p>Together, we are a complete team. You with your industry experience and understanding of your clients, and us with our blend of design, development, and digital marketing expertise. </p> 
                    <p> LEARN MORE ABOUT WORKING WITH US </p>
                </div>
                <div class="col-md-6" id="team">
                    <div class="row">
                        <div class="card-deck">
                            <TeamMember
                                v-for="teamMember in this.teamMembers"
                                :key="teamMember.name"
                                :name="teamMember.name"
                                :title="teamMember.title"
                                :image="teamMember.image"
                            />
                        </div>    
                    </div>
                </div>
            </div>
            
               
        </div> -->
        <IntroSection>
            <BlackBox>     
                <div class="row">    
                    <div class="col">                  
                        <h2>Meet the Team</h2> 
                    </div>
                </div>               
            </BlackBox>
                     
            <div class="row mt-2">
                <div class="col" id="IntroSection1">
                    We have years of experience working with entrepreneurs just like you. We've learned it's best to start by listening to your story. Then we review your existing brand and offer you options from there. Blow we've listed our most requested packages, but each of these can be tweaked or we can give you a completely custom quote.       
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-md">
                    <div id="IntroSection2">
                        <BlackBox>               
                            Together, we are a complete team. You with your industry experience and understanding of your clients, and us with our blend of design, development, and digital marketing expertise.
                        </BlackBox>
                    </div>
                </div>
                <div class="col-md">
                    <div id="IntroSection3">
                        <BlackBox>
                            Collaborating with service-based small businesses owners, helping them translate their offline business into an online digital experience.
                        </BlackBox>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm image-margin" v-for="teamMember in teamMembers" :key="teamMember.name">
                    <TeamMember 
                    :name="teamMember.name"
                    :title="teamMember.title"
                    :image="teamMember.image"
                    />
                </div>
            </div>
        </IntroSection> 
    </div>
</template>

<script>
import TeamMember from './TeamMember.vue';
import BlackBox from '../../UI/BlackBox.vue';
import IntroSection from '../../UI/IntroSection.vue';


export default {
    data() {
        return {
            teamMembers: [
                {
                    name: "Member 1",
                    title: "Senior Graphic Designer",
                    image: "/storage/member1.png"
                },
                {
                    name: "Member 2",
                    title: "Creative Marketing and Design",
                    image: "/storage/member1.png"
                },
                {
                    name: "Member 3",
                    title: "Creative Marketing and Graphic Designer",
                    image: "/storage/member1.png"
                }
            ]
        }
    },
    components: {
        TeamMember,
        BlackBox,
        IntroSection,
        
    }
}
</script>

<style scoped>
    .image-margin{
        margin-left: -10px !important;
        margin-right: -10px !important;
    }

    #cover {
        background-color: white !important;
        font-family: 'LatoRegular', sans-serif;
        font-size: 0.85rem;
        height: 100%;
    }
     #IntroSection1 {
        margin-bottom: 30px;
    }

    #IntroSection3 {
        margin-left: 40px;
        
    }

    .text {
        font-size: 1rem;
    }

    
</style>
