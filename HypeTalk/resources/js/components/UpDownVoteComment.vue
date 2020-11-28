<template>
    <div class="d-flex flex-rown" >
        <button class="btn p-0" @click="upVote"><i class="fas fa-arrow-up fa-sm"></i></button>
        <button class="btn p-0" v-text="buttonText"></button>
        <button class="btn p-0" @click="downVote"><i class="fas fas fa-arrow-down fa-sm"></i></button>
    </div>
</template>
<script>
    export default {

        props: ['groupId', 'myRating'],

        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.myRating,
            }
        },

        methods: {
            upVote() {
                alert('Upvoted');

            },
            downVote() {
                alert('Downvoted');
            }
        },
        computed: {
            buttonText() {
                return '0';

            }
        }
    }
</script>
