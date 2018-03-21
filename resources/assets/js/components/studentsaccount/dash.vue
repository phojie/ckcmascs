<template>
  
<div class="content-wrapper " >
    <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center>

    <div class="row" v-for="getsdata in getsdatas" :key="getsdata.id">
    <button style="margin-left:30px;"  @click="water(getsdata)" class="btn btn-lg badge badge-gradient-success" data-toggle="modal" data-target="#print" data-backdrop="false" >Print now</button>
    
         <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card" >
                <div class="card-body">
                        <div class="row offset-2">
                            <div class="stretch-card grid-margin">
                                <img src="images/ckcm.png" height="100" wdith="100" alt="">
                            </div>
                            <div class="stretch-card grid-margin">
                                <center>
                                    <p class="lead">CHRIST THE KING COLLEGE DE MARANDING</p>
                                    <br>
                                    
                                    <p>Maranding Lala Lanao del Norte</p>

                                    Clearance for College <br>
                                    S.Y. 2017-2018<br>
                                    {{getsdata.semester}}

                                </center>

                            </div>
                            <div class="ml-5 stretch-card grid-margin">
                                <img src="images/comsci.png" style="margin-top:13px" height="75" width="75" alt="">
                            </div>
                            
                        </div>

                    <center>
                        <div class="row">
                            <div class="col-md-4 ">
                                Name: {{getsdata.fullname}}
                            </div>

                            <div class="col-md-4 ">
                                Course: {{getsdata.department}}
                            </div>

                            <div class="col-md-4">
                                Year: {{getsdata.yearlevel}}
                                
                            </div>


                        </div>
                    </center>
                        <hr>
                            <div class="row">
                                <div class="col-md-12 stretch-card grid-margin">
                                    <div class="col-md-3 offset-md-1">
                                    <B>OFFICE</B>
                                    </div>
                                    <div class="col-md-5">
                                    IN CHARGE
                                    </div>
                                    <div class="col-md-4">
                                    SIGNATURE
                                    </div>
                                </div>
                                
                            </div>

                        <fetchoffice v-if="office.name!='Finance'"  v-bind:office="office" :key="office.id" v-for="office in uniq "></fetchoffice>
                    <hr>
                    <div class="row">
                                <div class="col-md-12 stretch-card grid-margin">
                                    <div class="col-md-3 offset-md-1">
                                    <B>SUBJECTS</B>
                                    </div>
                                    <div class="col-md-5">
                                    INSTRUCTOR
                                    </div>
                                    <div class="col-md-4">
                                    SIGNATURE
                                    </div>
                                </div>
                                
                    </div>
                        <fetchsub  v-bind:sub="sub" :key="sub.id" v-for="sub in uniq1"></fetchsub>

                    
                            
                                    <!-- Modal -->
<div v-if="hidew" class="modal fade" id="print" tabindex="-1" aria-labelledby="exampleModalLongTitle" >
<div class="" style="width:100%;height:100%;margin:0;padding:0;overflow:hidden">
    <div style="height:auto;min-height:400%;border-radius:0" class="">
    <div  class="grid-margin stretch-card" >
            <div class="card" style="height:200%">
            
            <div v-if="ye"  style="position:absolute;z-index:2;opacity: 0.3;width:100%;height:10%" class="card-body">
                <button     @click="print" class="btn btn-primary"  style="border:0px;width:100px;"    >Print</button>
                <button @click="hidenow" data-dismiss="modal" type="button" class="btn btn-danger" style="border:0px" >X</button>
            </div>

            <div  style="position:absolute;z-index:1;opacity: 0.2;width:100%;height:10%" class="card-body">
                
            
        <i class="grey-text" > <span >{{phojie}}</span></i>
            </div>
    
                <div style="" class="mt-5  card-body">
                        <div class="row offset-3">
                            <div class="stretch-card grid-margin">
                                <img src="images/ckcm.png" height="100" wdith="100" alt="">
                            </div>
                            <div class="stretch-card grid-margin">
                                <center>
                                    <p class="lead">CHRIST THE KING COLLEGE DE MARANDING</p>
                                    
                                    <p style="font-size:15px">Maranding Lala Lanao del Norte</p>

                                    Clearance for College <br>
                                    S.Y. 2017-2018<br>
                                    {{getsdata.semester}}

                                </center>

                            </div>
                            <div class="ml-5 stretch-card grid-margin">
                                <img src="images/comsci.png" style="margin-top:13px" height="75" width="75" alt="">
                            </div>
                            
                        </div>

                    <center>
                        <div class="row">
                            <div class="col-md-4 ">
                                Name: {{getsdata.fullname}}
                            </div>

                            <div class="col-md-4 ">
                                Course: {{getsdata.department}}
                            </div>

                            <div class="col-md-4">
                                Year: {{getsdata.yearlevel}}
                                
                            </div>


                        </div>
                    </center>
                        <hr>
                            <div class="row">
                                <div class="col-md-12 stretch-card grid-margin">
                                    <div class="col-md-3 offset-md-1">
                                    <B>OFFICE</B>
                                    </div>
                                    <div class="col-md-5">
                                    IN CHARGE
                                    </div>
                                    <div class="col-md-4">
                                    SIGNATURE
                                    </div>
                                </div>
                                
                            </div>

                        <fetchoffice v-if="office.name!='Finance'"  v-bind:office="office" :key="office.id" v-for="office in uniq "></fetchoffice>
                    <hr>
                    <div class="row">
                                <div class="col-md-12 stretch-card grid-margin">
                                    <div class="col-md-3 offset-md-1">
                                    <B>SUBJECTS</B>
                                    </div>
                                    <div class="col-md-5">
                                    INSTRUCTOR
                                    </div>
                                    <div class="col-md-4">
                                    SIGNATURE
                                    </div>
                                </div>
                                
                    </div>
                        <fetchsub  v-bind:sub="sub" :key="sub.id" v-for="sub in uniq1"></fetchsub>
                                
                            </div>

                            <br>
                            <br>
                            <br>
                            <br>
                            
                </div>
                </div>
                
                </div>
                
    </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
    

</template>

<script>
import fetchoffice from './fetchoffice'
import fetchsub from './fetchsub'
export default {
    components:{fetchoffice,fetchsub},
    data(){
        return{
            hidew:false,
            ye:true,
            hi:true,
            getsdatas:'',
            loadarea:true,
            offices:[],
            subs:[],
            phojie:''
        }
    },
    methods:{
        hidenow(){
            this.hidew=false
        },
        water(getsdata){
            this.hidew=true
            var str = getsdata.fullname+"@ckcm"
            var str2 = str.replace(/\s/g, '');
            this.phojie=str2.repeat(600);
            
        },
        print(){
            window.print();
            
        },
        fetchStudentdata(){
            axios.get('studentsdata').then(
                response=>{
                this.getsdatas=response.data.studentsdata
                this.loadarea=false
            }),
            axios.get('officedata').then(
                response=>{
                this.offices=response.data.officedata
            }),
            axios.get('instructor').then(
                response=>{
                this.subs=response.data.ge
                    setTimeout(this.fetchStudentdata(), 1000); 
                
            })
        }
    },
    created(){
        this.fetchStudentdata()
    },
    computed: {
    uniq () {
        return _.uniqBy(this.offices, 'name')
    },
    uniq1 () {
        return _.uniqBy(this.subs, 'subject')
    }
}
}
</script>
