<template>
  <!--Section: Blog v.3-->
<div>
        <!--Grid row-->
        <div class="row ">
        <!-- <i    v-on:click="$emit('getdetails',datadepartment)" data-target="#modalConfirmDelete" data-toggle="modal" class="fa fa-close color2text akongbtndangertext" style="font-size:15px;cursor:pointer" aria-hidden="true"></i> -->
          
        <!--Grid column-->
        <div class="col-lg-5 col-xl-4 mb-4">
            <!--Featured image-->
            <div class="avatar">
                <img style="border-radius:5px;" height="150px;" :src="'userprofilepic/'+datastaff.profilepic" alt="avatar" class=" img-responsive">
            <br>
            Facebook dre link 
            <br>
            </div>
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div style="margin-left:-90px;" class=" col-lg-9 col-xl-9  mb-4">
            
            <h4 class="mb-3 font-bold ">
            <a v-if="disable"  class="float-left success-color mr-2 " style="border-radius:50%;height:10px;width:10px;margin-top:9.5px;"></a>
            <a v-if="!disable" class="float-left danger-color mr-2 " style="border-radius:50%;height:10px;width:10px;margin-top:9.5px;"></a>
            
            <strong>{{datastaff.first}} {{datastaff.last}}</strong>
               <a class="float-right close nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>


                <div class="dropdown-menu dropdown-purple " aria-labelledby="navbarDropdownMenuLink-5">
                    <!-- <a v-on:click="$emit('getdetails',datastaff)"  data-target="#modalConfirmDelete"  data-toggle="modal" class="btn color2 akongbtn" style="padding:5px 10px;font-size:12px;">Setting</a> -->
                    <a v-on:click="$emit('getdetails',datastaff)"  data-target="#1fluidModalRightSuccessDemo"  data-toggle="modal" class="btn color2 akongbtn" style="padding:5px 10px;font-size:12px;">Modify</a>
                    <a v-on:click="$emit('getdetails',datastaff)"  data-target="#modalConfirmDelete"  data-toggle="modal" class="btn color2 akongbtn" style="padding:5px 10px;font-size:12px;">Delete</a>
                </div>
                <!-- <input type="text" v-model="datastaff.ad"> -->
                <!-- <span v-if="!disable" @click="turndisable" class="animated  float-right"><button type="button" style="height:20px;padding:0px 15px;font-size:10px;" class="btn pink darken-4">Disable</button></span> -->
                <!-- <span v-if="disable" @click="turndisable" class="animated bounce float-right"><button type="button" style="height:20px;padding:0px 15px;font-size:10px;" class="btn light-green darken-4">Enable</button></span> -->
                <span v-if="!disable" @click="turndisable(datastaff)" class="  float-right"><button type="button" style="height:20px;padding:0px 15px;font-size:10px;" class="disable btn ">{{btnad}}</button></span>
                <span v-if="disable" @click="turndisable(datastaff)" class=" float-right"><button type="button" style="height:20px;padding:0px 15px;font-size:10px;" class="btn enable ">{{btnad}}</button></span>
         
            <!-- <button  style="margin-top:-17px;" data-toggle="tooltip" data-placement="right" title="Delete" type="button" class="nav-item dropdown float-right close " aria-label="Close"> -->
             
            <!-- </button> -->
            </h4>
            <p class="grey-text">{{datastaff.jobtitle}}</p>
            <p>
            <a class="font-bold grey-text">{{datastaff.department}}</a>
            <br>
            since {{datastaff.created}}</p>
            <a class="btn  blue darken-3 btn-sm">More Info</a>
        </div>
        <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr class="mb-5">

        <!-- modaldersa pag add -->
    <div class="modal fade right" id="1fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-right modal-notify " role="document">
            <!--Content-->
            <div class="modal-content">
                <div  style="height:40px;" class="color1  d-flex modal-header  ">
                    <p class="heading lead" style="margin-top:-12px;">Update staff</p>

                    <button style="margin-top:-24px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                
                <!--Body-->
                <div class="modal-body">
                <!-- Form contact -->

            
                                    
    <form v-on:submit.prevent="updateStaff(get)" >
        <div v-if="!insert2">
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.first" id="form13" class="form-control">
                <label class="active" for="form13">Firstname</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.second" id="form13" class="form-control">
                <label class="active" for="form13">Middlename</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.last" id="form3" class="form-control">
                <label class="active" for="form3">Surname</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.em" id="form3" class="form-control">
                <label class="active" for="form3">Email</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="number" v-model="get.contactn" id="form3" class="form-control">
                <label class="active" for="form2">Contact number</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-pencil prefix grey-text" style="font-size:30px;"></i>
                <textarea autocomplete="off" type="text" v-model="get.jobtitle" id="form8" class="md-textarea" ></textarea>
                <label class="active" for="form8">Description</label>
            </div>
        </div>


        <div v-if="insert2">
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.pob" id="form3" class="form-control">
                <label class="active" for="form34">Place of Birth</label>
            </div>

            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" v-model="get.age" id="form3" class="form-control">
                <label class="active" for="form3">Age</label>
            </div>

            

            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="date" id="form3" v-model="get.dob" class="form-control">
                <label class="active" for="form34" style="font-size:13px;">Date of Birth</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <input autocomplete="off" type="text" id="form3" v-model="get.address" class="form-control">
                <label class="active" for="form2">Address</label>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                
                <select style="height:38px;padding:5px 20px;" v-model="get.gender" class="mt-5 ml-5 nav-link dropdown-toggle waves-effect waves-light zzz" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option class="dropdown-item waves-effect waves-light" disabled >Gender</option>
                    <option class="dropdown-item waves-effect waves-light" >Male</option>

                    <option class="dropdown-item waves-effect waves-light" >Female</option>

                </select>
            </div>
            <div class="md-form">
                <i class="ml-2 fa fa-user prefix grey-text" style="font-size:30px;"></i>
                <select @click="selectnow=true" style="height:38px;padding:5px 20px;"  v-model="get.department" class="mt-5 ml-5 nav-link dropdown-toggle waves-effect waves-light zzz" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option v-if="!selectnow" class="waves-effect waves-light" >{{get.department}}</option>
                    <option  v-if="selectnow" class="waves-effect waves-light" :key="datadepartment.id"  v-for="datadepartment in datadepartments" >Department of {{datadepartment.name}}</option>
                
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
        <!--Modal: modalConfirmDelete-->

    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="red modal-dialog modal-md modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div  style="height:50px;" class="color1 darken-1 d-flex justify-content-center">
                    <p class="heading mt-2">Are you sure you want to delete ds{{get.first}}</p>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <center>
    <!-- <div :style="bgdp" style="height:150px;width:150px;"   class="animated rotateIn img-fluid rounded-circle z-depth-0" alt="Department Logo"></div> -->
                 <img  :src="get.profilepic" alt="image"  class="animated flip img-fluid rounded-circle z-depth-0"  style="height:150px;width:150px;"   >
                    </center>
                </div>
                        <p class="black-text"><small class="red-text">Note!</small> <small >{{get.fullname}} will be permanently deleted </small></p>
                <!--Footer-->
                <div class="modal-footer flex-center">
                    <!-- <div class="form-group" >
                        <input type="checkbox" @change="check" v-model="checksamok" id="checkbox2">
                        <label for="checkbox2" class="">Do not show this message again</label>
                        {{checksamok}}
                    </div>
                     -->
                    <a  v-on:click="$emit('delete-staff',get)" data-dismiss="modal" class="btn  btn-outline-secondary-modal">Yes</a>
                    <a type="button" class="btn btn-sm btn-primary-modal waves-effect" data-dismiss="modal">No</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

    <!--Modal: modalConfirmDelete-->

</div> 

</template>

<script>
export default {
    props:['datastaff','get'],
    data(){
        return{
            btnad:'',
            disable:false,
            insert2:false,
            selectnow:false,
            datadepartments:[],
            newad:{
                ad:''
            }

        }
    },
    created(){
        this.fetchDepartment(); 
    },
    methods:{
        turndisable(datastaff){
            if(this.disable==false){
                datastaff.ad="1"
                this.$http.patch("/staffdata/" + datastaff.id,datastaff).then(response=>{
                this.$emit('refresh');
                this.fetchDepartment();
                console.log(response.data);
                });
                
            }
            else{
                datastaff.ad="0"
                this.$http.patch("/staffdata/" + datastaff.id,datastaff).then(response=>{
                this.$emit('refresh');
                this.fetchDepartment();
                console.log(response.data);
                });
            }
                
            
        },
        fetchDepartment(){
             axios.get("departmentdata").then(
                response=>{this.datadepartments=response.data.datadepartments2}
            )

                if(this.datastaff.ad==0){
                    this.btnad='Disable';
                    this.disable=false;
                    
                }else{
                    this.btnad='Enable';
                    this.disable=true;
                    
                }
                
                
            
        },
        updateStaff(newdatastaff){
            this.$http.patch("/staffdata/" + newdatastaff.id,newdatastaff).then(response=>{
            
            this.$emit('refresh');
            
            console.log(response.data);
            this.insert2=false;          
                                
  
            });

        }
        
    }
}
</script>
