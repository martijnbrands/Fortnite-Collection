<template>  

    <section>

        <div class="form-group">
            <input type="text" v-model="search" class="form-control" placeholder="Search Emotes">
        </div>

        <div class="emote-grid">
            <emote v-for="emote in filteredEmotes" v-bind:key="emote.id" :emote-data="emote"></emote>
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
            this.fetchEmotes();
        },

        methods:{
            
            fetchEmotes(){
                this.$http.get("/emotes/fetch")
                    .then(response => {this.emotes = response.data.emotes})
            }

        },

        computed:{
            filteredEmotes: function() {
                return this.emotes.filter((emote) => {
                    return emote.title.toLowerCase().match(this.search.toLowerCase());
                });
            }
        }
    }
</script>
