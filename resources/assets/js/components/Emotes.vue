<template>  

    <section>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Search by name</label>
                <input type="text" v-model="nameFilter" @keyup="fetchEmotes()" class="form-control" placeholder="Search Emotes">
            </div>


            <div class="form-group col-md-6">
                <label>Filter by rarity</label>
                <select class="form-control" @change="fetchEmotes()" v-model="rarityFilter">
                    <option  v-for="rarity in rarities" :label="rarity.label" :value="rarity.value"></option>
                </select>
            </div>
        </div>

        <div class="emote-grid">
            <emote v-for="emote in emotes" v-bind:key="emote.id" :emote-data="emote" :active="checkActive(emote.id)" ></emote>
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
                rarityFilter: '',
                nameFilter: '',
                sort: '',
                rarities: [
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
                axios.get("/emotes/fetch?rarity=" + this.rarityFilter + "&title=" + this.nameFilter, {
                    })
                    .then((response) => {
                        this.emotes = response.data.emotes;
                    })
                    .catch((error) => {
                        console.log("Something went wrong fetching the emotes.")
                    });
            },

            checkActive(emoteId){
                if(this.id == emoteId) return true;
            },
        }
    }
</script>
