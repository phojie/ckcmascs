<template>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
       
    <div class="card-body">
        <i @click="$emit('getdetails',datadepartment)" class="float-right  mdi mdi-account-multiple-plus addbtn" style="font-size:30px;cursor:pointer" data-toggle="modal" data-target="#exampleModal"></i>
        
     
      
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
                    <h4 class="card-title">College of {{getdetails.name}}</h4>
                    <div v-if="!addsave">
                    <form method="post" @submit.prevent="validateForm('form-1')" data-vv-scope="form-1" class="form-sample" novalidate> 
                        <p class="card-description">
                        Personal info
                        </p>
                        <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row " :class="{'has-error':errors.has('id no')}">
                                <label class="col-sm-3 col-form-label">Id No.</label>
                                <div class="col-sm-9">
                                            <input v-model="addcor.idno" autocomplete="off"  class="form-control animated " v-validate="'required'" :class="{'input': true, 'is-invalid ': errors.has('form-1.Id No.')}" name="Id No." type="text" placeholder="">
                                            <span v-show="errors.has('form-1.Id No.')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Id No.')}" class="animated invalid-feedback">{{errors.first("form-1.Id No.")}}</span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Surname</label>
                                <div class="col-sm-9">
                                    <input  autocomplete="off" type="text" v-model="addcor.last" class="form-control animated" v-validate="'required|alpha'" :class="{'input':true, 'is-invalid': errors.has('form-1.Surname')}" name="Surname">
                                    <span v-show="errors.has('form-1.Surname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Surname')}" class="animated invalid-feedback">{{errors.first("form-1.Surname")}}</span>
                              
                                </div>
                                </div>
                            </div>
                        
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Firstname</label>
                                <div class="col-sm-9">
                                    <input autocomplete="off"  type="text" v-model="addcor.first" class="form-control animated" v-validate="'required|alpha'" :class="{'input':true, 'is-invalid': errors.has('form-1.Firstname')}" name="Firstname">
                                    <span v-show="errors.has('form-1.Firstname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Firstname')}" class="animated invalid-feedback">{{errors.first("form-1.Firstname")}}</span>
                              
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Middlename</label>
                                <div class="col-sm-9">
                                    <input autocomplete="off"  type="text" v-model="addcor.second" class="form-control animated" v-validate="'required|alpha'" :class="{'input':true, 'is-invalid': errors.has('form-1.Middlename')}" name="Middlename">
                                    <span v-show="errors.has('form-1.Middlename')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Middlename')}" class="animated invalid-feedback">{{errors.first("form-1.Middlename")}}</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester </label>
                            <div class="col-sm-9">
                                <select v-validate="'required'" :class="{'input':true, 'is-invalid': errors.has('form-1.Semester')}" name="Semester" v-model="addcor.semester" class="form-control">
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                                <option value="Summer">Summer</option>

                                </select>
                                <span v-show="errors.has('form-1.Semester')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Semester')}" class="animated invalid-feedback">{{errors.first("form-1.Semester")}}</span>
                                
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sex </label>
                            <div class="col-sm-4">
                                <div class="form-radio">
                                <label class="form-check-label">
                                    <input name="Sex" type="radio" v-validate="'required|in:Male,Female'" class="form-check-input" v-model="addcor.sex"  value="Male" checked="">
                                    Male
                                <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-radio">
                                <label class="form-check-label">
                                    <input name="Sex" type="radio" class="form-check-input"  v-model="addcor.sex" value="Female">
                                    Female
                                <i class="input-helper"></i></label>
                                </div>
                            </div>
                            </div>
                                <span v-show="errors.has('form-1.Sex')" style="font-size:10px" class="animated invalid-feedback">{{errors.first("form-1.Sex")}}</span>
                            
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="Date of Birth" :class="{'input':true, 'is-invalid': errors.has('form-1.Date of Birth')}" v-validate="'required'" v-model="addcor.dob" class="form-control" placeholder="dd/mm/yyyy">
                                <span v-show="errors.has('form-1.Date of Birth')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Date of Birth')}" class="animated invalid-feedback">{{errors.first("form-1.Date of Birth")}}</span>
                                
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="Email" :class="{'input':true, 'is-invalid': errors.has('form-1.Email')}" v-validate="'required|email'" class="border-3 form-control" v-model="addcor.em" placeholder="ckcmascs@eg.com">
                                    <span v-show="errors.has('form-1.Email')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Email')}" class="animated invalid-feedback">{{errors.first("form-1.Email")}}</span>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact Number</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="Contact Number" :class="{'input':true, 'is-invalid': errors.has('form-1.Contact Number')}" v-validate="'required|numeric'" v-model="addcor.contactn" value="+63">
                                <span v-show="errors.has('form-1.Contact Number')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Contact Number')}" class="animated invalid-feedback">{{errors.first("form-1.Contact Number")}}</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year Level</label>
                            <div class="col-sm-9">
                                <select name="Year Level" :class="{'input':true, 'is-invalid': errors.has('form-1.Year Level')}"  v-validate="'required'" v-model="addcor.yearlevel" class="form-control">
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                                <option>5th Year</option>
                                </select>
                                <span v-show="errors.has('form-1.Year Level')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-1.Year Level')}" class="animated invalid-feedback">{{errors.first("form-1.Year Level")}}</span>
                                

                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                        </div>


                        <div v-if="addsave">

                    <form method="post" @submit.prevent="validateForm1('form-2')" data-vv-scope="form-2" class="form-sample" novalidate> 
                    

                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Present Address</label>
                                <div class="col-sm-9">
                                    <textarea name="Present Address" :class="{'input':true, 'is-invalid': errors.has('form-2.Present Address')}"  v-validate="'required'" class="form-control" v-model="addcor.pad" id="exampleTextarea1" rows="3"></textarea>
                                    <span v-show="errors.has('form-2.Present Address')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Present Address')}" class="animated invalid-feedback">{{errors.first("form-2.Present Address")}}</span>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Home Address</label>
                                <div class="col-sm-9">
                                    <textarea name="Home Address" :class="{'input':true, 'is-invalid': errors.has('form-2.Home Address')}"  v-validate="'required'" class="form-control" v-model="addcor.had" id="exampleTextarea2" rows="3"></textarea>
                                    <span v-show="errors.has('form-2.Home Address')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Home Address')}" class="animated invalid-feedback">{{errors.first("form-2.Home Address")}}</span>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Father's</label>
                                <div class="col-sm-9">
                                    <input name="Fathers Fullname" :class="{'input':true, 'is-invalid': errors.has('form-2.Fathers Fullname')}"  v-validate="'required'" class="form-control" v-model="addcor.ffullname" >
                                    <span v-show="errors.has('form-2.Fathers Fullname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Fathers Fullname')}" class="animated invalid-feedback">{{errors.first("form-2.Fathers Fullname")}}</span>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mother's</label>
                                <div class="col-sm-9">
                                    <input name="Mothers Fullname" :class="{'input':true, 'is-invalid': errors.has('form-2.Mothers Fullname')}"  v-validate="'required'" class="form-control" v-model="addcor.mfullname" rows="1">
                                    <span v-show="errors.has('form-2.Mothers Fullname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Mothers Fullname')}" class="animated invalid-feedback">{{errors.first("form-2.Mothers Fullname")}}</span>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Father's </label>
                                <div class="col-sm-9">
                                    <input  name="Fathers Fullname" :class="{'input':true, 'is-invalid': errors.has('form-2.Fathers Fullname')}"  v-validate="'required'" type="text" v-model="addcor.ffullname" placeholder="Surname/Firstname/Middlename" class="form-control">
                                    <span v-show="errors.has('form-2.Fathers Fullname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Fathers Fullname')}" class="animated invalid-feedback">{{errors.first("form-2.Fathers Fullname")}}</span>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Father's </label>
                                <div class="col-sm-9">
                                    <input  name="Fathers Fullname" :class="{'input':true, 'is-invalid': errors.has('form-2.Fathers Fullname')}"  v-validate="'required'" type="text" v-model="addcor.ffullname" placeholder="Surname/Firstname/Middlename" class="form-control">
                                    <span v-show="errors.has('form-2.Fathers Fullname')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Fathers Fullname')}" class="animated invalid-feedback">{{errors.first("form-2.Fathers Fullname")}}</span>
                                
                                </div>
                                </div>
                            </div>
                        </div> -->

                        
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Place of Birth</label>
                            <div class="col-sm-9">
                                <textarea name="Place of Birth" :class="{'input':true, 'is-invalid': errors.has('form-2.Place of Birth')}"  v-validate="'required'" class="form-control" v-model="addcor.pob"   rows="3"></textarea>
                                <span v-show="errors.has('form-2.Place of Birth')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.Place of Birth')}" class="animated invalid-feedback">{{errors.first("form-2.Place of Birth")}}</span>
                            
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">School Last Attended</label>
                            <div class="col-sm-9">
                                <textarea name="School Last Attended" :class="{'input':true, 'is-invalid': errors.has('form-2.School Last Attended')}"  v-validate="'required'" class="form-control" v-model="addcor.lastschool"  rows="3"></textarea>
                                <span v-show="errors.has('form-2.School Last Attended')" style="font-size:10px" :class="{'input': true, 'flash': errors.has('form-2.School Last Attended')}" class="animated invalid-feedback">{{errors.first("form-2.School Last Attended")}}</span>
                            
                            </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">School Year</label>
                            <div class="col-sm-9 col-md-3">
                                <input type="number" class="form-control" v-model="from" placeholder="from">
                            
                            </div>
                            <div class="col-sm-9 col-md-3">
                                <input type="number" disabled class="form-control" v-model="to"  placeholder="to">
                            </div>
                            </div>
                        </div> -->
                        
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" v-model="password" autocomplete="off" class="form-control" placeholder="Desire Password -Optional">
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
                    </form>
                    </div>
 
                    </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <button v-if="!addsave" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-if="!addsave" @click="validateForm('form-1')" type="button" class="btn btn-primary">Next</button>
                            <button v-if="addsave" @click="returnadd" type="submit" class="btn btn-light">Return</button>
                            <img v-if="addsave && addingloading"  src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
                            <button v-if="addsave && !addingloading" @click="validateForm1('form-2')" type="submit" class="btn btn-success">Add Student</button>
                        </div>
                </div>
            </div>
        </div>
                    
        <div class="modal fade scrollbar-pink" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">College of {{getdetails.name}} Information
                            <!-- <span class="card-description" style="font-size:12px;">(School Year: 2017-2018)</span> -->
                            </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card">
                    <div class="card-header white">
                        <div class="media">
                        <img :src="getdetails.srclogo" alt="Department Logo" height="80px" width="80px" class="mx-5 my-2 " style="border-radius: 50%;">
                        <i style="font-size:24px" class="mdi mdi-clipboard-account text-info d-flex align-self-start mr-3"></i>
                        <div class="media-body col-sm-0">
                        <p class="card-text mt-2">{{getdetails.stotal}} Registered Students</p>
                        </div>
                    </div>
                    
                    <div class="card-body">
                    <h4 class="card-title">Department Description</h4>
                    <div class="media">
                        <i class="mdi mdi-information-variant icon-md text-info d-flex align-self-start mr-3"></i>
                        <div class="media-body">
                        <p class="card-text text-success">Associate Dean: {{getdetails.dean}}</p>
                            
                        <p class="card-text">{{getdetails.description}}</p>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                  
                    </div>
                    <div class="modal-footer">
                        <button v-if="!addsave" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
            
        <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
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
        </div> -->

            
            <img :src="'/departmentlogo/'+datadepartment.logo" class="mr-2 mb-2 " alt="Department Logo" height="60px" width="60px" style="border-radius:50%;">
            <!-- <img :src="'/departmentlogo/'+datadepartment.logo" class="mr-2 mb-2 " alt="Department Logo" height="60px" width="60px" style="border-radius:50%;"> -->

            <h4 class="card-title mb-3" style="margin-top:-60px;margin-left:70px"> 
                {{datadepartment.name}}  
                 <i @click="$emit('getdetails',datadepartment)" class=" mdi mdi-information-outline addbtn" style="font-size:20px;cursor:pointer" data-toggle="modal" data-target="#exampleModal2"></i>

            </h4> 
            <br>
            <div class="pull-right row mx-2">
            <input type="" class="  form-control"  v-model="search" placeholder="Search Id No...">
            </div>
            <hr>
            <!-- <div class="row mt-2">
                <div class="col-md-12">
                    <i style="font-size:36px" class="grey-text float-left mdi mdi-account-plus"></i>
                    <i style="font-size:36px" class="grey-text float-right mdi mdi-account-search"></i>
                    
                </div>

            </div> -->
                
                <!-- <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="#000000" d="M20,2A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H6L2,22V4C2,2.89 2.9,2 4,2H20M11,6V9H8V11H11V14H13V11H16V9H13V6H11Z" />
                        </svg> -->

              
               
                <!-- <i style="font-size:25px;" class="ml-2 mdi mdi-account-multiple text-info"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span> 
                <i style="font-size:25px;" class="ml-2 mdi mdi-account text-success"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span> 
                <i style="font-size:25px;" class="ml-2 mdi mdi-account text-danger"></i><span class="grey-text" style="font-size:15px"> {{datadepartment.stotal}}</span>  -->
                        <!-- <div class="input-group-addon bg-transparent border-0 search-button">
                            <button type="submit" class="btn btn-sm bg-transparent px-0">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </button>
                        </div> -->

            
        

            
            <div class="table-responsive scrollbar-pink"  style="height:410px;margin-top:-40px;">
            <table class="table-striped table table-hover" >
                        <thead>
                        <tr>
                            <th>Id No.</th>
                            <th>Fullname</th>
							
                            <th></th>
                        </tr>
                        </thead>
                        <tbody > 
                        <studentslist v-bind:checked="checkedNames" v-on:refresh="fetchStudentsdataref" v-on:deleteStudent="deleteStudent" v-bind:getcor="getcor" v-on:getStudent="getStudent" v-if="studentlist.department==datadepartment.name" v-bind:list="studentlist" :key="studentlist.id" v-for="studentlist in filteredList"></studentslist>
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

import VeeValidate from 'vee-validate'
Vue.use(VeeValidate);
export default {
    name: 'scopes-example',
    data(){
        return{
            datasubmitteds:[],
            addingloading:false,
            search:'',
            checkedNames:[],
            addsave:false,
            studentlists:[],
            from:'',
            to:'',
            password:'',
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
                id:'',
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
        
        validateForm(scope) {
        this.$validator.validateAll(scope).then((result) => {
            if (result) {
            // eslint-disable-next-line
            this.addsave=true;
            }
        });
        },
        validateForm1(scope) {
        this.$validator.validateAll(scope).then((result) => {
            if (result) {
            // eslint-disable-next-line
            this.createStudentdata();
            }
        });
        },
        clearCor(){
            this.addcor.idno=""
            this.addcor.first=""
            this.addcor.second="" 
            this.addcor.last=""
            this.addcor.semester=""
            this.addcor.dob="" 
            this.addcor.em=""
            this.addcor.contactn=""
            this.addcor.sex=""
            this.addcor.yearlevel=""
            this.addcor.pad=""
            this.addcor.had=""
            this.addcor.ffullname=""
            this.addcor.mfullname=""  
            this.addcor.department=""
            this.addcor.lastshool=""
            // this.addcor.sy=""
            this.addcor.pob=""
            this.addcor.department=""
            this.password=""
        },
        returnadd(){
            this.addsave=false;
        },
        fetchStudentsdata(){
            axios.get('studentsdata').then(response=>{
                this.studentlists=response.data.studentlists;
                setTimeout(this.fetchStudentsdata,1000);
                
                }
            )
            // console.log(this.datadepartment.name);
        },
        fetchStudentsdataref(){
            axios.get('studentsdata').then(response=>{
                this.studentlists=response.data.studentlists;
                console.log("refresh");
                
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
            this.addingloading=true;    
            let vm=this;
            this.addcor.sy=this.from;
            this.addcor.department=this.getdetails.name;
            console.log(this.addcor)
            axios.post('studentsdata',this.addcor).then(response=>{
                // this.fetchStudentsdata();   
                this.clearCor();
                this.fetchStudentsdataref();
                this.$toastr('add', 
                    { 
                        title: 'Successfully Added ', 
                        msg: '', 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'success' 
                    }
                );
                this.addsave=false;
                this.addingloading=false;    
               
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
                        alert('load your page, wla guro connection');
                        
                    }
                }
            })
        },
        getStudent(list){
                this.getcor.id=list.id;
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
                this.getcor.lastschool=list.lastschool;
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
                    position: 'toast-top-right', 
                    type: 'success' 
                }
            ) 
        }
    },
    computed:{
  
        filteredList() {
            return this.studentlists.filter(studentslist => {
                return studentslist.idno.toLowerCase().includes(this.search.toLowerCase())
                    })
        }
    }

}
</script>

<style lang="scss">
.jiesd{
    position: absolute;
    top: 25%;
    right: 0;
    width: 5px;
    height: 5px;
    background-image: linear-gradient(300deg, #ff5858, #f09819);
    border-radius: 100%;
}
</style>
