<template>

<div class="content-wrapper " >
    <!-- <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center> -->

    <div class="row" >
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
                    Location
                    </th> 
                    <th>
                    
                    </th>
                </tr>
                
                </thead> 
                    <fetchOfficess v-on:getdetails="getdetails" v-bind:officedata="officedata" v-bind:office="office" :key="office.id" v-for="office in uniq1"></fetchOfficess>
                <tbody>
              
                </tbody>
                    
            </table>
                </div>
             </div>
             </div>
         </div>
    </div>



    <div class="row" >
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
                    Description
                    </th> 
                    <th>
                    
                    </th>
                </tr>
                
                </thead> 
                    <fetchsub v-on:getdetails="getdetails2" v-bind:sub="sub" v-bind:subdata="subdata" :key="sub.id" v-for="sub in uniq"></fetchsub>
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
import fetchsub from './fetchreqsub'

export default {
    components:{fetchOfficess,fetchsub},
    data(){
        return{
            subs:[],
            offices:[],
            officedata:{
                user_id:'',
                name:'',
                subject:''
            },
            subdata:{
                user_id:'',
                fullname:'',
                subject:''  
            }
        }
    },
    methods:{
        getdetails(office){
            this.officedata.name=office.name
            this.officedata.user_id=office.user_id
        },
        getdetails2(sub){
            this.subdata.fullname=sub.fullname
            this.subdata.user_id=sub.user_id
            this.subdata.subject=sub.subject
        },
        fetchOffices(){
            axios.get('officedata').then(response=>{
                 this.offices=response.data.officedata
            }),
            axios.get('instructor').then(
                response=>{
                this.subs=response.data.getins
            })
        }
    },
    created(){
        this.fetchOffices()
    },
    computed: {
    uniq () {
        return _.uniqBy(this.subs, 'subject')
        },
    uniq1 () {
        return _.uniqBy(this.offices, 'name')
        },
    }
}
</script>
