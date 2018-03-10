<template>
  <div class="content-wrapper " >
    <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center>

    <div class="row">
        <div v-if="!loadarea"  class="col-md-12 stretch-card grid-margin">
                <!-- <div class="card text-white  bg-gradient-success" style="height:40px;">
                <div class="card-body"> -->
                    <input type="text" v-model="searchof" class="col-md-5 form-control" placeholder="Search Office" aria-label="Username" aria-describedby="colored-addon3">
                    <button data-toggle="modal" data-target="#addof" style="cursor:pointer" type="button" class="offset-2 col-md-3 btn-rounded btn btn-success"><i class="mdi mdi-account-multiple-plus"></i>Add new Office</button>
                <!-- </div>
                </div> -->
        </div>
    </div>
    <div class="row">
       <fetchoffice v-on:refresh="fetchoffice" v-bind:getof="getoffice" v-bind:get="office" :key="office.id" v-on:getd="getdetails"  v-for="office in filteredList" ></fetchoffice>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="addof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add new Office</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Office Registration Form</h4>
                  <p class="card-description">
                    <!-- Basic form elements -->
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Office Name</label>
                      <input type="text" v-model="newoffice.name" class="text-capitalize form-control" id="exampleInputName1" placeholder="Office Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Assign</label>
                      <input type="text" v-model="newoffice.assign" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Assign Fullname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="text" v-model="newoffice.email" class="text-capitalize form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Location</label>
                      <textarea class="form-control text-capitalize" v-model="newoffice.location" id="exampleTextarea1" rows="3"></textarea>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button style="cursor:pointer" v-if="!addingloading"  type="button" @click="createOffice" class="btn btn-primary">Save</button>
            <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
        </div>
        </div>
    </div>
    </div>
                
  </div>
</template>

<script>
import fetchoffice from './fetchoffice'
export default {
    components:{fetchoffice},
    data(){
      return{
          addingloading:false,
          loadarea:true,
          offices:[],
          searchof:'',
          newoffice:{
              name:'',
              assign:'',
              email:'',
              location:''
          },
          getoffice:{
              name:'',
              assign:'',
              email:'',
              location:''
          }
          
      }
    },
    methods:{
        createOffice(){
            this.addingloading=true;
            axios.post('officedata',this.newoffice).then(response=>{
                if(response.data.updatenow='update'){
                    this.addingloading=false
                    this.fetchoffice()
                    this.newoffice.name=''
                    this.newoffice.assign=''
                    this.newoffice.email=''
                    this.newoffice.location=''

                    this.$toastr('add', 
                        { 
                            title: 'Successfully Added', 
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
        fetchoffice(){
            axios.get('/officedata').then(
                response=>{
                    this.offices=response.data.officedata
                    this.loadarea=false
                }
            )
        },
        getdetails(get){
            this.getoffice.name=get.name;
            this.getoffice.assign=get.assign;
            this.getoffice.email=get.email;
            this.getoffice.location=get.location;
            
        }
    },
    created(){
        this.fetchoffice();
    },
    computed:{
        filteredList() {
        return this.offices.filter(office => {
            return office.name.toLowerCase().includes(this.searchof.toLowerCase())
                })
            }
    }
}
</script>
