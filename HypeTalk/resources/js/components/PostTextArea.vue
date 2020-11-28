<template>
        <textarea v-model="chatMessage" @keydown.enter="handleEnter" class="form-control z-depth-1" id="exampleFormControlTextarea6" style="overflow:auto;resize:none" rows="4" cols="5" placeholder="Your comment..."></textarea>

</template>
<script>
    export default {
        props: ['groupId', 'postId'],
        mounted() {
            console.log('Component mounted.')
        },
        data: {
  	        chatMessage: ''
        },
        methods: {
  	        handleEnter (e) {
    	        axios.post('/group/'+this.groupId+'/posts/'+this.postId+'/comment ', {
                    title: this.chatMessage
                })
                .then(response => {
                    location.reload();

                });
            },
        }
    }
</script>
