<template>
    
    <div class="single-emote-wrapper">

        <div class="emote-detail" v-bind:class="[{'is-active': activated}]">
            
            <div class="container" v-bind:class="emote.rarity">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>{{ emote.title }}</h1>
                        <div class="emote-price">{{ emote.vbucks }}</div>
                    </div>
                    <div class="col">
                        <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>
                    </div>
                </div>
                
                <router-link v-bind:to="'/emotes/'"><div class="close-btn" @click="hide()"><i class="fa fa-times"></i></div></router-link>
            </div>

            <div class="overlay" @click="hide()"><router-link v-bind:to="'/emotes/'"></router-link></div>
            
        </div>

        <router-link v-bind:to="'/emotes/' + emote.id">
            <div class="single-emote" v-bind:class="emote.rarity" @click="show()">
                
                <div class="emote-price">
                    {{ emote.vbucks }}
                </div>

                <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>

                <div class="emote-title">
                    {{ emote.title }}
                </div>
            </div>
        </router-link>
    </div>
</template>

<style>
    .emote-detail { transition: .3s;z-index: 100; }
    .overlay{
        width: 100%;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        opacity: 0;
        visibility: hidden;
        background: rgba(0,0,0,0.3);
        transition: .3s;
        z-index: -1;
    }
    .emote-detail.is-active {
        right: 0;
        transition: .3s;
    }
    .emote-detail.is-active .overlay{
        visibility: visible;
        opacity: 1;
        transition: .3s;
    }
</style>

<script>
    export default {
        props: {
            'emote-data': {
                required: true
            },
            active: {
                type: Boolean
            }
        },

        data(){
            return {
                'emote': this.emoteData,
                'activated': this.active
            }
        },

        methods: {
            show(){
                this.activated = true;
            },

            hide(){
                this.activated = false;
            }
        }
    }
</script>