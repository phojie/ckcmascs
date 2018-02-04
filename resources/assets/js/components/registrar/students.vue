<template>
<div class="content-wrapper " >
    <div class="">
        <div class="row">
        <!-- <button @click="showToastr"></button> -->
        <fetch v-bind:getdetails="pickedinfo" v-on:getdetails="getdetails" v-bind:datadepartment="datadepartment" :key="datadepartment.id" v-for="datadepartment in datadepartments" ></fetch>
        </div>
    </div>
</div>  

</template>

<script>

import fetch from './studentsfetch'
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'


Vue.use(VueToastr, {
    defaultPosition: 'toast-bottom-right',
    defaultType: 'info',
    defaultTimeout: 5000
})

export default {
    components:{fetch},
    data(){
        return{
            msg: 'This is a button.',
            checkStudent:[],
            registrardatas:[],
            datadepartments:[],
            pickedinfo:{
                id:'',
                name:'',
                dean:'',
                description:'',
                logo:'',
                srclogo:'',
                createdat:''
            }
        }
    },
    created(){

        this.fetchUser();
    },
    methods: {
       
        getdetails(datadepartment){
            this.pickedinfo.id=datadepartment.id;
            this.pickedinfo.name=datadepartment.name;
            this.pickedinfo.dean=datadepartment.dean;
            this.pickedinfo.description=datadepartment.description;
            this.pickedinfo.logo=datadepartment.logo;
            this.pickedinfo.srclogo="/departmentlogo/"+datadepartment.logo;
            this.pickedinfo.createdat=datadepartment.created;
        },
        fetchUser(){
            axios.get('registrardata').then(
                response=>{
                    this.registrardatas=response.data.registrardata
                    // setTimeout(this.fetchUser(), 100); 
                    
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
        this.csrf = window.myToken.csrfToken;
        // this.showToastr();
    }
}
</script>

