<i18n>
    {
        "en": {
            "Packages begin at": "Packages begin at",
            "posts": "High Quality Post",
            "logodesign_package1_offer1": "2 Logo Concepts",
            "logodesign_package1_offer2": "2 Revisions",
            "logodesign_package1_offer3": "2 Dedicated Designers", 
            "logodesign_package1_offer4": "48hrs Turnaround Time",

            "logodesign_package2_offer1": "4 Logo Concepts", 
            "logodesign_package2_offer2": "4 Revisions",
            "logodesign_package2_offer3": "2 Dedicated Designers",
            "logodesign_package2_offer4": "48hrs Turnaround Time", 

            "logodesign_package3_offer1": "6 Logo Concepts", 
            "logodesign_package3_offer2": "6 Revisions",
            "logodesign_package3_offer3": "2 Dedicated Designers",
            "logodesign_package3_offer4": "48hrs Turnaround Time",


            "branding_package1_header": "YOU HAVE LOGO AND YOU NEED ONLY BRANDING",
            "branding_package1_offer1": "2 Revisions",
            "branding_package1_offer2": "2 Dedicated Designers",
            "branding_package1_offer3": "48hrs Turnaround Time",
            "branding_package1_comment": "Planner to Design your logo, Story & Strategy",

            "branding_package2_offer1": "1 Professional Logo",
            "branding_package2_offer2": "2 Revisions",
            "branding_package2_offer3": "2 Dedicated Designers",
            "branding_package2_offer4": "48hrs Turnaround Time",
            "branding_package2_comment": "Planner to Design your logo, Story & Strategy",

            "branding_package3_offer1": "2 Professional Logo",
            "branding_package3_offer2": "2 Revisions",
            "branding_package3_offer3": "2 Dedicated Designers",
            "branding_package3_offer4": "48hrs Turnaround Time",
            "branding_package3_comment": "Planner to Design your logo Story & Strategy",

            "Facebook": "Facebook",
            "Instagram": "Instagram",
            "Twitter": "Twitter"
            
        },
        "ar": {
            "Packages begin at": "الحزم تبدأ في",
            "posts": "وظائف عالية الجودة",

            "logodesign_package1_offer1": "٢ مفاهيم الشعار",
            "logodesign_package1_offer2": "٢ التنقيحات",
            "logodesign_package1_offer3": "٢ المصممين المتفانين",
            "logodesign_package1_offer4": "٤٨ ساعات تحول الوقت",

            "logodesign_package2_offer1": "٤ مفاهيم الشعار",
            "logodesign_package2_offer2": "٤ التنقيحات",
            "logodesign_package2_offer3": "٢ المصممين المتفانين",
            "logodesign_package2_offer4": "٤٨ ساعات تحول الوقت",

            "logodesign_package3_offer1": "٦ مفاهيم الشعار",
            "logodesign_package3_offer2": "٦ التنقيحات",
            "logodesign_package3_offer3": "٢ المصممين المتفانين",
            "logodesign_package3_offer4": "٤٨ ساعات تحول الوقت",

            "branding_package1_header": "لديك شعار وتحتاج إلى العلامة التجارية فقط",
            "branding_package1_offer1": "٢ التنقيحات",
            "branding_package1_offer2": "٢ المصممين المتفانين",
            "branding_package1_offer3": "٤٨ ساعات تحول الوقت",
            "branding_package1_comment": "مخطط لتصميم شعارك ، قصة والاستراتيجية",

            "branding_package2_offer1": "١ شعار المهنية",
            "branding_package2_offer2": "٢ التنقيحات",
            "branding_package2_offer3": "٢ المصممين المتفانين",
            "branding_package2_offer4": "٤٨ ساعات تحول الوقت",
            "branding_package2_comment": "مخطط لتصميم شعارك ، قصة والاستراتيجية",

            "branding_package3_offer1": "٢ شعار المهنية",
            "branding_package3_offer2": "٢ التنقيحات",
            "branding_package3_offer3": "٢ المصممين المتفانين",
            "branding_package3_offer4": "٤٨ ساعات تحول الوقت",
            "branding_package3_comment": "مخطط لتصميم شعارك ، قصة والاستراتيجية",

            "Facebook": "فيسبوك",
            "Instagram": "انستقرام",
            "Twitter": "تويتتآر"
            
        }
    }
</i18n>

<template>

    <!-- <div class="package">
        <div class="header">

        </div>
        <div class="content">

        </div>
    </div> -->

    <div class="card sm text-black bg-light mb-3 packageCard">
        <!-- <div class="card-header custom-background img-fit">
            <img class="img img-responsive" src="/storage/shortlogo.png" alt="hawiyaBrandLogo" />
        </div> -->
        <div class="card-body body">
            <div class="upperHalf">
                <div class="upperHalfOfUpperHalf">
                    <h2> {{ $root.$t(card.title) }} </h2>
                </div>
                <div class="lowerHalfOfUpperHalf">
                    <div class="triangle"></div>
                </div>
            </div>
            <div class="lowerHalf">
                <div class="row firstRow">
                    <div class="col-sm-7"> 
                        <div class="offers">
                            <div v-if="card.posts">
                                <div class="posts">
                                    {{ number(card.posts, this) }}
                                </div>
                                <div class="postsDescription">
                                    <strong>{{ number(card.posts, this) }} {{ $t('posts') }}</strong>
                                </div>
                            </div>
                            <div v-if="card.header">
                                <div class="header">
                                    {{ $t(card.header) }}
                                </div>
                            </div>
                            <div v-for="offer in card.offers" v-bind:key="offer" class="offer">
                                {{ $t(offer) }}                       
                            </div>
                            <div class="comment" v-if="card.comment">
                                {{ $t(card.comment) }}
                            </div>
                            <br />
                            {{ $t('Packages begin at')}} ${{ number(card.new_price, this) }}
                        </div>                       
                    </div>
                    <div class="col-sm-5 PriceSection">
                        <div class="prices">
                            <h2>${{ number(card.new_price, this) }}</h2>                      
                            <span class="strikeout">${{ number(card.old_price, this) }}</span> 
                        </div>                                              
                    </div>
                </div>
                <br />                
            </div>
            
            <!-- <h5 class="card-title">{{ card.title }}</h5>
            <div id="PriceSection">
                <h3>${{ card.new_price }}</h3>
                <span class="strikeout">
                    ${{ card.old_price }}
                </span>

                
            </div>
            <hr>
            <div id="Offers">                   
                <div v-for="(value,key) in card.offers" v-bind:key="key">
                    {{ value }} {{ key }}
                </div>
                <hr>
                Packages begin at ${{ card.new_price }}
            </div>
            <br />
            <center>
                <slot></slot>
                
            </center> -->
        </div>
        <div class="secondRow">
            <div class="alignBottom">
                <slot></slot>
            </div>                    
        </div>
    </div>
    
</template>

<script>
import { mapActions } from 'vuex';

export default {
    mounted() {
        // console.log(this.card);
    },
    props: [
        "card"
    ],
    methods: {
    }
}
</script>

<style scoped>
    .packageCard {
        font-family: 'LatoRegular', sans-serif;
        /* margin: 10px; */
        /* margin-top: 5px;
        margin-bottom: 5px; */
        font-size: 0.8rem;
        /* min-width: 100px !important; */
        max-width: 18rem;
        min-width: 250px !important;
        width: 18rem;
        border: 1px solid black !important;
        min-height: 100px;
        padding-bottom: 10px;   
        background-color: inherit !important;
    }

        html[dir="rtl"] .packageCard {
            margin-left: 10px;
        }

        html[dir="ltr"] .packageCard {
            margin-right: 10px;
        }

    

    

    @media (max-width: 330px) {
        .packageCard {
            width: 100%;
            min-width: 0px !important;
        }
    }

    .card-body {
        padding: 0 0 !important;
    }

    

    .PriceSection {
        display: flex;
        flex-flow: column wrap;
        justify-content: flex-start;
        /* align-items: center; */
        text-align: center;
        font-family: 'LatoBold', sans-serif;
        /* background-color: black; */
        
        /* font-weight: bold;   */
    }

    .prices {
        display: flex;
        flex-flow: column wrap;
        justify-content: flex-start;
        align-items: center;
        font-family: 'LatoBold', sans-serif;
    }

    .packageTitle {
        font-size: 1.5rem;
        
    }

    .PriceSection > .strikeout > .cancel {
        text-decoration: line-through;
        font-family: 'LatoBold', sans-serif;
        font-weight: 4;
    }

    .blackHR {
        /* background-color: #FFDB00; */
        background-color: black;      
    }

    .custom-background {
        background-color: #FFDB00 !important;
    }



    .strikeout {
        font-size: 1.8rem;
        /* line-height: 1rem; */
        position: relative;
        
    }

    .strikeout::after {
        width: 100%;
        border-bottom: 3px solid #FFDB00;
        content: "";
        left: 0;
        /* margin-top: calc(0.125em / 2 * -1); */
        
        position: absolute;
        right: 0;
        top: 50%;
        -webkit-transform: rotate(160deg);
        -ms-transform: rotate(160deg);
        transform: rotate(160deg);

    }

    

    .upperHalf {
        height: 150px !important;
        background-color: #FFDB00;
        display: flex;
        flex-direction: column;
        /* padding-left: 10px; */
        justify-content: center;
        align-items: center;
    }

    .upperHalfOfUpperHalf {
        width: 100%;
        height: 80%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
    }
        html[dir="ltr"] .upperHalfOfUpperHalf {
            padding-left: 10px;
        }

        html[dir="rtl"] .upperHalfOfUpperHalf {
            padding-right: 10px;
        }


    .lowerHalfOfUpperHalf {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        width: 100%;
        height: 20%;
        /* background-color: red; */
    }

        html[dir="ltr"] .lowerHalfOfUpperHalf {
            padding-left: 40px;
        }

        html[dir="rtl"] .lowerHalfOfUpperHalf {
            padding-right: 40px;
        }


    .triangle {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 15px solid white;
    }
    
    .lowerHalf {       
        /* background-color: black; */
        background-color: white;
    }

        html[dir="ltr"] .lowerHalf {
            padding-left: 5px;
        }

        html[dir="rtl"] .lowerHalf {
            padding-right: 5px;
        }

    .postsDescription {
        font-size: 0.9rem;
        
    }
    

    .firstRow {
        padding-left: 10px;
        padding-top: 10px;
        padding-right: 10px;
        /* padding: 10px !important; */
    }

    .offers {
        font-size: 0.75rem;
        /* padding-left: 5px; */
        /* background-color: black; */
    }

    .offer {
        margin-top: 2px;
        margin-bottom: 2px;
        border-bottom: 1px solid gray;
    }
    

    .header {
        font-size: 0.9rem;
        font-weight: 800;
        
    }

    .comment {
        margin-top: 10px;
        font-size: 0.75rem;
    }

    .secondRow {
        text-align: center;
        display: flex;
        justify-content: center;
        /* flex-direction: column; */      
        
    }


    .posts {
        font-family: 'LatoBold', sans-serif;
        font-weight: 900;
        font-size: 2rem;
        color: darkgoldenrod;
    }

        html[dir="ltr"] .posts {
            padding-left: 4px;
        }

        html[dir="rtl"] .posts {
            padding-right: 4px;
        }

    
    
</style>
