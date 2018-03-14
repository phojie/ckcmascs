<template>
    <tr> 
        <td>
        {{office.name}} 
        </td> 
        <td>
        {{office.assign}}
        </td> 
        <td>
        {{office.location}}
        </td> 
        <td>
        <label v-on:click="$emit('getdetails',office)" style="line-height:2;height:30px;cursor:pointer" data-toggle="modal" data-target="#addof" class="badge badge-gradient-secondary">View Requirements</label> 
        </td>

         <!-- Modal -->
    <div class="modal fade" id="addof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">List of Requirements</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Office of {{officedata.name}} </h4>
                  <p class="card-description">
                    <ul class="list-arrow" >
                    <li :key="reqlist" v-if="reqlist.byid == officedata.user_id" v-for="reqlist in reqlists">{{reqlist.description}}</li>
                   
                    </ul>
                  </p>
                  
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            <button style="cursor:pointer" v-if="!addingloading && active=='1'"  type="button" @click="requestNow(officedata)" class="btn btn-primary">Request</button>
            <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
        </div>
        </div>
    </div>
    </div>
    </tr>
</template>
<script>
export default {
    props:['office','officedata'],
    data(){
        return{
            active:'',
            reqlists:[],
            addingloading:false
       
        }
    },
    methods:{
       
        fetchReq(){
            axios.get('requirementdata').then(response=>{
                this.reqlists=response.data.all
            })
            axios.get('activitylog').then(response=>{
                this.active=response.data.ac;
            })
        },
         requestNow(officedata){
             this.addingloading=true
            // alert(officedata.user_id)
            axios.post('requestdata',officedata).then(response=>{
                this.addingloading=false
            })
        }
    },
    created(){
        this.fetchReq()
    }
}
</script>

