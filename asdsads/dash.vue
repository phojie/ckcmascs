<template>
<div class="content-wrapper " >
    <div :key="registrardata.id" v-for="registrardata in registrardatas" >
        <div class="row ">
        <div class="col-md-4 stretch-card grid-margin " >
            <div class="card  text-white" style="height:130px;background-color:#37474F">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Students</h4>
                <h2 class="font-weight-normal mb-5"> 15,00000</h2>
                <!-- <p class="card-text">Incresed by 60%</p> -->
            </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card text-white" style="height:130px;background-color:#4B515D">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Subjects</h4>
                <h2 class="font-weight-normal mb-5">45633456</h2>
            </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card  text-white" style="height:130px;background-color:#3F729B">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Pending Clearances</h4>
                <h2 class="font-weight-normal mb-5">955741235</h2>
            </div>
            </div>
        </div>
        </div>
        
        <!-- <div class="row">
        <div class="col-lg-12 grid-margin stretch-card" >
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Updates from your Subjects</h4>
                <div class="d-flex">
                <div class="d-flex align-items-center mr-4 text-muted">
                    <i class="mdi mdi-account icon-sm mr-2"></i>
                    <span>{{registrardata.first}} {{registrardata.last}}</span>
                </div>
                <div class="d-flex align-items-center text-muted">
                    <i class="mdi mdi-calendar-blank icon-sm mr-2"></i>
                    <span>October 3rd, 2018</span>
                </div>
                </div>
                
                <div class="d-flex mt-5 align-items-top">
                <img src="ckcmascs/images/faces/face3.jpg" class="img-sm rounded-circle mr-3" alt="image">
                <div class="mb-0 flex-grow">
                    <p class="font-weight-bold mr-2 mb-0">Jack Manque </p>
                    <p>Cleared his Clearance</p>
                </div>
                <div class="ml-auto">
                    <i class="fa fa-check-circle " style="color:#00C851"></i>
                </div>
                </div>
                
            </div>
            </div>
        </div>
        </div> -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Status</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                            Id No.
                            </th>
                            <th>
                            Subject
                            </th>
                            <th>
                            Assignee
                            </th>
                            <th>
                            Status
                            </th>
                            <th>
                            Department
                            </th>
                            <th>
                            Last Update
                            </th>
                    
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            5669
                            </td>
                            <td>
                            Fund is not recieved
                            </td>
                            <td class="py-1">
                            <img src="ckcmascs/images/faces/face1.jpg" class="mr-2" alt="image">
                            David Grey
                            </td>
                            <td>
                            <label class="badge  light-green accent-2">CLEARED</label>
                            </td>
                            <td>
                            Dec 5, 2017
                            </td>
                            <td>
                            WD-12345
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                            5670
                            </td>
                            <td>
                            High loading time
                            </td>
                            <td class="py-1">
                            <img src="ckcmascs/images/faces/face2.jpg" class="mr-2" alt="image">
                            Stella Johnson
                            </td>
                            <td>
                            <label class="badge  yellow accent-2">PROGRESS</label>
                            </td>
                            <td>
                            Dec 12, 2017
                            </td>
                            <td>
                            WD-12346
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                            5671
                            </td>
                            <td>
                            Website down for one week
                            </td>
                            <td class="py-1">
                            <img src="ckcmascs/images/faces/face3.jpg" class="mr-2" alt="image">
                            Marina Michel
                            </td>
                            <td>
                            <label class="badge   red accent-2">ON HOLD</label>
                            </td>
                            <td>
                            Dec 16, 2017
                            </td>
                            <td>
                            WD-12347
                            </td>
                        
                        </tr>
                        <tr>
                            <td>
                            5672
                            </td>
                            <td>
                            Loosing control on server
                            </td>
                            <td class="py-1">
                            <img src="ckcmascs/images/faces/face4.jpg" class="mr-2" alt="image">
                            John Doe
                            </td>
                            <td>
                            <label class="badge  light-green accent-2">CLEARED</label>
                            </td>
                            <td>
                            Dec 3, 2017
                            </td>
                            <td>
                            WD-12348
                            </td>
                            
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Department Status</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr >
                            <th>
                            #
                            </th>
                            <th>
                            Department Name
                            </th>
                            <th>
                            Overall Progress
                            </th>
                            <th>
                            Total Students
                            </th>
                            <th>
                            Pending
                            </th>
                            <th>
                            Cleared
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <fetch  v-bind:datadepartment="datadepartment" v-for="datadepartment in datadepartments" :key="datadepartment.id"></fetch>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>  

</template>

<script>

import fetch from './departmentfetch'
export default {
    components:{fetch},
    data(){
        return{
            registrardatas:[],
        	datadepartments:[]

        }
    },
    created(){

        this.fetchUser();
    },
    methods: {
        fetchUser(){
            axios.get('registrardata').then(
                response=>{
                    this.registrardatas=response.data.registrardata
                    setTimeout(this.fetchUser(), 100); 
                    
                }
            ),
            axios.get("departmentdata").then(
                response=>{
                    this.datadepartments=response.data.datadepartments2;
                }
            )
            
        },
        
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit()
        },
    },
    mounted() {
        this.csrf = window.myToken.csrfToken
    }
}
</script>
