<template>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
       
    <div class="card-body">
        <i @click="$emit('getdetails',datadepartment)" class="float-right  mdi mdi-plus-circle addbtn" style="font-size:30px;cursor:pointer" data-toggle="modal" data-target="#exampleModal"></i>
        <div class="modal fade scrollbar-pink" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h4 class="card-title">College of {{getdetails.name}} </h4>
                   
                    <form method="post" class="form-sample">
                        <div v-if="!addsave">
                        <p class="card-description">
                        Personal info
                        </p>
                        <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Id No.</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.idno" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Surname</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.last" class="form-control">
                                </div>
                                </div>
                            </div>
                        
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Firstname</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.first" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Middlename</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.second" class="form-control">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester </label>
                            <div class="col-sm-9">
                                <select v-model="addcor.semester" class="form-control">
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="Summer">Summer</option>

                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sex </label>
                            <div class="col-sm-4">
                                <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" v-model="addcor.sex"  value="Male" checked="">
                                    Male
                                <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-radio">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input"  v-model="addcor.sex" value="Female">
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
                                <input type="date" v-model="addcor.dob" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" v-model="addcor.em" placeholder="ckcmascs@eg.com">
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact Number</label>
                            <div class="col-sm-9">
                                <input class="form-control"  v-model="addcor.contactn" value="+63">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year Level</label>
                            <div class="col-sm-9">
                                <select  v-model="addcor.yearlevel" class="form-control">
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
                                    <textarea class="form-control" v-model="addcor.pad" id="exampleTextarea1" rows="3"></textarea>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Home Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" v-model="addcor.had" id="exampleTextarea2" rows="3"></textarea>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Father's </label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.ffullname" placeholder="Surname/Firstname/Middlename" class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mother's </label>
                                <div class="col-sm-9">
                                    <input type="text" v-model="addcor.mfullname"  placeholder="Surname/Firstname/Middlename"  class="form-control">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Place of Birth</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" v-model="addcor.pob"  id="exampleTextarea3" rows="3"></textarea>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">School Last Attended</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" v-model="addcor.lastschool"  id="exampleTextarea4" rows="3"></textarea>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">School Year</label>
                            <div class="col-sm-9 col-md-3">
                                <input type="number" class="form-control" v-model="from"  placeholder="from">
                            </div>
                            <div class="col-sm-9 col-md-3">
                                <input type="number" disabled class="form-control" v-model="to"  placeholder="to">
                            </div>
                            </div>
                        </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" autocomplete="off" class="form-control" placeholder="Desire Password -Optional">
                                    </div>
                                </div>
                            </div>
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
                            <button v-if="addsave" @click="createStudentdata" type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
                    

            
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                        <p class="text-gray mb-0">
                        1 Minutes ago
                        </p>
                    </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                        <p class="text-gray mb-0">
                        15 Minutes ago
                        </p>
                    </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                        <p class="text-gray mb-0">
                        18 Minutes ago
                        </p>
                    </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                </div>

            
            <img :src="'/departmentlogo/'+datadepartment.logo" class="mr-2 mb-2 " alt="Department Logo" height="60px" width="60px" style="border-radius:50%;">
            <!-- <img :src="'/departmentlogo/'+datadepartment.logo" class="mr-2 mb-2 " alt="Department Logo" height="60px" width="60px" style="border-radius:50%;"> -->

            <h4 class="card-title mb-5" style="margin-top:-60px;margin-left:70px"> 
                {{datadepartment.name}} 
                <br>
                <i style="font-size:25px;" class="ml-2 mdi mdi-account-multiple text-info"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span> 
                <i style="font-size:25px;" class="ml-2 mdi mdi-account text-success"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span> 
                <i style="font-size:25px;" class="ml-2 mdi mdi-account text-danger"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span> 
                <form action="#" class="mt-3 grey d-flex align-items-stretch  " style="height:30px;">
                    <div class="input-group  ">
                        <input type="text" v-model="search" style="height:30px;" placeholder="Search"  class=" form-control border-1"> 
                        <div class="input-group-addon bg-transparent border-0 search-button">
                            <button type="submit" class="btn btn-sm bg-transparent px-0">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </h4> 
            
        

            
            <div class="table-responsive scrollbar-pink"  style="height:410px;margin-top:-40px;">
            <table class="table-striped table table-hover" >
                        <thead>
                        <tr>
                            <th>Id No.</th>
                            <th>Firstname</th>
                            <th>Surname</th>
							
                            <th></th>
                        </tr>
                        </thead>
                        <tbody > 
                        <studentslist v-bind:checked="checkedNames" v-on:refresh="fetchStudentsdata" v-on:deleteStudent="deleteStudent" v-bind:getcor="getcor" v-on:getStudent="getStudent" v-if="studentlist.department==datadepartment.name" v-bind:list="studentlist" :key="studentlist.id" v-for="studentlist in filteredList"></studentslist>
                        </tbody>
                    </table>
            </div>
        </div>
        </div>
</div>
</template>
<script>


import studentslist from './studentsdatafetch'
import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'


export default {
    data(){
        return{
            search:'',
            checkedNames:[],
            addsave:false,
            studentlists:[],
            from:'',
            to:'',
            addcor:{
                idno:'',
                first:'',
                second:'',
                last:'',
                semester:'',
                dob:'',
                em:'',
                contactn:'',
                pad:'',
                had:'',
                ffullname:'',
                mfullname:'',
                department:'',
                sex:'',
                lastshool:'',
                sy:'',
                yearlevel:'',
                pob:'',
                department:'',
            },
            getcor:{
                idno:'',
                first:'',
                second:'',
                last:'',
                semester:'',
                dob:'',
                em:'',
                contactn:'',
                pad:'',
                had:'',
                ffullname:'',
                mfullname:'',
                department:'',
                sex:'',
                lastshool:'',
                sy:'',
                yearlevel:'',
                pob:'',
                department:'',
                fullname:'',
                profilepic:'',
                user_id:'',
                modalid:''
            }
        }
    },
    watch:{
        from: function(val){
            this.from=val;
            this.to=  val*1+1;
        }
    },
    props:['datadepartment','getdetails'],
    components:{studentslist},
    created(){
        this.fetchStudentsdata();
    },
    methods:{
        nextadd(){
            this.addsave=true;
        },
        returnadd(){
            this.addsave=false;
        },
        fetchStudentsdata(){
            axios.get('studentsdata').then(response=>{
                this.studentlists=response.data.studentlists;
                setTimeout(this.fetchStudentsdata,100);
                }
            )
            // console.log(this.datadepartment.name);
        },
        deleteStudent(getcor){
            alert(getcor.idno);
            this.showToastr();
            // axios.delete('/studentsdata/'+getcor.user_id).then(response=>{
            //     this.fetchStudentsdata();
            // })
        },
        createStudentdata(){
            let vm=this;
            this.addcor.sy=this.from;
            this.addcor.department=this.getdetails.name;
            console.log(this.addcor)
            axios.post('studentsdata',this.addcor).then(response=>{
                this.fetchStudentsdata();   
                
                this.$toastr('add', 
                    { 
                        title: 'Successfully Added', 
                        msg: '', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' 
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
        getStudent(list){
                this.getcor.user_id=list.user_id;
                this.getcor.idno=list.idno;
                this.getcor.first=list.first;
                this.getcor.second=list.second;
                this.getcor.last=list.last;
                this.getcor.semester=list.semester;
                this.getcor.dob=list.dob;
                this.getcor.em=list.em;
                this.getcor.contactn=list.contactn;
                this.getcor.pad=list.pad ;
                this.getcor.had=list.had ;
                this.getcor.ffullname=list.ffullname;
                this.getcor.mfullname=list.mfullname;
                this.getcor.department=list.department;
                this.getcor.sex=list.sex;
                this.getcor.lastshool=list.lastschool;
                this.getcor.sy=list.sy;
                this.getcor.yearlevel=list.yearlevel;
                this.getcor.pob=list.pob;
                this.getcor.department=list.department;
                this.getcor.fullname=list.fullname;
                this.getcor.profilepic=list.profilepic
                this.getcor.modalid=list.id
                

        },
        showToastr(getcor) {
            this.$toastr('add', 
                { 
                    title: 'Successfully Delete ', 
                    msg: '', 
                    clickClose: true, 
                    timeout: 5000, 
                    position: 'toast-bottom-right', 
                    type: 'success' 
                }
            ) 
        }
    },
    computed:{
  
        filteredList() {
            return this.studentlists.filter(studentslist => {
                return studentslist.fullname.toLowerCase().includes(this.search.toLowerCase())
                    })
        }
    }

}
</script>

