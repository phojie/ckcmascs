<template>
    <div class="content-wrapper " >
        <div class="">
            <center>
                <!-- <img   height="100px" style="margin-top:20%" src="images/loading1.gif"  alt=""> -->
            </center>
            <div class="row">
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
                               
                                <fetchrequest v-bind:requestdata="request" :key="request.id" v-for="request in requests"></fetchrequest>
                           
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
export default {
    components:{fetchrequest},
    data(){
        return{
            requests:[],
        }
    },
    created(){
        this.fetchrequestdata()
    },
    methods:{

        fetchrequestdata(){
            axios.get('requestdata').then(response=>{
                this.requests=response.data.requestdata;
            })
        }
    }
}
</script>
