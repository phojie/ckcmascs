<template>
<div class="content-wrapper " >
    <div>
        <div class="row">
            
        <buttton @click="this.$toastr('success', 'i am a toastr success', 'hello')"></buttton>
        <fetch v-bind:datadepartment="datadepartment" :key="datadepartment.id" v-for="datadepartment in datadepartments" ></fetch>
        </div>
    </div>
</div>  

</template>

<script>

import fetch from './studentsfetch'
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'
Vue.use(VueToastr, {
    defaultPosition: 'toast-bottom-left',
    defaultType: 'info',
    defaultTimeout: 1000
})

export default {
    
    components:{fetch},
    data(){
        return{
            registrardatas:[],
        	datadepartments:[]

        }
    },
    created(){

        this.fetchUser();
    },
    methods: {
        fetchUser(){
            axios.get('registrardata').then(
                response=>{
                    this.registrardatas=response.data.registrardata
                    setTimeout(this.fetchUser(), 100); 
                    
                }
            ),
            axios.get("departmentdata").then(
                response=>{
                    this.datadepartments=response.data.datadepartments2;
                }
            )
            
        },
        
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit()
        },
    },
    mounted() {
        this.csrf = window.myToken.csrfToken
    }
}
</script>
