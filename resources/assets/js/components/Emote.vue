<template>
    <div class="container emote-grid">
        <div class="single-emote" v-for="emote in emotes">
            
            <div class="emote-price">
                {{ emote.vbucks }}
            </div>

            <!-- <img src="{{ emote.thumb }}" alt="{{ emote->title }}"/> -->

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
