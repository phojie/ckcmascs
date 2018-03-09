<template>
<div class="content-wrapper " >
    <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center>
  

    <div class="row">
        <div v-if="!loadarea"  class="col-md-12 stretch-card grid-margin">
                <!-- <div class="card text-white  bg-gradient-success" style="height:40px;">
                <div class="card-body"> -->
                    <input type="text" v-model="searchde" class="col-md-5 form-control" placeholder="Search Department" aria-label="Username" aria-describedby="colored-addon3">
                    <button data-toggle="modal" data-target="#addde" style="cursor:pointer" type="button" class="offset-2 col-md-3 btn-rounded btn btn-success"><i class="mdi mdi-account-multiple-plus"></i>Add new Department</button>
                <!-- </div>
                </div> -->
        </div>
    </div>
    <div class="row">
        <fetchde v-on:deletedepartment="deleteDepartment" v-on:refresh="fetchDepartment" v-bind:get="pickedinfo" v-on:getdetails="getdetails" v-bind:data="datade" v-for="datade in filteredList" :key="datade.id"></fetchde>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addde" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add new Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Department Registration Form</h4>
                  <p class="card-description">
                    <!-- Basic form elements -->
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Department Name</label>
                      <input type="text" v-model="newdepartmentform.name" class="text-capitalize form-control" id="exampleInputName1" placeholder="Department Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Dean</label>
                      <input type="text" v-model="newdepartmentform.dean" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Dean Fullname">
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Associate Dean</label>
                      <input type="text" v-model="newdepartmentform.adean" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Associate Dean">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control text-capitalize" v-model="newdepartmentform.description" id="exampleTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Upload Logo</label>
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
            <button style="cursor:pointer" v-if="!addingloading"  type="button" @click="createDepartment" class="btn btn-primary">Save changes</button>
            <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
        </div>
        </div>
    </div>
    </div>
    
</div>
</template>

<script>
import fetchde from './fetchdepartment'
export default {

    components:{fetchde},
    data(){
        return{
            addingloading:false,

            none:'',
            image:'',
            filepic:'',

            searchde:'',
            loadarea:true,
            
            datades:[],
            pickedinfo:{
                id:'',
                name:'',
                adean:'',
                dean:'',
                description:'',
                logo:'',
                srclogo:'',
                createdat:''
            },
            newdepartmentform:{
                name:'',
                dean:'',
                description:'',
                adean:'',
                logo:'',
            },
        }
    },
    methods:{
        createDepartment(){
            this.newdepartmentform.logo=this.image;
            this.addingloading=true;
            axios.post("departmentdata",this.newdepartmentform).then(
                response=>{
                    if(response.data.updatenow=="updated"){
          
                    this.fetchDepartment();
                    this.addingloading=false;
                    this.$toastr('add', 
                        { 
                            title: 'Successfully Added', 
                            msg: 'Department of '+ this.newdepartmentform.name, 
                            clickClose: true, 
                            timeout: 5000, 
                            position: 'toast-bottom-right', 
                            type: 'success' ,
                        }
                    );
                    this.newdepartmentform={ name:'', dean:'', description:'',logo:''};
                    this.none='';

                    // this.$emit('refresh',this.success);

                    // this.datadepartments.push(response.data.insertdepartment);
                    // console.log(response.data);
                    }
                }
            )
        },
        deleteDepartment(datade){
        this.$http.delete("/departmentdata/"+ datade.id).then(response => {
            // let index = this.datades.indexOf(datade);
            // this.datades.splice(index, 1);
            if(response.data.updatenow=="updated"){
            this.fetchDepartment();
            this.$toastr('add', 
                    { 
                        title: 'Successfully Deleted ', 
                        msg: 'Department of '+ datade.name, 
                        clickClose: true, 
                        timeout: 5000, 
                        position: 'toast-bottom-right', 
                        type: 'info' ,
                    }
                );
            }
            })
            
        },
        fetchDepartment(){
            axios.get("departmentdata").then(
                response=>{
                    this.datades=response.data.datadepartments2;
                    this.loadarea=false
                })
        },
        getdetails(datadepartment){
            this.pickedinfo.id=datadepartment.id;
            this.pickedinfo.name=datadepartment.name;
            this.pickedinfo.dean=datadepartment.dean;
            this.pickedinfo.adean=datadepartment.adean;
            this.pickedinfo.description=datadepartment.description;
            this.pickedinfo.logo=datadepartment.logo;
            this.pickedinfo.srclogo="/departmentlogo/"+datadepartment.logo;
            this.pickedinfo.createdat=datadepartment.created;

            
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
    created(){
        this.fetchDepartment();
    },
    computed:{
        filteredList() {
        return this.datades.filter(datade => {
            return datade.name.toLowerCase().includes(this.searchde.toLowerCase())
                })
            }
    }

    
}
</script>

