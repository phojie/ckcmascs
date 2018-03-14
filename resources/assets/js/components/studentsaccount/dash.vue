<template>
  
<div class="content-wrapper " >
    <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center>

    <div class="row" v-for="getsdata in getsdatas" :key="getsdata.id">
         <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card">
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

                        <fetchoffice   v-bind:office="office" :key="office.id" v-for="office in offices"></fetchoffice>
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
                <button data-toggle="modal" data-target="#print" >Print</button>
                            
                                    <!-- Modal -->
<div class="modal fade" id="print" tabindex="-1"  aria-labelledby="exampleModalLongTitle" >
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card">
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
                        <fetchoffice    v-bind:office="office" :key="office.id" v-for="office in offices"></fetchoffice>
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
                <button v-if="hi" @click="print"  >Print</button>
                            
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

export default {
    components:{fetchoffice},
    data(){
        return{
            hi:true,
            getsdatas:'',
            loadarea:true,
            offices:[]
        }
    },
    methods:{
        print(){
            this.hi=false;
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
            })
        }
    },
    created(){
        this.fetchStudentdata()
    }
}
</script>
