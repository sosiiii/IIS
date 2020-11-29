<template>
    <div class="d-flex flex-column mt-1" >
        <button class="btn p-0" @click="upVote"><i class="fas fa-arrow-up fa-lg"></i></button>
        <button class="btn p-0" v-text="buttonText"></button>
        <button class="btn p-0" @click="downVote"><i class="fas fas fa-arrow-down fa-lg"></i></button>
    </div>
</template>
<script>
    export default {

        props: ['postId', 'postRating'],

        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                myRating: this.myRating,
                postRatingValue: this.postRating
            }
        },

        methods: {
            upVote() {
                axios.post('/rating/post/'+this.postId, {
                    value: 1
                })
                .then(response => {
                   this.postRatingValue = response.data;
                })

            },
            downVote() {
                axios.post('/rating/post/'+this.postId, {
                    value: -1
                })
                .then(response => {
                    this.postRatingValue = response.data;
                })
            }
        },
        computed: {
            buttonText() {
                return this.postRatingValue;
            }
        }
    }
</script>
