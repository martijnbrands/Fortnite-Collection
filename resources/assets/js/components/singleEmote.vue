<!-- <template>  

    <section>

       <h1>Hello Single emote</h1>

    </section> 

</template>

<script>
    export default {
        data (){
            return {
                id: this.$route.params.id,
                emotes: []
            }
        },

        created (){
            this.fetchEmotes();
        },

        methods:{

            fetchEmotes(){
                this.$http.get("/emotes/" + this.id).then(function(data){
                    console.log(data);
                });
            }

        },

        // computed:{
        //     filteredEmotes: function() {
        //         return this.emotes.filter((emote) => {
        //             return emote.title.toLowerCase().match(this.search.toLowerCase());
        //         });
        //     }
        // }
    }
</script>
 -->