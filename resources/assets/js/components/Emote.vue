<template>
    <div class="single-emote" v-bind:class="emote.rarity">
        
        <div class="emote-price">
            {{ emote.vbucks }}
        </div>

        <img v-bind:src="'/images/emotes/' + emote.thumbnail"/>

        <div class="emote-title">
            <router-link v-bind:to="'/emotes/' + emote.id">{{ emote.title }}</router-link>
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
                'emote': this.emoteData
            }
        }
    }
</script>