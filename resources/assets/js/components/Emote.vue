<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Emote Component</div>

                    <div class="card-body">
                        <div class="emote" v-for="emote in emotes">
                            <h1>{{ emote.title }}</h1>
                        </div>
                    </div>
                </div>
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
                this.$http.get("emotes").then(response => {this.customer = response.data.emotes})
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
