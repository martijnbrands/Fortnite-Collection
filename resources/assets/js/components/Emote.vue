<template>
    <div class="single-emote" v-bind:class="emote.rarity" @click="show()">

        <div class="emote-detail" v-if="showDetails" @close="showDetails = false">
            <button class="close" @click="$emit('close')">X</button>
            <div class="content">popup</div>
        </div>
        
        <div class="emote-price">
            {{ emote.vbucks }}
        </div>

        <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>

        <div class="emote-title">
            {{ emote.title }}
        </div>
        
    </div>
</template>

<style>
    .emote-detail {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: #f5f5f5;
        z-index: 100;
    }

    .emote-detail .close {
        position: absolute;
        top: 50px;
        right: 50px;
        display: block;
        padding: 0.5rem 1rem;
        background-color: #333333;
        color: #ffffff;
        font-size: 14px;
    }

    .emote-detail span.content {
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

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
                'showDetails': false
            }
        },

        methods: {
            show(){
                this.showDetails = true;
            },

            close(){
                this.showDetails = false;
                console.log("Hide popup");
            }
        }
    }
</script>
