<template>
<div>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav v-for="admindata in admindatas" :key="admindata.id" class=" navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <!-- <center><a class="navbar-brand brand-logo" href="/">Ckcmascs.cf</a></center> -->
        <a class="navbar-brand brand-logo-mini" href="/"></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="/"><img src="https://scontent.fcgy1-1.fna.fbcdn.net/v/t34.0-12/s851x315/28512235_1892307170841763_1072588819_n.png?efg=eyJpIjoidCJ9&oh=cb86a7f4163d09db1a2c5703ff7506dc&oe=5A9B7DD9" alt="logo"/></a> -->

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
     
        <ul class="navbar-nav navbar-nav-right">
           
   
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img src="ckcmascs/images/faces-clipart/pic-1.png" alt="image">
                <!-- <img :src="ckcmascs/images/faces-clipart/pic-1.png" alt="image"> -->
                
                <!-- <span class="d-none d-lg-inline"> {{admindata.first}} {{admindata.last}}</span> -->
                <span class="d-none d-lg-inline special-color-text " style="font-size:15px;">Administrator</span>
                
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                <!-- <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        <input type="hidden" name="_token" :value="csrf">
                    </form>
                <a class="dropdown-item" href="#" @click="logout">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
                </a>
            </div>
            </li>
     
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
        </div>
    </nav>
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper ">
        <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class=" special-color sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            <li class="nav-item" :class="active1">
                <a class="nav-link " href="#" @click="pageactivedash">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
           
            <li class="nav-item" :class="active2">
                <a class="nav-link" href="#" @click="pageactivestudents">
                <span class="menu-title">Manage Departments</span>
                <i class="mdi mdi-domain menu-icon"></i>
                </a>
            </li>
            <li class="nav-item" :class="active3">
                <a class="nav-link" href="#" @click="pageactiverequest">
                <span class="menu-title">Manage Personnel </span>
                <span class="menu-sub-title"></span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
     
            <li class="nav-item"  :class="active4">
                <a class="nav-link" href="#"  @click="pageactiveoffice">
                <span class="menu-title">Manage Offices</span>
                <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
          
            </ul>
          
            <div class="sidebar-progress">
            <p>Clearance Target</p>
            <div class="progress progress-sm">
                <div class="progress-bar bg-gradient-success" role="progressbar" :style="'width:'+ percent +'%'"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>{{count}} Successfully Signed </p>
            </div>  

             <div class="sidebar-progress">
           
            <p>School Year: 2017-2018</p>
            <p>2nd Semester</p>
            
            </div>
        </nav>
        <!-- partial -->
        <dashad v-if="pagedash"></dashad>
		<managedash v-if="pagestudents"></managedash>
		<managep v-if="pagerequest"></managep>
		<manageoff v-if="pageoffice"></manageoff>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.ckcmascs.com/" target="_blank">Automated Student Clearance</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">A system with quality & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
        </div>
        <!-- row-offcanvas ends -->
    </div>
 
    <!-- page-body-wrapper ends -->
    </div>
</div>
</template>

<script>
export default {
    data(){
      return{
          active1:'active',
          active2:'',
          active3:'',
          active4:'',
          
		  admindatas:[],
		  pagedash:true,
          pagestudents:false,
          pagerequest:false,
          pageoffice:false,

          count:'',
          countt:'',
          percent:'',
          percentov:''
          
	  }
    },
    created(){
        this.fetchUserre();
    },
    methods: {
     
        fetchUserre(){
            axios.get('admindata').then(
                response=>{
                    this.admindatas=response.data.admindata
                    // setTimeout(this.fetchUserre(), 1000); 

                }	
            ),
            axios.get('signdata').then(
                response=>{
                    this.count=response.data.count;
                    this.countt=response.data.countt;
                    var dec = this.countt - this.count
                    var nice = dec / this.countt
                    var nicer = nice * 100
                    this.percent= 100 - nicer;

                }	
            )
            
        },
        
        logout(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit()
		},
		
		pageactivedash(){
            this.active1='active'
            this.active2=''
            this.active3=''
            this.active4=''
            
			this.pagedash=true	
            this.pagestudents=false	
            this.pagerequest=false
            this.pageoffice=false
			
		},
	    pageactivestudents(){
            this.active1=''
            this.active2='active'
            this.active3=''
            this.active4=''

            this.pagedash=false
            this.pagestudents=true
            this.pagerequest=false
            this.pageoffice=false
            
        },
        pageactiverequest(){
            this.active1=''
            this.active2=''
            this.active3='active'
            this.active4=''

            this.pagedash=false
            this.pagestudents=false
            this.pagerequest=true   
            this.pageoffice=false
		},
        pageactiveoffice(){
            this.active1=''
            this.active2=''
            this.active3=''
            this.active4='active'

            this.pagedash=false
            this.pagestudents=false
            this.pagerequest=false
            this.pageoffice=true
            
		}
    },
    mounted() {
        this.csrf = window.myToken.csrfToken
    }
}
</script>
