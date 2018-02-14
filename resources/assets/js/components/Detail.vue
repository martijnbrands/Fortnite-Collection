<template>  

    <section>

        <div class="emote-detail" v-bind:class="emote.rarity">
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
                
                
                <div class="close-btn"><i class="fa fa-times"></i></div>
            </div>
            
        </div>

    </section> 

</template>

<script>
    export default {
        data (){
            return {
                emote: [],
                id: this.$route.params.id
            }
        },

        created (){
            this.fetchEmote();
        },

        methods:{
            
            fetchEmote(){
                this.$http.get("/emotes/" + this.id)
                    .then(response => {this.emote = response.data.emote});
            }

        }
    }
</script>
