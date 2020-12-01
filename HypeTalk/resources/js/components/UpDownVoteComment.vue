<template>
    <div class="d-flex flex-rown" >
        <button class="btn p-0" @click="upVote"><i class="fas fa-arrow-up fa-sm"></i></button>
        <button class="btn p-0" v-text="buttonText"></button>
        <button class="btn p-0" @click="downVote"><i class="fas fas fa-arrow-down fa-sm"></i></button>
    </div>
</template>
<script>
    export default {

        props: ['commentId', 'commentRating'],

        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                myRating: this.myRating,
                commentRatngValue: this.commentRating
            }
        },

        methods: {
            upVote() {
                axios.post('/rating/comment/'+this.commentId, {
                    value: 1
                })
                .then(response => {
                    this.commentRatngValue = response.data;
                })

            },
            downVote() {
                axios.post('/rating/comment/'+this.commentId, {
                    value: -1
                })
                .then(response => {
                    this.commentRatngValue = response.data;
                })
            }
        },
        computed: {
            buttonText() {
                return this.commentRatngValue;
            }
        }
    }
</script>
