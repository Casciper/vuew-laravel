<template>
    <div class="person-container page">
        <template v-for="person in people">
            <div class="person-card">
<!--                <div><b>Name:</b> </div>-->
<!--                <div><b>Age:</b> </div>-->
<!--                <div><b>Job:</b> {{ person.job }}</div>-->
<!--                <a href="#" @click.prevent="editPerson(person.id)">Edit</a><br>-->
<!--                Show</a><br>-->
<!--                -->
<!--                <hr>-->
                <a href="#" @click.prevent="showPerson(person.id)">
                    <div class="profile-card-2"><img src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-2.jpg" class="img img-responsive">
                        <div class="profile-name">{{ person.name }}</div>
                        <div class="profile-age">{{ person.job }}</div>
                        <div class="profile-username">{{ person.age }}</div>
                        <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                </a>
                <div>
                    <a href="#" @click.prevent="deletePerson(person.id)">Delete</a>
                </div>

            </div>
        </template>
    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "Index",
    data() {
        return {
            people: null
        }
    },
    mounted() {
        this.getPeople();
    },
    methods: {
        getPeople() {
            axios.get("/api/people").then(response => {
                this.people = response.data;
            });
        },

        editPerson(id) {
            router.push(({name: "person.edit", params: {id: id}}));
        },

        showPerson(id) {
            router.push(({name: "person.show", params: {id: id}}));
        },

        deletePerson(id) {
            axios.delete(`/api/people/${id}`).then(response => {
                this.getPeople();
                console.log(response);
            })
        }
    }
}
</script>

<style scoped>
.person-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 5fr));
    grid-gap: 10px;
    width: 100%;
    left: 0;
    overflow-y: scroll;
    min-height: 100px;
    max-height: 845px;
}
</style>
