<template>
    <div class="container emote-grid">
        <div class="single-emote" v-for="emote in emotes" v-bind:class="emote.rarity">
            
            <div class="emote-price">
                {{ emote.vbucks }}
            </div>

            <img v-bind:src="'images/emotes/' + emote.thumbnail"/>

            <div class="emote-title">
                {{ emote.title }}
            </div>
        </div>
</div>
</template>

<script>
    export default {
        data (){
            return {
                emotes: [],
            }
        },
        created (){
            this.fetchEmote();
        },
        methods:{
            fetchEmote(){
                this.$http.get("emotes").then(response => {this.emotes = response.data.emotes})
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
