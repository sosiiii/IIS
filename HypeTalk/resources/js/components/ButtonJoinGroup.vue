<template>
   <div>
        <a href="#" class="ml-3 float-right">
            <button type="button" class="btn btn-info" @click="askToJoinGroup">Ask to join</button>
        </a>
   </div>
</template>

<script>
    export default {

        props: ['groupId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            askToJoinGroup() {
                axios.post('/group/'+this.groupId+'/members/')
                .then(response => {
                    alert(response.data);
                })
            }
        }
    }
</script>
