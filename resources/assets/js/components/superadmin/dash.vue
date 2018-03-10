<template>
<div class="content-wrapper " >
    <center>
            <img  v-if="loadarea" height="100px" style="margin-top:20%" src="images/loading1.gif"  alt="">
    </center>
    <div :key="admindata.id" v-for="admindata in admindatas" >
        <div class="row ">
        <div class="col-md-3 stretch-card grid-margin " >
            <div class="card  text-white bg-gradient-info text-white" style="height:130px;">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Students</h4>
                <h2 class="font-weight-normal mb-5"> {{countt}}</h2>
                <!-- <p class="card-text">Incresed by 60%</p> -->
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card text-white  bg-gradient-success" style="height:130px;">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Personnel</h4>
                <h2 class="font-weight-normal mb-5">{{staffcount}}</h2>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card  text-white bg-gradient-danger"  style="height:130px">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Departments</h4>
                <h2 class="font-weight-normal mb-5">{{countde}}</h2>
            </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card  text-white bg-gradient-warning" style="height:130px;">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Total Offices</h4>
                <h2 class="font-weight-normal mb-5">{{countoff}}</h2>
            </div>
            </div>
        </div>
        </div>

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
            staffcount:'',
            admindatas:[],
        	datadepartments:[],
            studentslists:[],
            studentscount:'',
            loadarea:true,
            count:'',
            countt:'',
            countde:'',
            countoff:''

        }
    },
    created(){
        this.fetchUser();
    },
    methods: {
        fetchUser(){
            axios.get('admindata').then(
                response=>{
                    this.admindatas=response.data.admindata
                    this.staffcount=response.data.staffcount
                    this.countoff=response.data.countoff
                    this.loadarea=false;
                }
            ),
            axios.get("departmentdata").then(
                response=>{
                    this.datadepartments=response.data.datadepartments2;
                    this.countde=response.data.countde;
                    
                }
            ),
            axios.get('signdata').then(
                response=>{
                    this.count=response.data.count;
                    this.countt=response.data.countt;
                }	
            )
            axios.get("studentsdata").then(
                response=>{
                    this.studentslist=response.data.studentslist;
                    this.studentscount=response.data.count;
                    // setTimeout(this.fetchUser(), 1000); 
                    
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
