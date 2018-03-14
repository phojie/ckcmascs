<template>
<div class="content-wrapper " >
    <div class="">
        <center>
            <!-- <img   height="100px" style="margin-top:20%" src="images/loading1.gif"  alt=""> -->
        </center>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Requirements</h4>
                      <p class="card-description">
                        
                      </p>
                      <form method="post" @submit.prevent="addRequire" class="forms-sample">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Title</label>
                          <div class="col-sm-9">
                            <input type="text" v-model="inputrequired.name" class="form-control" id="exampleInputEmail2" placeholder="Enter req. title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <input type="text" v-model="inputrequired.description"  class="form-control" id="exampleInputPassword2" placeholder="Enter the description">
                          </div>
                        </div>
                        <button class="pull-right mr-3 btn btn-light">Cancel</button>
                        <button type="submit" class="pull-right btn btn-success mr-2">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List of Requirements</h4>
                  <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          Delete
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Description
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                            <listsreq v-on:refresh="fetchRequire" :key="requirement.id" v-for="requirement in requirements"  v-bind:list="requirement"></listsreq>
                    </tbody>
                  </table>
                    <!-- <li @mouseover="showbtn" @mouseleave="hidebtn">{{requirement.description}} <i v-if="showdel" class="mdi mdi-delete-circle icon-sm text-danger"></i></li> -->
                </div>
              </div>
            </div>
            
                  
        </div>

        <!-- <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Secretary Accounts</h4>
                      <p class="card-description">
                        
                      </p>
                      <form class="forms-sample">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter req. name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Enter the description">
                          </div>
                        </div>
                        <button class="pull-right mr-3 btn btn-light">Cancel</button>
                        <button type="submit" class="pull-right btn btn-success mr-2">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title text-primary">Accounts List</h4>
                   
                    </div>
                </div>
            </div>
            
                  
        </div> -->
    </div>
    <div v-if="type=='3' && user=='Finance'" class="">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <button v-if="active=='0'" style="cursor:pointer" @click="activate" type="button" class="pull-right btn btn-success mr-2">Activate Clearances</button>
                <button v-if="active=='1'" style="cursor:pointer" @click="deactivate" type="button" class="pull-right btn btn-danger  mr-2">Deactivate Clearances</button>
            </div>
        </div>
    </div>  
</div>  

</template>

<script>

import listsreq from './fetchreq'
export default {
    components:{listsreq},
    data(){ 
        return{
            user:'',
            active:'',
            type:'',
            requirements:[],
            inputrequired:{
                name:'',
                description:''
            }       
        }
    },
    created(){
        this.fetchRequire();
    },
    methods:{
      
        fetchRequire(){
            axios.get('requirementdata').then(response=>{
                this.requirements=response.data.rlists;
            }),
            axios.get('registrardata').then(response=>{
                this.type=response.data.type;
                this.user=response.data.user;
            }),
            axios.get('activitylog').then(response=>{
                this.active=response.data.ac;
            })

          
        },
        addRequire(){
            axios.post('requirementdata',this.inputrequired).then(response=>{
                this.fetchRequire();
                this.inputrequired.name='';
                this.inputrequired.description='';
            })
        },
        activate(){
            axios.post('/act').then(response=>{
                this.fetchRequire()
            })
        },
        deactivate(){
            axios.post('/act').then(response=>{
                this.fetchRequire()
            })
        }
    }
}
</script>
