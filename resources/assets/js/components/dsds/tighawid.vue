<template>
<div>
    <!--Main Navigation-->
    <header :key="admindata.id" v-for="admindata in admindatas">

        <nav style="height:45px;" class="color1 navbar fixed-top navbar-expand-lg navbar-dark ">
            <a class="navbar-brand mx-5 " style="margin-top:-7px;" href="#"><strong>Administrator</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
                        <ul class="navbar-nav mr-auto">
                            <li :class="[activepage0]" class="nav-item">
                                <a  @click="dashactive" class="nav-link waves-effect waves-light" >Dashboard</a>
                            </li>
                            <li :class="[activepage1]" class="nav-item ">
                                <a class="nav-link waves-effect waves-light" @click="departmentactive">Departments <span class="sr-only">(current)</span></a>
                            </li>
                            <li :class="[activepage2]"  class="nav-item">
                                <a class="nav-link waves-effect waves-light" @click="staffactive">Accounts </a>
                            </li>
                            <li :class="[activepage3]"  class="nav-item">
                                <a class="nav-link waves-effect waves-light" @click="officesactive" >Offices</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Accounts 
                                </a>
                                <div class="dropdown-menu dropdown-purple" aria-labelledby="navbarDropdownMenuLink-5">
                                    <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                    <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                    <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                                </div>
                            </li> -->
                        </ul>
                        <ul class="navbar-nav ml-auto nav-flex-icons">
                            <li class="nav-item">
                                <!-- Search form -->
                                <!-- <form class="form-inline">
                                    <input class=" form-control mr-sm-2 mt-2 waves-effect " type="text" placeholder="Search" aria-label="Search">
                                </form> -->

                            </li>
                            <!-- <li class="nav-item">
                                
                                <a class="mt-1 nav-link waves-effect waves-light">1 <i class="fa fa-globe"></i></a>
                            </li> -->
                            <li class="nav-item avatar dropdown">
                                <a  class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{admindata.name}} &nbsp; <img style="height:30px;" src="userprofilepic/nobody_m.128x128.jpg" class="img-fluid rounded-circle z-depth-0"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-purple" aria-labelledby="navbarDropdownMenuLink-5">
                                    <a class="dropdown-item waves-effect waves-light" @click="settingactive">Settings</a>
                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" :value="csrf">
                                        </form>
                                    <a class="dropdown-item waves-effect waves-light" @click="logactive">Activity log</a>
                                    <a @click="logout" class="dropdown-item waves-effect waves-light" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
        </nav>

    </header>
    <!--Main Navigation-->
    <dash v-if="dash"></dash>
    <departmentpage v-if="department"></departmentpage>
    <staffpage v-if="staff"></staffpage>
    <setting v-if="setting"></setting>
    <log v-if="log"></log>
</div>
</template>

<script>
export default {
    data(){
      return{
          admindatas:[],
          activepage0:'active',
          activepage2:'',
          activepage1:'',
          activepage3:'',
          dash:false,
          department:false,
          staff:true,
          setting:false,
          log:false,
          office:false,
          csrf: "",
      }
    },
    created(){
        this.admindataget();
    },
    methods: {
        admindataget(){
            axios.get("admindata").then(
                response=>{this.admindatas=response.data.admindata}
            )
        },
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit()
        },
        dashactive(){
            this.activepage0='active';
            this.activepage1='';
            this.activepage2='';
            this.activepage3='';
            
            this.dash=true;
            this.staff=false;
            this.department=false;
            this.setting=false; 
            this.log=false;
            this.office=false;
            
        },
        staffactive(){
            this.activepage0='';
            this.activepage2='active';
            this.activepage1='';
            this.activepage3='';
            
            this.dash=false;
            this.staff=true;
            this.department=false;
            this.setting=false; 
            this.log=false;
            this.office=false;
            
        },
        departmentactive(){
            this.activepage0='';
            this.activepage3='';
            
            this.activepage2='';
            this.activepage1='active';
            this.dash=false;
            this.department=true;
            this.staff=false;
            this.setting=false; 
            this.log=false;
            this.office=false;
            
            
        },
        settingactive(){
            this.activepage2='';
            this.activepage1='';
            this.activepage3='';
            
            this.activepage0='';
            this.dash=false;
            this.department=false;
            this.staff=false;
            this.setting=true; 
            this.log=false;
            this.office=false;
            
        },
        logactive(){
            this.activepage0='';
            this.dash=false;
            this.activepage2='';
            this.activepage1='';
            this.activepage3='';
            this.department=false;
            this.staff=false;
            this.setting=false; 
            this.log=true;
            this.office=false;
            
        },
        officeactive(){
            this.activepage0='';
            this.dash=false;
            this.activepage2='';
            this.activepage1='';
            this.activepage3='active';
            
            this.department=false;
            this.staff=false;
            this.setting=false; 
            this.log=false  ;
            this.office=true;
            
        }

    },
    mounted() {
        this.csrf = window.myToken.csrfToken
    }
}
</script>
