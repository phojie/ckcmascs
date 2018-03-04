<template>
<div style="margin-top:70px;">
<div class="row mx-5">
    <section class="py-4 col-8 scrollbar-lady-lips" style="height:600px;overflow:auto" >

      <datastaff v-on:refresh="fetchStaff" v-on:delete-staff="deleteStaff" :get="pickedinfo" v-on:getdetails="getdetails" :key="datastaff.id" v-bind:datastaff="datastaff" v-for="datastaff in filteredList"></datastaff>

    </section>
    <!-- modaldersa pag add -->
<div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-right modal-notify " role="document">
        <!--Content-->
        <div class="modal-content">
            <div  style="height:40px;" class="color1  d-flex modal-header  ">
                <p class="heading lead" style="margin-top:-12px;">New staff</p>

                <button style="margin-top:-24px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            
            <!--Body-->
            <div class="modal-body">
               <!-- Form contact -->

           
                                
<form v-on:submit.prevent="createStaff">
    <div v-if="!insert2">
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.first" id="form13" class="form-control">
            <label class="active" for="form13">Firstname</label>
        </div>

       <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.second" id="form23" class="form-control">
            <label class="active"  for="form23">Middlename</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.last" id="form33" class="form-control">
            <label class="active"  for="form33">Surname</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.em" id="form43" class="form-control">
            <label class="active"  for="form43">Email</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="number" v-model="addnewstaff.contactn" id="form53" class="form-control">
            <label class="active"  for="form53">Contact number</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-pencil prefix grey-text" style="font-size:30px;"></i>
            <textarea autocomplete="off" type="text" v-model="addnewstaff.jobtitle" id="form56" class="md-textarea" ></textarea>
            <label class="active" for="form56">Description</label>
        </div>
    </div>


    <div v-if="insert2">
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.pob" id="form57" class="form-control">
            <label class="active" for="form57">Place of Birth</label>
        </div>

        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" v-model="addnewstaff.age" id="form58" class="form-control">
            <label class="active" for="form58">Age</label>
        </div>

        

        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="date" id="form59" v-model="addnewstaff.dob" class="form-control">
            <label class="active" for="form59" style="font-size:13px;">Date of Birth</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <input autocomplete="off" type="text" id="form60" v-model="addnewstaff.address" class="form-control">
            <label class="active" for="form60">Address</label>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            
            <select style="height:38px;padding:5px 20px;" v-model="addnewstaff.gender" class="mt-5 ml-5 nav-link dropdown-toggle waves-effect waves-light zzz" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <option class="dropdown-item waves-effect waves-light" disabled >Gender</option>
                <option class="dropdown-item waves-effect waves-light" >Male</option>

                <option class="dropdown-item waves-effect waves-light" >Female</option>

            </select>
        </div>
        <div class="md-form">
            <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
            <select @click="selectnow=true" style="height:38px;padding:5px 20px;"  v-model="addnewstaff.department" class="mt-5 ml-5 nav-link dropdown-toggle waves-effect waves-light zzz" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <option v-if="!selectnow" class="waves-effect waves-light" >Choose Department</option>
                <option  v-if="selectnow" class="waves-effect waves-light" :key="datadepartment.id"  v-for="datadepartment in datadepartments" >{{datadepartment.name}}</option>
               
            </select>
                                
        </div>
                
            
    </div>
   

    <hr>
        <div v-if="!insert2" class="text-center">
            <button type="button"  @click="insert2=true" class="btn btn-md btn-unique">Next <i class="fa fa-paper-plane-o ml-1"></i></button>
        </div>
        <div v-if="insert2" class="mt-4 text-center">
            <button type="button" @click="insert2=fasslse" class="btn-md btn btn-unique">Back <i class="fa fa-paper-plane-o ml-1"></i></button>
            <button class="btn  btn-unique" type="submit">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
        </div>


    
</form>
<!-- Form contact -->
            </div>

            <!--Footer-->
          
        </div>
        <!--/.Content-->
    </div>  
</div>
    <!-- exit -->



    <div class="col-4 " style="height:500px">
        <div class="row" style="">
            <form class="offset-3 form-inline " style="margin-top:-17px;" >
                <input  v-model="search"  class=" form-control mr-sm-2 mt-2 waves-effect white-text" type="text" placeholder="Search" aria-label="Search">
            </form>
            <button type="button" style="padding:7px 20px;height:35px;" class="btn-sm color1 lighten-1 btn liwaves-effect waves-light" data-toggle="modal" data-target="#fluidModalRightSuccessDemo" >Add new</button>
            <i id="tigpoint" style="font-size:20px;" class="mt-3 animated flash infinity  fa fa-hand-o-left" aria-hidden="true"></i>
            </div>

            <hr>

       
            <button class=" green darken-1 ml-5" style="border-radius:50%;height:15px;width:15px;;border:0px;"></button> <small style="font-size:15px;" class="font-bold white-text">Enable : {{geten}}</small>
            <button class=" pink darken-1 ml-5" style="border-radius:50%;height:15px;width:15px;;border:0px;"></button> <small style="font-size:15px;" class="font-bold white-text">Disable : {{getdi}}</small>
            <br>
            <br>
            <ul class="list-group" :key="datadepartment.id" v-for="datadepartment of datadepartments">
                <li class="list-group-item  color2text d-flex justify-content-between align-items-center">
                    Department of {{datadepartment.name}}
                    <span class="badge special-color badge-pill "> {{datadepartment.total}}</span>
                </li>
               
            </ul>
            

    </div>
</div>
</div>       
</template>


<script>

import datastaff from './stafffetch';

export default {
    components:{datastaff},
    data(){
        return{
            search:'',
            selectnow:false,
            insert2:false,
            datastaffs:[],
            geten:'',
            getdi:'',
            datadepartments:[],
            addnewstaff:{
                first:'',
                second:'',
                last:'',
                address:'',
                dob:'',
                age:'',
                em:'',
                contactn:'',
                pob:'',
                jobtitle:'',
                department:'Choose Department',
                gender:'Gender'

            },
            pickedinfo:{
                id:'',
                first:'',
                second:'',
                last:'',
                address:'',
                dob:'',
                age:'',
                em:'',
                contactn:'',
                pob:'',
                jobtitle:'',
                department:'',
                gender:'',
                created:'',
                profilepic:'',
                fullname:'',
                ad:'',
            }
        }
    },
    created(){
            // setTimeout(this.fetchStaff(), 100); 
        this.fetchStaff();
    },
    methods:{
        fetchStaff(){
            axios.get("staffdata").then(
                response=>{
                    this.datastaffs=response.data.datastaffs
                    this.geten=response.data.enabled
                    this.getdi=response.data.disabled
                    }
            ),
            axios.get("departmentdata").then(
                response=>{this.datadepartments=response.data.datadepartments2}
            )
            
        },
        createStaff(){
            axios.post("staffdata",this.addnewstaff).then()
            this.fetchStaff();
            this.first='';
            this.second='';
            this.last='';
            this.address='';
            this.dob='';
            this.age='';
            this.em='';
            this.contactn='';
            this.pob='';
            this.jobtitle='';
            this.insert2=false
        },  
        getdetails(datastaff){
            this.pickedinfo.id=datastaff.id;
            this.pickedinfo.first=datastaff.first;
            this.pickedinfo.second=datastaff.second;
            this.pickedinfo.last=datastaff.last;
            this.pickedinfo.address=datastaff.address;
            this.pickedinfo.dob=datastaff.dob;
            this.pickedinfo.age=datastaff.age;
            this.pickedinfo.em=datastaff.em;
            this.pickedinfo.contactn=datastaff.contactn;
            this.pickedinfo.pob=datastaff.pob;
            this.pickedinfo.jobtitle=datastaff.jobtitle;
            this.pickedinfo.department=datastaff.department;
            this.pickedinfo.gender=datastaff.gender;
            this.pickedinfo.created=datastaff.created;
            this.pickedinfo.profilepic=datastaff.profilepic;
            this.pickedinfo.fullname=datastaff.fullname;
            this.pickedinfo.profilepic="/userprofilepic/"+datastaff.profilepic;
            this.pickedinfo.ad=datastaff.ad;
            
        },
        deleteStaff(get){
            this.$http.delete("/staffdata/"+get.id).then(response => {
                // let index = this.datadepartments.indexOf(datadepartment);
                // this.datadepartments.splice(index, 1);
                this.fetchStaff();
            })
        }

    },
    computed:{
    filteredList() {
    return this.datastaffs.filter(datastaff => {
        return datastaff.fullname.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
}
</script>

<style>

</style>
