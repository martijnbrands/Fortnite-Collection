<template>
    
    <div class="single-emote-wrapper">

        <div class="emote-detail" v-bind:class="emote.rarity" v-if="showDetails">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>{{ emote.title }}</h1>
                        <div class="emote-price">{{ emote.vbucks }}</div>
                    </div>
                    <div class="col">
                        <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>
                    </div>
                </div>
                
                
                <div class="close-btn" @click="hide()"><i class="fa fa-times"></i></div>
            </div>
            
        </div>

        <div class="single-emote" v-bind:class="emote.rarity" @click="show()">
            
            <div class="emote-price">
                {{ emote.vbucks }}
            </div>

            <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>

            <div class="emote-title">
                <router-link v-bind:to="'/emotes/' + emote.id">{{ emote.title }}</router-link>
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            'emote-data': {
                required: true
            }
        },

        data(){
            return {
                'emote': this.emoteData,
                'showDetails': false,
            }
        },

        methods: {
            show(){
                this.showDetails = true;
            },

            hide(){
                this.showDetails = false;
            }
        }
    }
</script>