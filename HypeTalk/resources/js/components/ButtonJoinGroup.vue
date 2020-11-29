<template>
   <div>
        <a href="#" class="ml-3 float-right">
            <button type="button" class="btn btn-info" @click="askToJoinGroup" v-text="buttonText">Ask to join</button>
        </a>
   </div>
</template>

<script>
    export default {

        props: ['groupId', 'role'],

        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.role,
            }
        },

        methods: {
            askToJoinGroup() {
                axios.post('/group/'+this.groupId+'/members/')
                .then(response => {
                    this.status = response.data;
                })
            }
        },
        computed: {
            buttonText() {
                return (this.status === 'not_in_table') ? 'Ask to join' : (this.status === 'member_request') ? 'Cancel request' : 'Leave';
            }
        }
    }
</script>
