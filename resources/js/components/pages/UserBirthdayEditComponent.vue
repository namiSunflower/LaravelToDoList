<template>
    <div class="container">
        <form @submit.prevent="updateBirthday()">
            <label for="birthday" class="fs-3">Birthday</label>
            <input v-model="formData.birthday" type="date" class="form-control input-lg" data-ajax-input="birthday" name = "birthday" id="birthday">
            <input type="submit">
        </form>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['userId'],
        data(){
            return{
                id: this.userId,
                formData: {
                    birthday: '',
                }
            }
        },
        methods:{
            updateBirthday(){
                axios.put(`/axios-api/${this.userId}`, this.formData,)
                .then(response => {
                 console.log(response)
                }).catch(err =>{
                    console.log(err)
                 });
            }
        },
        headers: { 'content-type': 'application/x-www-form-urlencoded' },
        mounted() {
            console.log(this.userId)
        },
    
    }

</script>

