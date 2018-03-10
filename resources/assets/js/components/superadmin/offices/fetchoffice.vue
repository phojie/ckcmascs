<template>
   <div class="col-md-3 grid-margin">
        <div class="card" style="height:300px;border-top:3px solid #37474F;">
            <div class="card-body" style="margin-top:-10px">

                 <div class="float-right">
                        <i  v-on:click="$emit('getd',get)"  data-toggle="modal" data-target="#deleteof" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-delete-sweep menu-icon"></i>
                    </div>

                    <div class="float-left">
                        <i  v-on:click="$emit('getd',get)"  data-toggle="modal" data-target="#updateof" style="cursor:pointer;font-size:20px" class="addbtn mdi mdi-account-settings-variant menu-icon"></i>
                    </div>
                    <br>
                    <br>
                    
                <h5 class="card-title">
                    {{get.name}}
                    <!-- <i style="font-size:12px" class="text-gray mdi mdi-information menu-icon"></i>  -->

                </h5>
                <hr>
                
                <p class="text-success card-description">
                    Assignee : {{get.assign}}
                </p>
                <div class="media">
                    <i class="mdi mdi-map-marker icon-md text-info d-flex align-self-start mr-3"></i>
                    <div style='height:90px' class="media-body">
                      <p class="card-text">{{get.location}}</p>
                    </div>
                </div>
                 <!-- <i class="mdi mdi-home-account icon-md text-success"></i>Ivy Jamero -->
                
                <br>
            </div>
        </div>

         <div class="modal fade" id="deleteof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are about to delete Office {{getof.name}}</h5>
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
                       All the that have this Offices will also be deleted .
                    </p>
                   
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button style="cursor:pointer" type="button" data-dismiss="modal" @click="deleteOffice(get)" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
        </div>

          <!-- Modal -->
    <div class="modal fade" id="updateof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">     
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Update {{getof.name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">update Form</h4>
                  <p class="card-description">
                    <!-- Basic form elements -->
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Office Name</label>
                      <input type="text" v-model="getof.name" class="text-capitalize form-control" id="exampleInputName1" placeholder="Office Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Assign</label>
                      <input type="text" v-model="getof.assign" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Assign Fullname">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="text" v-model="getof.email" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Email">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleTextarea1">Location</label>
                      <textarea class="form-control text-capitalize" v-model="getof.location" id="exampleTextarea1" rows="3"></textarea>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button style="cursor:pointer" v-if="!addingloading"  type="button" @click="updateOffice(get,getof)" class="btn btn-primary">Save changes</button>
            <img  v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
        </div>
        </div>
    </div>
    </div>
    </div>
</template>

<script>
export default {
    props:['get','getof'],
    data(){
        return{
            addingloading:false
        }
    },
    methods:{
        updateOffice(oldupdate,newupdate){
            this.addingloading=true
            axios.patch('/officedata/' + newupdate.id, newupdate).then(response=>{
                  if(response.data.updatenow='update'){
                    this.addingloading=false
                    this.$emit('refresh');
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
            })
        },
        deleteOffice(get){
            axios.delete('/officedata/'+get.id).then(response=>{
                if(response.data.updatenow='update'){
                    this.$toastr('add', 
                        { 
                            title: 'Successfully Deleted', 
                            msg: '', 
                            clickClose: true, 
                            timeout: 5000, 
                            position: 'toast-bottom-right', 
                            type: 'success' ,
                        }
                    );
                    this.$emit('refresh');
                    
                }
            })
        }
    }
}
</script>

