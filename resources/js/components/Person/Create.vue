<template>
    <div class="page">
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
        <button @click.prevent="store" type="submit" class="btn btn-primary mt-2">Submit</button>
    </div>
</template>

<script>
import axios from "axios";
import router from "../../router";

export default {
    name: "Create",
    data() {
        return {
            name: "",
            age: "",
            job: ""
        }
    },
    methods: {
        store(){
            axios.post('/api/people/', {name:this.name, age:this.age, job:this.job})
                .then(response => {
                    router.push({ name: 'person.index' })
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>

</style>
