<template>
    <div class="page">
        <div> <b>Name:</b> {{ this.name }}</div>
        <div> <b>Age:</b> {{ this.age }}</div>
        <div> <b>Job:</b> {{ this.job }}</div>
    </div>
</template>

<script>
export default {
    name: "Show",
    data() {
        return {
            name: '',
            age: '',
            job: ''
        }
    },

    mounted() {
        this.getPerson()
    },

    methods: {
        getPerson() {
            axios.get(`/api/people/${this.$route.params.id}`).then(response => {
                this.name = response.data.name;
                this.age = response.data.age;
                this.job = response.data.job;
                console.log(response.data);
            })
        }
    }
}
</script>

<style scoped>

</style>
