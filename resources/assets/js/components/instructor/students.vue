<template>
<div class="content-wrapper " >
    <div class="">
        <center>
            <img  v-if="loaderarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
        </center>
        <div class="row">
        <!-- <button @click="showToastr"></button> -->

        <div v-if="!loaderarea"  class="col-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Subject form</h4>
                <p class="card-description">
                </p>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputEmail21">Subject Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail21" placeholder="Enter Subject Code">
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>

        
        <hr>
        <fetch v-bind:getdetails="pickedinfo" v-on:getdetails="getdetails" v-bind:datadepartment="datadepartment" :key="datadepartment.id" v-for="datadepartment in datadepartments" ></fetch>
        </div>
    </div>
</div>  

</template>

<script>

import fetch from './studentsfetch'
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'



export default {
    components:{fetch},
    data(){
        return{
            loaderarea:true,
            checkStudent:[],
            // registrardatas:[],
            datadepartments:[],
            pickedinfo:{
                stotal:'',
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
            this.pickedinfo.stotal=datadepartment.stotal;
            this.pickedinfo.id=datadepartment.id;
            this.pickedinfo.name=datadepartment.name;
            this.pickedinfo.dean=datadepartment.dean;
            this.pickedinfo.description=datadepartment.description;
            this.pickedinfo.logo=datadepartment.logo;
            this.pickedinfo.srclogo="/departmentlogo/"+datadepartment.logo;
            this.pickedinfo.createdat=datadepartment.created;
        },
        fetchUser(){
            axios.get("departmentdata").then(
                response=>{
                    this.datadepartments=response.data.datadepartments2;
                    this.loaderarea=false;
                    setTimeout(this.fetchUser(), 1000); 
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

