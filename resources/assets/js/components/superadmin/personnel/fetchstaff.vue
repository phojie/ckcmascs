<template>
    <div class="col-md-4 grid-margin">
        <div class="card" style="height:400px;border-top:3px solid #37474F;">
            <div class="card-body" style="margin-top:-10px">
                    <div class="float-right">
                        <i  v-on:click="$emit('getdetails',datastaff)" data-toggle="modal" data-target="#update" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-delete-sweep menu-icon"></i>
                    </div>

                    <div class="float-left">
                        <i  v-on:click="$emit('getdetails',datastaff)" data-toggle="modal" data-target="#deleteup" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-account-settings-variant menu-icon"></i>
                    </div>

                <p style="height:150px" class="card-description">
                <center class="ml-4"><img class="rounded-circle" width="150px" height="150px" :src="'/userprofilepic/'+datastaff.profilepic"  alt="No Profile Picture"></center>
                </p>
                <hr>
                <h5 class="card-title">
                    {{datastaff.fullname}}
                    <!-- <i style="font-size:12px" class="text-gray mdi mdi-information menu-icon"></i>  -->

                </h5>
                <p style="height:50px" class="card-description">
                    Department : {{datastaff.department}}
                </p>
               
                <!-- <i class="mdi mdi-home-account icon-md text-success"></i>Ivy Jamero -->
                
                <br>
                <button   v-on:click="$emit('getdetails',datastaff)" data-toggle="modal" data-target="#exampleModalLongview"  type="button" style="cursor:pointer" class="align-text-bottom btn-block btn btn-dark btn-fw">View More Info</button>
                    
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are about to delete the {{get.fullname}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Are you sure? </h4>
                    <p class="card-description">
                        {{get.fullname}} will be permanently delete as a Personnel
                    </p>
                   
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-dismiss="modal" style="cursor:pointer" type="button" @click="deleteStaff(get)" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
        </div>
       
       <!-- Modal -->
        <div class="modal fade" id="deleteup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personnel Form</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input v-model="get.first" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input v-model="get.second" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input v-model="get.last" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input v-model="get.dob" type="date" class="form-control" placeholder="dd/mm/yyyy">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">
                            <select v-model="get.department" class="form-control" >
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
                            <input v-model="get.address" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input v-model="get.em" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact #</label>
                          <div class="col-sm-9">
                            <input v-model="get.contactn" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9">
                            <input v-model="get.pob" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Job Title</label>
                          <div class="col-sm-9">
                            <input v-model="get.jobtitle" type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select v-model="get.gender" class="form-control">
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
                <button v-if="!addingloading" @click="updateStaff(datastaff,get)" type="button" class="btn btn-primary">Save Changes</button>
                <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">

            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLongview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personnel Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personnel Form</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input disabled v-model="get.first" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.second" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.last" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.dob" type="date" class="form-control" placeholder="dd/mm/yyyy">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">
                            <select disabled v-model="get.department" class="form-control" >
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
                            <input  disabled  v-model="get.address" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.em" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact #</label>
                          <div class="col-sm-9">
                            <input  disabled v-model="get.contactn" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.pob" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Job Title</label>
                          <div class="col-sm-9">
                            <input  disabled  v-model="get.jobtitle" type="text" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select  disabled v-model="get.gender" class="form-control">
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

            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['datastaff','get'],
    data(){
        return{
            addingloading:false,
            datadepartments:[],

        }
    },
    created(){
        this.fetchdepartment()
    },
    methods:{
        deleteStaff(get){
            this.addingloading=false;
            this.$http.delete("/staffdata/"+get.id).then(response => {
               if(response.data.updatenow=="updated"){  
                  this.$emit('refresh')
                  this.addingloading=true;
                   this.$toastr('add', 
                    { 
                        title: 'Successfully Deleted ', 
                        msg:'', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' ,
                    });
               }
                // let index = this.datadepartments.indexOf(datadepartment);
                // this.datadepartments.splice(index, 1);
                
                
            })
        },
        fetchdepartment(){
            axios.get("staffdata").then(
                response=>{
                    this.datastaffs=response.data.datastaffs
                    this.geten=response.data.enabled
                    this.getdi=response.data.disabled
                    }
            ),
            axios.get("departmentdata").then(
                response=>{this.datadepartments=response.data.datadepartments2
                })
        },
        updateStaff(olddatastaff,newdatastaff){
            this.addingloading=true
            this.$http.patch("/staffdata/" + newdatastaff.id,newdatastaff).then(response=>{
            
            if(response.data.updatenow=="updated"){ 
              this.$emit('refresh')
              this.addingloading=false
              this.$toastr('add', 
                    { 
                        title: 'Successfully Updated ', 
                        msg:'', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' ,
                    }); 
                  
            }
                                
  
            });

        }
    }
}
</script>

