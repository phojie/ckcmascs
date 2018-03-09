<template>
    <div class="col-md-4 grid-margin">
        <div class="card " style="height:490px;border-top:3px solid #37474F;">
            <div class="card-body" style="margin-top:-10px">
                    <div class="float-right">
                        <i v-on:click="$emit('getdetails',data)"  data-toggle="modal" data-target="#update" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-delete-sweep menu-icon"></i>
                    </div>

                    <div class="float-left">
                        <i v-on:click="$emit('getdetails',data)"  data-toggle="modal" data-target="#delete" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-account-settings-variant menu-icon"></i>
                    </div>

                <p style="height:150px" class="card-description">
                <center class=""><img class="rounded-circle" width="150px" height="150px" :src="'/departmentlogo/'+data.logo"  alt="Upload a logo"></center>
                </p>
                <hr>
                <h5 class="card-title">
                    {{data.name}}
                    <!-- <i style="font-size:12px" class="text-gray mdi mdi-information menu-icon"></i>  -->

                </h5>
                <p class="text-success card-description">
                    Dean : {{data.dean}}
                </p>
                <p class="card-description">
                    Associate Dean : {{data.adean}}
                </p>
                <div class="media">
                    <i class="mdi mdi-information icon-md text-info d-flex align-self-start mr-3"></i>
                    <div style='height:90px' class="media-body">
                      <p class="card-text">{{data.description}}</p>
                    </div>
                </div>
                 <!-- <i class="mdi mdi-home-account icon-md text-success"></i>Ivy Jamero -->
                
                <br>

                <button @click="$emit('getdetails',data)"   data-toggle="modal" data-target="#exampleModalLong"  type="button" style="cursor:pointer" class="align-text-bottom btn-block btn btn-dark btn-fw">View Personnel</button>
                    
            </div>
            
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Department of {{get.name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personnel List</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          User
                        </th>
                        <th>
                          Fullname
                        </th>
                        <th>
                          Sujects
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Email
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <fetchstaff v-bind:idde="get.name" v-bind:staff="stafflist" v-for="stafflist in filteredList" :key="stafflist.id"></fetchstaff>

                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <input type="text" v-model="search" class="col-md-5 form-control" placeholder="Search Fullname" aria-label="Username" aria-describedby="colored-addon3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Department of {{get.name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Update Department Form</h4>
                    <p class="card-description">
                        <!-- Basic form elements -->
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                        <label for="exampleInputName1">Department Name</label>
                        <input type="text" v-model="get.name" class="text-capitalize form-control" id="exampleInputName1" placeholder="Department Name">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail3">Dean</label>
                        <input type="text" v-model="get.dean" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Dean">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail3">Associate Dean</label>
                        <input type="text" v-model="get.adean" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Associate Dean">
                        </div>
                        <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control text-capitalize" v-model="get.description" id="exampleTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                        <label>Upload New Logo</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input  @change="onFileChange" :value="none" type="file" class="form-control file-upload-info"  placeholder="Upload Image">
                            <span class="input-group-btn">
                            <!-- <button  class="file-upload-browse btn btn-info"  type="button">Upload</button> -->
                            </span>
                        </div>
                        </div>
                        
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="cursor:pointer" v-if="!addingloading"  type="button" @click="updateDepartment(data,get)" class="btn btn-primary">Save changes</button>
                <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are about to delete the Department of {{get.name}}</h5>
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
                        All the Data that have this department will also be deleted permanently including the Personnel and Students.
                    </p>
                   
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="cursor:pointer" type="button" data-dismiss="modal" @click="$emit('deletedepartment',get)" class="btn btn-danger">Delete</button>
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
    props:['data','get'],
    data(){
        return{
            addingloading:false,
            none:'',
            stafflists:[],
            search:'',
            image:''
        }
    },
    created(){
        this.stafffetch();
    },
    methods:{
        stafffetch(){
            axios.get("staffdata").then(
                response=>{
                    this.stafflists=response.data.datastaffs;
            })
        },
        updateDepartment(olddatadepartment,newdatadepartment){
        this.addingloading=true;
        this.get.logo=this.image;
        this.$http.patch("/departmentdata/" + newdatadepartment.id,newdatadepartment).then(response=>{
            if(response.data.updatenow=="updated"){
                this.$emit('refresh');
                this.addingloading=false;
                this.$toastr('add', 
                        { 
                            title: 'Successfully Updated', 
                            msg: '', 
                            clickClose: true, 
                            timeout: 5000, 
                            position: 'toast-bottom-right', 
                            type: 'success' ,
                        }
                    );
            }
            // if(response.data.updatenow=="updated"){
               
                // console.log(response.data.updated)
            // }
            // alert(response.data.updateno)
            })
        },
        
        
        onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
                },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
        },
        removeImage: function (e) {
           this.image = '';
        }
    },
    computed:{
        filteredList() {
        return this.stafflists.filter(stafflist => {
            return stafflist.fullname.toLowerCase().includes(this.search.toLowerCase())
                })
            }
    },
    
}
</script>
