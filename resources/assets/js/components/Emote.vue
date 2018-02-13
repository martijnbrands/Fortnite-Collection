<template>  

    <section>

        <div class="form-group">
            <input type="text" v-model="search" class="form-control" placeholder="Search Emotes">
        </div>


        <div class="emote-grid">

            <div class="single-emote" v-for="emote in filteredEmotes" v-bind:class="emote.rarity">
                
                <div class="emote-price">
                    {{ emote.vbucks }}
                </div>

                <img v-bind:src="'images/emotes/' + emote.thumbnail"/>

                <div class="emote-title">
                    {{ emote.title }}
                </div>
                
            </div>
        </div>

    </section> 

</template>

<script>
    export default {
        data (){
            return {
                emotes: [],
                search: ''
            }
        },
        created (){
            this.fetchEmote();
        },
        methods:{
            fetchEmote(){
                this.$http.get("emotes/fetch").then(response => {this.emotes = response.data.emotes})
            }
        },
        computed:{
            filteredEmotes: function() {
                return this.emotes.filter((emote) => {
                    return emote.title.toLowerCase().match(this.search.toLowerCase());
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
