<template>
    <div class="container text-center">
        <h1>All Users:</h1>
        <div v-if="!birthdays.length"  v-for="birthday in birthdays" :key="birthday">
            <div v-for="b in birthday" class="border border-success p-3 mb-3 text-center" :key="b">
                <h3>{{b.name}}</h3>
                <a :href="`/axios-api/${b.id}/`">View</a>
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
                birthdays:[]
            }
        },
        methods:{
            loadBirthdays(){
                axios.get(`/axios-api`)
                .then(response => {
                    this.birthdays = response.data;
                }).catch(err =>{
                    alert(err)
                 });
            }
        },
        created(){
            this.loadBirthdays();
        },
        headers: { 'content-type': 'application/x-www-form-urlencoded' },
        mounted() {
            console.log('Successfully mounted')
        },
    }
</script>
