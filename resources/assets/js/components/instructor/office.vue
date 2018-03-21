<template>
<div class="content-wrapper " >
    <div class="">
        <center>
            <!-- <img   height="100px" style="margin-top:20%" src="images/loading1.gif"  alt=""> -->
        </center>
        <div class="row">
            <div style="height:300px" class="col-md-6 grid-margin stretch-card">
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
                            <textarea type="text" style="" v-model="inputrequired.description" row="10" class="form-control" id="exampleInputPassword2" placeholder="Enter the description">
                            </textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect42" class="col-sm-3 col-form-label">Subject</label>
                            <div class="col-sm-9">
                                <select v-model="inputrequired.subject" class=" form-control form-control-sm" id="exampleFormControlSelect42">
                                <option v-for="mysub in mysubs" >{{mysub.subject}}</option>
                                </select>
                            </div>
                        </div>
                        <button class="pull-right mr-3 btn btn-light">Cancel</button>
                        <button type="submit" class="pull-right btn btn-success mr-2">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
            <div   class="col-md-6 grid-margin stretch-card table-responsive ">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List of Requirements</h4>
                  <!-- <p class="card-description">Add class <code>.list-arrow</code> to <code>&lt;ul&gt;</code></p> -->
                  <table class="scrollbar-pink table table-bordered " style="height:200px">
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
                        <th>
                          Subject
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

    </div>
</div>  

</template>

<script>

import listsreq from './fetchreq'
export default {
    components:{listsreq},
    data(){
        return{
            mysubs:[],
            requirements:[],
            inputrequired:{
                name:'',
                description:'',
                subject:''
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
            axios.get('subjectdata').then(response=>{
                this.mysubs=response.data.getsubs;
                 
            })
        },
        addRequire(){
            axios.post('requirementdata',this.inputrequired).then(response=>{
                this.fetchRequire();
                this.inputrequired.name='';
                this.inputrequired.description='';
            })
        },
        
    }
}
</script>
