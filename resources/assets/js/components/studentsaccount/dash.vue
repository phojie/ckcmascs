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
                                    CHRIST THE KING COLLEGE DE MARANDING
                                    <br>
                                    
                                    <p>Maranding Lala Lanao del Norte</p>

                                    Clearance for College <br>
                                    S.Y. {{getsdata.sy}}<br>
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
                                    <div class="col-md-6 offset-md-1">
                                    Registrar
                                    </div>
                                    <div class="col-md-6">
                                    Registrar
                                    </div>
                                </div>


                                 <div class="col-md-12 stretch-card grid-margin">
                                    <div class="col-md-6 offset-md-1">
                                    Registrar
                                    </div>
                                    <div class="col-md-6">
                                    Registrar
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
export default {
    data(){
        return{
            getsdatas:'',
            loadarea:true
        }
    },
    methods:{
        fetchStudentdata(){
            axios.get('studentsdata').then(
                response=>{
                this.getsdatas=response.data.studentsdata
                this.loadarea=false
            })
        }
    },
    created(){
        this.fetchStudentdata()
    }
}
</script>
