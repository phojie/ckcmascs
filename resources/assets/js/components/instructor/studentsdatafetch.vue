<template>
    <tr  style="border-left:1px solid #2ecc71" @mouseover="showbtn" @mouseleave="hidebtn">
        
        <td> {{list.idno}}</td>
        <td class="text-success">{{list.fullname}}</td>
        <td v-if="showloading"><img src="images/loading1.gif"  alt="loading..."></td>
        <td v-if="!showbtnnaw && !showloading"><label class="badge badge-gradient-warning px-3">Actions <i class="mdi mdi-border-color"></i></label> </td>
        <td v-if="showbtnnaw && !showloading"><label style="cursor:pointer" @click="$emit('getStudent',list)" class="badge badge-warning white-text" data-toggle="modal" :data-target="'#viewModal'+list.id"><i class="mdi mdi-update"></i></label>&nbsp; <label style="cursor:pointer" @click="deleteStudent(list)" class="badge badge-danger " ><i class="mdi mdi-delete"></i> </label> </td>
   <!-- > <a class="btn btn-primary waves-effect waves-light" >Bottom Right</a> -->
<!-- <label style="cursor:pointer"  class="badge badge-info " ><i class="mdi mdi-account"></i> </label>&nbsp;  -->
    
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title red-text"  id="exampleModalLabel">Are you sure you want to Delete this record? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col-md-3">
                        <div class="form-group row">
                        <div class="col-sm-9 mr-3">
                        <center><img :src="'/userprofilepic/'+getcor.profilepic" class="" style="border-radius:50%;" alt="image"></center> 
                        </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Id No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span class="ml-3"> {{getcor.idno}} </span></label>
                        <label class="col-sm-12 col-form-label">School Year&nbsp;: <span class="ml-3"> {{getcor.sy}} </span></label>
                        <label class="col-sm-12 col-form-label">Fullname &nbsp;&nbsp;&nbsp;&nbsp;: <span class="ml-3"> {{getcor.fullname}} </span></label>
                        <label class="col-sm-12 col-form-label">Year Level &nbsp;&nbsp;&nbsp;: <span class="ml-3"> {{getcor.yearlevel}} </span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" @click="$emit('deleteStudent',getcor)" data-dismiss="modal" aria-label="Close" class=" btn btn-danger" style="cursor:pointer">Delete now</button>
            </div>
        </div>
    </div>
</div> -->
        
<div class="modal fade" :id="'viewModal'+getcor.modalid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Certificate Of Registration
                    <span class="card-description" style="font-size:12px;">(School Year: 2017-2018)</span>
                    </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="card">
            <div class="card-body">
            <h4 class="card-title">College of {{getcor.department}}</h4>
            
            <form method="post"  class="form-sample">
                <div v-if="!addsave">
                <p class="card-description">
                Personal info
                </p>
                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id No.</label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.idno" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Surname</label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.last" class="form-control">
                        </div>
                        </div>
                    </div>
                
                
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.first" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Middlename</label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.second" class="form-control">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Semester </label>
                    <div class="col-sm-9">
                        <select v-model="getcor.semester" class="form-control">
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="Summer">Summer</option>

                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-if="getcor.sex=='Male'" class="form-group row">
                        <label class="col-sm-3 col-form-label">Membership</label>
                        <div class="col-sm-4">
                        <div class="form-radio">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" value="Male"  checked="">
                            Male
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="col-sm-5">
                        <div class="form-radio">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios"  value="Female">
                            Female
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                    </div>
                    <div v-if="getcor.sex!='Male'" class="form-group row">
                        <label class="col-sm-3 col-form-label">Sex</label>
                        <div class="col-sm-4">
                        <div class="form-radio">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios"   value="Male"  >
                            Male
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="col-sm-5">
                        <div class="form-radio">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" value="Female" checked="">
                            Female
                            <i class="input-helper"></i></label>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" v-model="getcor.dob" class="form-control" placeholder="dd/mm/yyyy">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  v-model="getcor.em" placeholder="ckcmascs@eg.com">
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input class="form-control"  v-model="getcor.contactn" value="+63">
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Year Level</label>
                    <div class="col-sm-9">
                        <select  v-model="getcor.yearlevel" class="form-control">
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                        <option>5th Year</option>
                    
                        </select>
                    </div>
                    </div>
                </div>
                </div>
                </div>


                <div v-if="addsave">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Present Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" v-model="getcor.pad" rows="3"></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Home Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" v-model="getcor.had" rows="3"></textarea>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Father's </label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.ffullname" placeholder="Surname/Firstname/Middlename" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mother's </label>
                        <div class="col-sm-9">
                            <input type="text" v-model="getcor.mfullname"  placeholder="Surname/Firstname/Middlename"  class="form-control">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Place of Birth</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" v-model="getcor.pob"  id="exampleTextarea3" rows="4"></textarea>
                    </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-3 ">
                        <img :src="'userprofilepic/'+getcor.profilepic" class="" height="100" alt=""> 
                    </div>
                    <div class="col-sm-6 ">
                        
                    </div>
                     
                    </div>
                </div> -->
                </div>
                <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">School Last Attended</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" v-model="getcor.lastschool"  id="exampleTextarea4" rows="3"></textarea>
                    </div>
                    </div>
                </div>

                
                </div>
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" autocomplete="off" class="form-control" placeholder="Desire Password -Optional">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div> -->
                </div>
                </div>
                
            </form>
            </div>
            </div>
            </div>
            <div class="modal-footer">
                <button v-if="!addsave" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-if="!addsave" @click="nextadd" type="button" class="btn btn-primary">Next</button>
                <button v-if="addsave" @click="returnadd" type="submit" class="btn btn-light">Return</button>
                <button v-if="addsave && !addingloading"  @click="updateStudent(getcor)" type="submit" class="btn btn-success">Save changes</button>
                <img v-if="addsave && addingloading"  src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
            </div>
        </div>
    </div>
</div>
        
    </tr>

</template>

<script>
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'
import VTooltip from 'v-tooltip'
Vue.use(VTooltip)


export default {
    data(){
        return{
            addingloading:false,
            addsave:false,
            showbtnnaw:false,
            showloading:false
        }
    },
    props:['list','getcor'],
    methods:{ 
        showbtn(){
            this.showbtnnaw=true;
        },
        hidebtn(){
            this.showbtnnaw=false;
        },
        nextadd(){
            this.addsave=true;
        },
        returnadd(){
            this.addsave=false;
        },
        // deleteStudentm(){
        //     alert(this.checkStudent);
        //     axios.delete('/studentsdata/', {id : this.checkStudent}).then(response=>{
        //         this.$emit('refresh');
        //     })
        // },
        updateStudent(newCor){
            this.addingloading=true;
            // alert(newCor.id);
            this.$http.patch("/studentsdata/" + newCor.id,newCor).then(response=>{
            this.$emit('refresh');
            this.$toastr('add', 
                    { 
                        title: 'Successfully Updated ', 
                        msg: '', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' ,
                    }
                );
            this.addingloading=false;
            this.addsave=false;
            
            });
            
            
        },
        deleteStudent(list){
            this.showloading=true;
            let vm=this
            axios.delete('/studentsdata/'+list.user_id).then(response=>{
                // console.log(reponse);
                this.$emit('refresh');
                this.$toastr('add', 
                    { 
                        title: 'Successfully Deleted '+list.last, 
                        msg: '', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' ,
                    }
                );
                
               
            })

            .catch(function(error){
                var errors =error.response
                console.log(errors)
                
                if(errors.statusText === "Internal Server Error" || errors.status ===500){
                    if(errors.data){
                        vm.$toastr('add', 
                            { 
                                title: " Somethings wrong :'(", 
                                msg:"", 
                                clickClose: true, 
                                timeout: 5000, 
                                position: 'toast-bottom-right', 
                                type: 'error' 
                            }
                        );
                    }
                }
            })
        },
        
    }
}
</script>

<style lang="scss">
.tooltip {
  // ...

  &.info {
    $color: rgba(#004499, .9);

    .tooltip-inner {
      background: $color;
      color: white;
      padding: 24px;
      border-radius: 5px;
      box-shadow: 0 5px 30px rgba(black, .1);
      max-width: 250px;
    }

    .tooltip-arrow {
      border-color: $color;
    }
  }
}
</style>
