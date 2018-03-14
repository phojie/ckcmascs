<template>
    <div class="content-wrapper " >
        <div class="">
            <center>
                <!-- <img   height="100px" style="margin-top:20%" src="images/loading1.gif"  alt=""> -->
            </center>
            <div class="row" style="height:400px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Request Students List</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                                <th>
                                User
                                </th>
                                <th>
                                Full name
                                </th>
                                <th>
                                Id No.
                                </th>
                                <th>
                                Year level
                                </th>
                                <th>
                                Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <fetchrequest v-on:refresh="fetchrequestdata" v-bind:requestdata="request" :key="request.id" v-for="request in requests"></fetchrequest>
                           
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="height:400px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Already Sign List</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                                <th>
                                User
                                </th>
                                <th>
                                Full name
                                </th>
                                <th>
                                Id No.
                                </th>
                                <th>
                                Year level
                                </th>
                                <th>
                                Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <fetchsucc v-on:refresh="fetchrequestdata" v-bind:requestdata="requestdone" :key="requestdone.id" v-for="requestdone in requestdones"></fetchsucc>
                           
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="height:400px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Rejected List</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                                <th>
                                User
                                </th>
                                <th>
                                Full name
                                </th>
                                <th>
                                Id No.
                                </th>
                                <th>
                                Year level
                                </th>
                                <th>
                                Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <fetchreject v-on:refresh="fetchrequestdata" v-bind:requestdata="requestreject" :key="requestreject.id" v-for="requestreject in requestrejects"></fetchreject>
                           
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="height:400px">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Students List (Pending)</h4>
                        <p class="card-description">
                        </p>
                        <table class="table-responsive scrollbar-pink table table-striped">
                            <thead>
                            <tr>
                                <th>
                                User
                                </th>
                                <th>
                                Full name
                                </th>
                                <th>
                                Id No.
                                </th>
                                <th>
                                Year level
                                </th>
                                <th>
                                Department
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                <fetchrest v-on:refresh="fetchrequestdata" v-bind:requestdata="requestrest" :key="requestrest.id" v-for="requestrest in requestrests"></fetchrest>
                           
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
import fetchrequest from './fetchrequest'
import fetchsucc from './fetchsucc'
import fetchreject from './fetchrej'
import fetchrest from './fetchrest'


export default {
    components:{fetchrequest, fetchsucc, fetchreject,fetchrest},
    data(){
        return{
            requests:[],
            requestdones:[],
            requestrejects:[],
            requestrests:[]
            
        }
    },
    created(){
        this.fetchrequestdata()
    },
    methods:{

        fetchrequestdata(){
            axios.get('requestdata').then(response=>{
                this.requests=response.data.requestdata;
                this.requestrests=response.data.rest;
            }),
            axios.get('signdata').then(response=>{
                this.requestdones=response.data.requestsucc;
            })
            axios.get('rejectdata').then(response=>{
                this.requestrejects=response.data.requestreject;
                setTimeout(this.fetchrequestdata(), 1000); 
            })

        }
    }
}
</script>
