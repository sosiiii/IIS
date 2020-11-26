<template>
    <div>
      <input type="text" placeholder="Search" v-model="query" class="form-control">
      <ul v-if="results.length > 0 && query" class="list-group list-group-flush position-absolute">
        <li v-for="result in results.slice(0,10)" :key="result.id" class="list-group-item">
          <a :href="result.url">
            <div v-text="result.title"></div>
          </a>
        </li>
      </ul>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            query: null,
            results: []
        };
    },
    watch: {
        query(after, before) {
            this.serachGroups();
        }
    },
    methods: {
        serachGroups() {
            axios.get('/search', { params: { query: this.query } })
            .then(response => this.results = response.data)
            .catch(error => {});
        }
    }
}
</script>
