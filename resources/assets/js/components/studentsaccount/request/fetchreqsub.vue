<template>
    <tr> 
        <td>
        {{sub.subject}} 
        </td> 
        <td>
        {{sub.fullname}}
        </td> 
        <td>
        {{sub.description}}
        </td> 
        <td>
        <label v-on:click="$emit('getdetails',sub)" style="line-height:2;height:30px;cursor:pointer" data-toggle="modal" data-target="#addsub" class="badge badge-gradient-secondary">View Requirements</label> 
        </td>

         <!-- Modal -->
    <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                  <h4 class="card-title">Office of {{subdata.fullname}} </h4>
                  <p class="card-description">
                    <ul class="list-arrow" >
                    <li :key="reqlist" v-if="reqlist.Subjects == subdata.subject" v-for="reqlist in reqlists">{{reqlist.description}}</li>
                   
                    </ul>
                  </p>
                  
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button style="cursor:pointer" v-if="!addingloading"  type="button" @click="requestNow(subdata)" class="btn btn-primary">Request</button>
            <img v-if="addingloading" src="images/loading1.gif"  class="mx-4"  height="50" style="" alt="">
        </div>
        </div>
    </div>
    </div>
    </tr>
</template>
<script>
export default {
    props:['sub','subdata'],
    data(){
        return{
        addingloading:false,
        reqlists:[],
       
        }
    },
    methods:{
        requestNow(subdata){
             this.addingloading=true
            // alert(officedata.user_id)
            axios.post('requestdata',subdata).then(response=>{
                this.addingloading=false
            })
        },
        fetchReq(){
            axios.get('requirementdata').then(response=>{
                this.reqlists=response.data.all
            })
        },
       
    },
    created(){
        this.fetchReq()
    }
}
</script>

