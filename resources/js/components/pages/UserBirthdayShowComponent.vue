<template>
    <div class="container text-center">
        <div class="bg-light text-dark p-5 border border-danger" v-if="!user.length"  v-for="info in user" :key="info">
            <h1 class="mb-4">{{info.name}}</h1>
            <h4 class="mb-4">Birthday: {{ info.birthday }}</h4>
            <div class="d-flex justify-content-center">
                <a :href="`/axios-api/${info.id}/edit`" class="btn btn-primary me-3">Edit</a>
                <button id="delete" @click="deleteUserBirthday" class="btn btn-danger" fs-4>Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['userId'],
        data(){
            return{
                user:[],
                id: this.userId,
            }
        },
        methods:{
            loadUserBirthday(){
                axios.get(`/axios-api/admin/${this.userId}`)
                .then(response => {
                    this.user = response.data;
                }).catch(err =>{
                    console.log(err)
                 });
            },
            deleteUserBirthday(){
                axios.delete(`/axios-api/${this.userId}`)
                .then(response => {
                    window.location.href = '/axios-api/birthdays';
                }).catch(err =>{
                    alert(err);
                 });
            }
        },
        created(){
            this.loadUserBirthday();
        },
        headers: { 'content-type': 'application/x-www-form-urlencoded' },
        mounted() {
            console.log('Successfully mounted')
        },
    }
</script>

