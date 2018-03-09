<template>
    <div class="content-wrapper " >
        <center>
                <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
        </center>

        <div v-if="!loadarea" class="row">   
        <div class="col-md-12 stretch-card grid-margin">
                <!-- <div class="card text-white  bg-gradient-success" style="height:40px;">
                <div class="card-body"> -->
                    <input type="text" v-model="searchde" class="col-md-5 form-control" placeholder="Search Personnel" aria-label="Username" aria-describedby="colored-addon3">
                    <button data-toggle="modal" data-target="#exampleModalLong" style="cursor:pointer" type="button" class="offset-2 col-md-3 btn-rounded btn btn-success"><i class="mdi mdi-account-multiple-plus"></i>Add new Personnel</button>
                <!-- </div>
                </div> -->
        </div>
        </div>

        <div class="row">   

            <fetchstaff v-on:refresh="fetchStaff" v-bind:get="pickedinfo" v-on:getdetails="getdetails" v-bind:datastaff="datastaff" :key="datastaff.id" v-for="datastaff in filteredList"></fetchstaff>
            
        </div>

        <!-- Modal -->


<!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personnel Registration Form</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.first" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.second" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.last" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.dob" type="date" class="form-control" placeholder="dd/mm/yyyy">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">
                            <select v-model="addnewstaff.department" class="form-control" >
                              <option :key="datadepartment.id" v-for="datadepartment in datadepartments">{{datadepartment.name}}</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Membership</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked="">
                                Free
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                                Professional
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address </label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.address" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.em" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact #</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.contactn" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.pob" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Job Title</label>
                          <div class="col-sm-9">
                            <input v-model="addnewstaff.jobtitle" type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select v-model="addnewstaff.gender" class="form-control">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-if="!addingloading" @click="createStaff" type="button" class="btn btn-primary">Save</button>
                <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">

            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import fetchstaff from './fetchstaff'

export default {
    components:{fetchstaff},
    data(){
        return{
            loadarea:true,
            addingloading:false,
            datastaffs:[],
            searchde:'',
            datadepartments:[],
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
            },
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
        }
    },
    created(){
        this.fetchStaff()
    },
    methods:{
        createStaff(){
            this.addingloading=true
            axios.post("staffdata",this.addnewstaff).then(
                response=>{
              if(response.data.updatenow=="updated"){
                  
                   this.$toastr('add', 
                    { 
                        title: 'Successfully Added ', 
                        msg:this.addnewstaff.last, 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' ,
                    });
            
                  this.fetchStaff();
                  this.addnewstaff.first='';
                  this.addnewstaff.second='';
                  this.addnewstaff.last='';
                  this.addnewstaff.address='';
                  this.addnewstaff.dob='';
                  this.addnewstaff.age='';
                  this.addnewstaff.em='';
                  this.addnewstaff.contactn='';
                  this.addnewstaff.pob='';
                  this.addnewstaff.jobtitle='';
                  this.addingloading=false;
                }
              }
                
            )
        },  
        fetchStaff(){
            axios.get("staffdata").then(
                response=>{
                    this.datastaffs=response.data.datastaffs
                    this.geten=response.data.enabled
                    this.getdi=response.data.disabled
                    this.loadarea=false
                    }
            ),
            axios.get("departmentdata").then(
                response=>{this.datadepartments=response.data.datadepartments2}
            )
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
    },
    computed:{
        filteredList() {
        return this.datastaffs.filter(datastaff => {
            return datastaff.fullname.toLowerCase().includes(this.searchde.toLowerCase())
                })
            }
    }
  
}
</script>
