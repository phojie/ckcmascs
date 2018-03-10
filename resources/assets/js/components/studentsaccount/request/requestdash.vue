<template>

<div class="content-wrapper " >
    <!-- <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center> -->

    <div class="row" style="height:400px" >
        <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card"><div class="card-body"><h4 class="card-title">List of Offices</h4> <div class="table-responsive">
                <table class="scrollbar-pink table"><thead>
                
                <tr> 
                    <th>
                    Office Name  
                    </th> 
                    <th>
                    Assignee
                    </th> 
                    <th>
                    Description
                    </th> 
                    <th>
                    
                    </th>
                </tr>
                
                </thead> 
                    <fetchOfficess v-on:getdetails="getdetails" v-bind:officedata="officedata" v-bind:office="office" :key="office.id" v-for="office in offices"></fetchOfficess>
                <tbody>
              
                </tbody>
                    
            </table>
                </div>
             </div>
             </div>
         </div>
    </div>


    <div class="row" style="height:400px" >
        <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card"><div class="card-body"><h4 class="card-title">List of Subjects</h4> <div class="table-responsive">
                <table class="scrollbar-pink table"><thead>
                
                <tr> 
                    <th>
                    Subject Code 
                    </th> 
                    <th>
                    Instructor
                    </th> 
                    <th>
                    Location
                    </th> 
                    <th>
                    
                    </th>
                </tr>
                
                </thead> 
                    <!-- <fetchOfficess v-on:getdetails="getdetails" v-bind:officedata="officedata" v-bind:office="office" :key="office.id" v-for="office in offices"></fetchOfficess> -->
                <tbody>
              
                </tbody>
                    
            </table>
                </div>
             </div>
             </div>
         </div>
    </div>
    
   
</div>

</template>

<script>
import fetchOfficess from './fetchreq'

export default {
    components:{fetchOfficess},
    data(){
        return{
            offices:[],
            officedata:{
                user_id:'',
                name:''  
        }
        }
    },
    methods:{
        getdetails(office){
            this.officedata.name=office.name
            this.officedata.user_id=office.user_id
        },
        fetchOffices(){
            axios.get('officedata').then(response=>{
                 this.offices=response.data.officedata
            })
        }
    },
    created(){
        this.fetchOffices()
    }
}
</script>
