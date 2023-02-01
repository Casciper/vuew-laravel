<template>
    <div class="w-50 page">
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" id="name" v-model="name" placeholder="Name" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="age">Age</label>
            <input type="text" id="age" v-model="age" placeholder="Age" class="form-control"/>
        </div>
        <div class="mb-2">
            <label for="job">Job</label>
            <input type="text" id="job" v-model="job" placeholder="Job" class="form-control"/>
        </div>
        <button @click.prevent="updatePerson" type="submit" class="btn btn-primary mt-2">Update</button>

    </div>
</template>

<script>
import axios from "axios";
import router from "../../router";
export default {
    name: "Edit",
    data() {
        return {
            name: "",
            age: "",
            job: ""
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
            })
        },

        updatePerson() {
            axios.patch(`/api/people/${this.$route.params.id}`, {
                name: this.name,
                age: this.age,
                job: this.job
            }).then(response => {
                router.push({ name: 'person.show', params: { id: this.$route.params.id } });
            })
        }
    }
}
</script>

<style scoped>

</style>
