<template>





    <!--Card-->
    <div class="card mb-5 mx-4" style="width:320px;height:400px;">
        <div class="offset-10  mt-1">
            
        <i  v-on:click="$emit('getdetails',datadepartment)"  class="fa fa-cog color2text akongtext" data-target="#updatedep" data-toggle="modal" style="font-size:14px;cursor:pointer" aria-hidden="true"></i>
        <i  v-if="!samok"  v-on:click="$emit('getdetails',datadepartment)" data-target="#modalConfirmDelete" data-toggle="modal" class="fa fa-close color2text akongbtndangertext" style="font-size:15px;cursor:pointer" aria-hidden="true"></i>
        <i  v-if="samok"  v-on:click="$emit('getdetails',datadepartment)"  class="fa fa-close color2text akongtext" style="font-size:15px;cursor:pointer" aria-hidden="true"></i>
        
        </div>
        <!--Card image-->
        <center class="mt-3">
        <img style="height:150px;width:150px;" :src="'/departmentlogo/'+datadepartment.logo"  class=" img-fluid rounded-circle z-depth-0" alt="Department Logo">
        </center>
        <!--Card content-->
        <div class="card-body">
            <!--Title-->
            <h5 class="card-title font-weight-bold" style="color:#37474F;"><i class="fa fa-globe  color1text" style="font-size:20px;" aria-hidden="true"></i> Department of {{datadepartment.name}}</h5>
            <h5 class="card-title" style="color:#37474F;"><i class="fa fa-user-o  color1text" style="font-size:20px;" aria-hidden="true"></i> {{datadepartment.dean}}</h5>
            
            <!--Text-->
            <b></b>
            <center>
            <a v-on:click="$emit('getdetails',datadepartment)"  data-target="#centralModalInfo" data-toggle="modal" class="btn color2 akongbtn" style="padding:5px 10px;font-size:12px;">List of Personnel</a>
            
            <a v-on:click="$emit('getdetails',datadepartment)"  data-target="#centralModalInfo" data-toggle="modal" class="btn color2 akongbtn" style="padding:5px 10px;font-size:12px;">More Details</a>
            </center>
        </div>

        <!--Modal: modalConfirmDelete-->
    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="red modal-dialog modal-md modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div  style="height:50px;" class="color1 darken-1 d-flex justify-content-center">
                    <p class="heading mt-2">Are you sure you want to delete this department?</p>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <center>
    <!-- <div :style="bgdp" style="height:150px;width:150px;"   class="animated rotateIn img-fluid rounded-circle z-depth-0" alt="Department Logo"></div> -->
                 <img :src="de.srclogo" alt="image"  class="animated flip img-fluid rounded-circle z-depth-0"  style="height:150px;width:150px;"   >
                    </center>
                </div>
                        <p class="black-text"><small class="red-text">Note!</small> <small >Department of <span class="color1text">{{de.name}} and its Personnel</span>will be permanently deleted </small></p>
                <!--Footer-->
                <div class="modal-footer flex-center">
                    <!-- <div class="form-group" >
                        <input type="checkbox" @change="check" v-model="checksamok" id="checkbox2">
                        <label for="checkbox2" class="">Do not show this message again</label>
                        {{checksamok}}
                    </div>
                     -->
                    <a v-on:click="$emit('delete-department',de)" data-dismiss="modal" class="btn  btn-outline-secondary-modal">Yes</a>
                    <a type="button" class="btn btn-sm btn-primary-modal waves-effect" data-dismiss="modal">No</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->

    <!-- modal update-->
        


    <div style="overflow:hidden" class="modal fade" id="updatedep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title color2text"  id="exampleModalLabel">Edit department</h5>
                    <div class="mr-4 offset-2">
                    <div v-if="validation" v-bind:class="[moshake]" class="mb-4 animated chip " style="height:30px;padding:3px 10px; ">
                        <small class="text-center red-text fontnku ">All fields are required!</small><i @click="validation=false"  style="font-size:15px;margin-top:-10px;" class=" close fa fa-times"></i>
                    </div>
                    <div v-if="success" v-bind:class="[mosuccess]" class="mb-4 animated chip " style="height:30px;padding:3px 10px; ">
                        <small class="text-center green-text fontnku ">Successfully Updated!</small><i @click="success=false"  style="font-size:15px;margin-top:-10px;" class=" close fa fa-times"></i>
                    </div>
                    </div>
                    
                </div>



                <div class="modal-body">
                    
                    <!-- Form contact -->
                    <form v-on:submit.prevent="evalidate(datadepartment,de)"  @keydown="mwlaangalert" method="post">

                        <!-- <div class="md-form">
                            <i class="fa fa-tag prefix grey-text"></i>
                            <input type="file" id="form3" class="form-control">
                            <label for="form3">Department Logo</label>
                        </div> -->

                        <div class="md-form">
                            <i class="fa fa-tag prefix grey-text"></i>
                            <input type="text" autocomplete="off" v-model="de.name" id="form3" class="form-control">
                            <label class="active" for="form3">Department name</label>
                        </div>


                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" autocomplete="off"  v-model="de.dean" id="form32" class="form-control">
                            <label class="active" for="form34">Associate dean</label>
                        </div>

                        <div class="md-form">
                            <i class="fa fa-pencil prefix grey-text"></i>
                            <textarea type="text" autocomplete="off"  v-model="de.description" id="form8" class="md-textarea" style="height: 100px"></textarea>
                            <label class="active" for="form8">Description...</label>
                        </div>

                        <div class="md-form" >
                            <i class="fa fa-picture-o prefix grey-text"></i>
                            <input :value="none" type="file" style="height:30px;padding:1px;" class=" mt-2"  title="Load Department logo " @change="onFileChange">
                            <!-- <label class="mt-4" >Department logo</label> -->
                            <br>
                        </div>


                <div class="modal-footer">
                        <div class="text-center">
                                <button type="submit" class="btn color1">Update <i class="fa fa-check ml-1"></i></button>
                        </div>
                </div>
                        
                        

                    </form>
                    <!-- Form contact -->
                </div>
                
            </div>
        </div>
    </div>

        <!-- exitmodal -->


    <!-- Central Modal Medium Info -->
    <div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify " role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div  style="height:50px;" class="color1 darken-1 d-flex modal-header  ">
                    <p class="heading lead" style="margin-top:-8px;">Department of {{de.name}} details</p>
    
                    <button style="margin-top:-20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
    
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                         <img style="height:130px;width:130px;" :src="de.srclogo"  class="animated rotateIn img-fluid rounded-circle z-depth-0" alt="Department Logo">
                            <br>   <br> 
                            <br>
                        <p class="">{{de.description}}Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
                            ab officiis totam.</p>
                    </div>
                    <hr>
                    <p>Date Registered: {{de.createdat}}</p>
                    
                </div>

    
                <!--Footer-->
               
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Info-->
    </div>
    <!--/.Card-->


    

    


</template>

<script>
export default {
    props:['datadepartment','de'],
    data(){
        return{
            none:'',
            search:'',
            image:'s',
            filepic:'',
            moshake:'',
            mosuccess:'',
            success:false,
            validation:false,
            srcimg1:"",
            srcimg:"",
            bgdp:"",
            debgdp:"",
            checksamok:false,
            samok:false,
            jie:''
        }
    },
    created(){
               
        
    },
    methods:{
        evalidate(datadepartment,de){
            this.de.logo=this.image;
            if (this.de.name == "" || this.de.dean == "" || this.de.description == "" ){
                this.moshake='shake';
                this.validation=true;
                this.success=false; 
            }
            else{
                this.updateDepartment(datadepartment,de);
                
            }
        },
        updateDepartment(olddatadepartment,newdatadepartment){
            this.de.logo=this.image;
            this.$http.patch("/departmentdata/" + newdatadepartment.id,newdatadepartment).then(response=>{
            
            this.$emit('refresh');
            
            console.log(response.data);
            });
            this.mosuccess='flipInY';
            this.success=true;
            this.validation=false;
        },
        deletethis(){
            
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

