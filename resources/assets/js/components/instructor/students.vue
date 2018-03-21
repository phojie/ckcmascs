<template>
<div class="content-wrapper " >
    <div class="">
        <center>
            <img  v-if="loaderarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
        </center>
        <div class="row">
        <!-- <button @click="showToastr"></button> -->

        <div v-if="!loaderarea"  class="col-6 grid-margin">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Subject form</h4>
                <p class="card-description">
                </p>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputEmail21">Subject Code</label>
                    <input type="text" v-model="addsub.code" class="form-control" id="exampleInputEmail21" placeholder="Enter Subject Code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail21">Subject Title</label>
                    <input type="text" v-model="addsub.title" class="form-control" id="exampleInputEmail21" placeholder="Enter Title">
                </div>
                <button type="button" @click="createSubject" class="btn btn-success mr-2">Submit</button>
                <button  class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>

        <div v-if="!loaderarea"  class="col-3 grid-margin">
            <div class="card text-white" style="background-color: rgb(75, 81, 93);">
                <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Students</h4> 
                <h2 class="font-weight-normal mb-5">{{counttt}}</h2>
                </div>
            </div>
        </div>
        <div v-if="!loaderarea"  class="col-3 grid-margin">
            <div class="card text-white" style=" background-color: rgb(75, 81, 93);">
                <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Subject</h4> 
                <h2 class="font-weight-normal mb-5">{{countt}}</h2>
                </div>
            </div>
        </div>

         <div v-if="!loaderarea" class="row" style="height:400px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Subjects List Added</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                              
                                <th>
                                Subject Code
                                </th>
                                <th>
                                Descriptive Title
                                </th>
                                <th>
                                Action
                                </th>
                              
                                
                            </tr>
                            </thead>
                            <tbody>
                               
                               <fetchsub v-bind:idsub="pickedsub" v-on:getdetails="getsubdata" v-bind:lsub="sub" :key="sub.id" v-for="sub in subs"></fetchsub>
                           
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Students List Added</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                                <th>
                                User
                                </th>
                                <th>
                                Full name
                                </th>
                                <th>
                                Id No.
                                </th>
                                <th>
                                Year level
                                </th>
                                <th>
                                Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                               
                               <ul  v-for="student in students">
                                <li>{{student.id}}
                                </li>
                               </ul>
                                <fetchsucc v-on:refresh="fetchrequestdata" v-bind:requestdata="requestdone" :key="requestdone.id" v-for="requestdone in requestdones"></fetchsucc>
                           
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>  

</template>

<script>
import fetchsub from './fetchsub'
import fetch from './studentsfetch'
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'



export default {
    components:{fetch,fetchsub},
    data(){
        return{
            students:[],
            counttt:'',
            countt:'',
            loaderarea:true,
            checkStudent:[],
            // registrardatas:[],
            datadepartments:[],
            addsub:{
                code:'',
                title:''
            },
            pickedinfo:{
                stotal:'',
                id:'',
                name:'',
                dean:'',
                description:'',
                logo:'',
                srclogo:'',
                createdat:''
            },
            pickedsub:{
                id:'',
                user_id:''
            },
            subs:[]
        }
    },
    created(){

        this.fetchUser();
    },
    methods: {
        getsubdata(getid){
           this.pickedsub.id=getid.id
           this.pickedsub.user_id=getid.user_id
        },
        createSubject(){
            axios.post('subjectdata',this.addsub).then(response=>{
                this.fetchUser();
                this.addsub.code='';
                this.addsub.title='';
            })
        },
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
            axios.get("subjectdata").then(
                response=>{
                    this.countt=response.data.countt;
                    this.subs=response.data.getsubs;
                }
            )
            axios.get("studentsdata").then(
                response=>{
                    this.count=response.data.count;
                    this.counttt=response.data.getmystudent;
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

