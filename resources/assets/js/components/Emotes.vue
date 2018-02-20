<template>  

    <section>

        <div class="form-group">
            <input type="text" v-model="search" class="form-control" placeholder="Search Emotes">
        </div>


        <div class="form-group">
            <select class="form-control" v-model="sort">
                <option  v-for="item in options" :label="item.label" :value="item.value"></option>
            </select>
        </div>

         <div class="emote-grid">
            <emote v-for="emote in rarityFilter" v-bind:key="emote.id" :emote-data="emote" :active="checkActive(emote.id)" ></emote>
        </div>
        <div class="emote-grid">
            <emote v-for="emote in searchFilter" v-bind:key="emote.id" :emote-data="emote" :active="checkActive(emote.id)" ></emote>
        </div>

    </section> 

</template>

<script>
    export default {
        props: {
            activated: {
                type: Number
            }
        },

        data (){
            return {
                emotes: [],
                search: '',
                sort: '',
                options: [
                    { label: 'All', value: '' },
                    { label: 'Common', value: 'common' },
                    { label: 'Uncommon', value: 'uncommon' },
                    { label: 'Rare', value: 'rare' },
                    { label: 'Epic', value: 'epic' },
                    { label: 'Legendary', value: 'legendary' },
                ],
                id: this.$route.params.id
            }
        },

        created (){
            this.fetchEmotes();
        },

        methods:{
            
            fetchEmotes(){
                axios.get("/emotes/fetch")
                    .then((response) => {
                        this.emotes = response.data.emotes;
                    })
                    .catch((error) => {
                        console.log("Something went wrong fetching the emotes.")
                    });
            },

            checkActive(emoteId){
                if(this.id == emoteId) return true;
            }

        },

        computed:{
            searchFilter: function() {
                return this.emotes.filter((emote) => {
                    return emote.title.toLowerCase().match(this.search.toLowerCase());
                });
            },
            rarityFilter: function() {
                return this.emotes.filter((emote) => {
                    return emote.rarity.match(this.sort);
                });
            }
        }
    }
</script>
