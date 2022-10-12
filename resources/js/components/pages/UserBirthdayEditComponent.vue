<template>
    <div class="container">
        <form @submit.prevent="updateBirthday()">
            <label for="birthday" class="fs-3">Birthday</label>
            <input @change="enableButton" v-model="formData.birthday" type="date" class="form-control input-lg" data-ajax-input="birthday" name = "birthday" id="birthday" >
            <input :disabled="disabled" type="submit" class="btn btn-primary mt-2">
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
                    },
                    disabled: true,
                }
            },
            methods:{
                loadUserBirthday(){
                    axios.get(`/axios-api/admin/${this.userId}`)
                    .then(response => {
                        this.formData.birthday = response.data.data.birthday;
                    }).catch(err =>{
                        alert(err)
                    });
                },
                updateBirthday(){
                    const formData = new FormData();
                    formData.append('birthday',this.birthdate)
                    axios.put(`/axios-api/${this.userId}`, this.formData,)
                    .then(response => {
                        alert("User's birthday has been successfully updated!")
                    }).catch(err =>{
                        alert(err)
                    });
                },
                enableButton(){
                    this.disabled = !this.disabled;
                }
            },
            headers: { 'content-type': 'application/json' },
            created(){
                this.loadUserBirthday();
            },
            mounted() {
                console.log('Successfully mounted')
            },
        
        }

</script>

