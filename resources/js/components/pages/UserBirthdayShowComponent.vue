<template>
    <div class="container text-center">
        <div class="bg-light text-dark p-5 border border-danger" v-if="!user.length"  v-for="info in user" :key="info">
            <h1 class="mb-4">{{info.name}}</h1>
            <h4 class="mb-4">Birthday: {{ info.birthday }}</h4>
            <div class="d-flex justify-content-center">
                <a :href="`/axios-api/${info.id}/edit`" class="btn btn-primary me-3">Edit</a>
                <button id="delete" class="btn btn-danger" fs-4>Delete</button>
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
            // el: "#testing",
            loadUserBirthday(){
                axios.get(`/axios-api/admin/${this.userId}`)
                .then(response => {
                //  console.log(response.data)
                if(response.status == 200)
                 console.log(response.data)
                 this.user = response.data;
                }).catch(err =>{
                    console.log(err)
                 });
            },
        },
        created(){
            this.loadUserBirthday();
        },
        headers: { 'content-type': 'application/x-www-form-urlencoded' },
        mounted() {
            // console.log('test')
        },
    }
</script>


<!-- '<div class="bg-light text-dark p-5 border border-danger" style="text-align: center">\
    <h1 class="mb-4">'+response.data.name+'</h1>\
    <h4 class="mb-4">Weight:'+response.data.weight+'</h4>\
    <h4 class="mb-4">Height:'+response.data.height+'</h4>\
    <div class="d-flex justify-content-center">\
        <a href="/admin/api/'+id+'/edit" class="btn btn-primary me-3">Edit</a></button>\
        <button id="delete" class="btn btn-danger" fs-4>Delete</button>\
    </div>\
</div>'
) -->