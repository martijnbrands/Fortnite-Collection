<template>
    
    <div class="single-emote-wrapper">

        <div class="emote-detail" v-bind:class="[{'is-active': activated}, emote.rarity]">
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
                
                <router-link v-bind:to="'/emotes/'"><div class="close-btn" @click="hide()"><i class="fa fa-times"></i></div></router-link>
            </div>
            
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
    .emote-detail { transition: .3s; }
    .emote-detail.is-active {
        right: 0;
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