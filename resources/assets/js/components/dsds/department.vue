<template>
    <div style="margin-top:70px;">
        <div class="container-fluid">
            <div class="row mx-md-5 mx-sm-0 mb-3">
                <form class="form-inline offset-9 " style="margin-top:-17px;" >
                    <input  v-model="search"  class=" form-control mr-sm-1 mt-2 waves-effect " type="text" placeholder="Search" aria-label="Search">
                </form>
                <button type="button" style="padding:7px 20px;height:35px;" class="btn-sm color1 lighten-1 btn liwaves-effect waves-light" data-toggle="modal" data-target="#exampleModal" >Add new</button>
                <i id="tigpoint" style="font-size:20px;" class="mt-3 animated flash  fa fa-hand-o-left" aria-hidden="true"></i>
                
                <!-- modal -->
                <div class="offset-4">
                   


                <div style="overflow:hidden" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header mb-3">
                                <h5 class="modal-title" id="exampleModalLabel">Add new department</h5>
                                <div class="mr-4 offset-2">
                                <div v-if="validation" v-bind:class="[moshake]" class="mb-4 animated chip " style="height:30px;padding:3px 10px; ">
                                    <small class="text-center red-text fontnku ">All fields are required!</small><i @click="validation=false"  style="font-size:15px;margin-top:-10px;" class=" close fa fa-times"></i>
                                </div>
                                <div v-if="success" v-bind:class="[mosuccess]" class="mb-4 animated chip " style="height:30px;padding:3px 10px; ">
                                    <small class="text-center green-text fontnku ">Successfully Added!</small><i @click="success=false"  style="font-size:15px;margin-top:-10px;" class=" close fa fa-times"></i>
                                </div>
                                </div>
                                
                            </div>



                            <div class="modal-body">
                              
                                <!-- Form contact -->
                                <form  v-on:submit.prevent="evalidate" @keydown="mwlaangalert" method="post">

                                    <!-- <div class="md-form">
                                        <i class="fa fa-tag prefix grey-text"></i>
                                        <input type="file" id="form3" class="form-control">
                                        <label for="form3">Department Logo</label>
                                    </div> -->

                                    <div class="md-form">
                                        <i class="fa fa-tag prefix grey-text"></i>
                                        <input type="text" autocomplete="off" v-model="newdepartmentform.name" id="form3" class="form-control">
                                        <label for="form3">Department name</label>
                                    </div>


                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <input type="text"  style=" text-transform: Capitalize;" autocomplete="off"  v-model="newdepartmentform.dean" id="form32" class="form-control">
                                        <label for="form34">Associate dean</label>
                                    </div>

                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix grey-text"></i>
                                        <textarea type="text" autocomplete="off"  v-model="newdepartmentform.description" id="form8" class="md-textarea" style="height: 100px"></textarea>
                                        <label for="form8">Description...</label>
                                    </div>
                                  

                                    <div class="md-form" >
                                        <i class="fa fa-picture-o prefix grey-text"></i>
                                        <input :value="none" type="file" style="height:30px;padding:1px;" class=" mt-2"  title="Load Department logo " @change="onFileChange">
                                        <!-- <label class="mt-4" >Department logo</label> -->
                                        <br>
                                    </div>


                            <div class="modal-footer">
                                   <div class="text-center">
                                            <button type="submit" class="btn color1">Save <i class="fa fa-check ml-1"></i></button>
                                    </div>
                            </div>
                                  
                                   

                                </form>
                                <!-- Form contact -->
                            </div>
                           
                        </div>
                    </div>
                </div>
           
                    <!-- exitmodal -->

                
                          
           
               
                </div>
            </div>
            <div class="row mx-5 ">
                <!--Card-->
                <datadepartment v-on:refresh="fetchDepartment" :de="pickedinfo" :key="datadepartment.id" v-on:getdetails="getdetails" v-on:delete-department="deleteDepartment" v-bind:datadepartment="datadepartment" v-for="datadepartment in filteredList">
                
                </datadepartment>

                <!--/.Card-->

            
                
            </div>

      </div>
  </div>
</template>

<script>
import datadepartment from './departmentfetch.vue';
export default {
    data(){
        return{
            none:'',
            search:'',
            image:'',
            filepic:'',
            datadepartments:[],
            moshake:'',
            mosuccess:'',
            success:false,
            validation:false,
            newdepartmentform:{
                name:'',
                dean:'',
                description:'',
                logo:'',
            },
            pickedinfo:{
                id:'',
                name:'',
                dean:'',
                description:'',
                logo:'',
                srclogo:'',
                createdat:''
            }
        }
    },
    components:{datadepartment},
    created(){
        
        this.fetchDepartment(); 
        
    },
    computed:{
        filteredList() {
        return this.datadepartments.filter(datadepartment => {
            return datadepartment.name.toLowerCase().includes(this.search.toLowerCase())
        })
        
        }
    },
    methods:{
        
        getdetails(datadepartment){
            this.pickedinfo.id=datadepartment.id;
            this.pickedinfo.name=datadepartment.name;
            this.pickedinfo.dean=datadepartment.dean;
            this.pickedinfo.description=datadepartment.description;
            this.pickedinfo.logo=datadepartment.logo;
            this.pickedinfo.srclogo="/departmentlogo/"+datadepartment.logo;
            this.pickedinfo.createdat=datadepartment.created;
        },
        deleteDepartment(de){
        this.$http.delete("/departmentdata/"+ de.id).then(response => {
            // let index = this.datadepartments.indexOf(datadepartment);
            // this.datadepartments.splice(index, 1);
            this.fetchDepartment();
            })
        },
        fetchDepartment(){
            axios.get("departmentdata").then(
                response=>{
                    this.datadepartments=response.data.datadepartments2;
                }
                
            )
            
            },
        evalidate(){
            this.newdepartmentform.logo=this.image;
            if (this.newdepartmentform.name == "" || this.newdepartmentform.dean == "" || this.newdepartmentform.description == "" || this.newdepartmentform.logo == ""){
                this.moshake='shake';
                this.validation=true;
                this.success=false; 
            }
            else{
                this.createDepartment();
                
            }
      
        },
        createDepartment(){
            this.newdepartmentform.logo=this.image;
            
            this.$http.post("departmentdata",this.newdepartmentform).then(
                response=>{
                    this.fetchDepartment();
                    this.newdepartmentform={ name:'', dean:'', description:'',logo:''};
                    this.none='';

                    // this.$emit('refresh',this.success);
                   
                    // this.datadepartments.push(response.data.insertdepartment);
                    // console.log(response.data);

                }
            )
            
            this.mosuccess='flipInY';
            this.success=true;
            this.validation=false;
            
            
        },
        mwlaangalert(){
            this.success=false,
            this.validation=false
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
    }
  
}
</script>

<style>
    #tigpoint {
        -webkit-animation-duration: 5s;
        -webkit-animation-iteration-count: infinite;
        }
</style>

