<template>
<div>
    <div  v-for="studentdata in studentdatas" :key="studentdata.id" class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class=" navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <!-- <center><a class="navbar-brand brand-logo" href="/">Ckcmascs.cf</a></center> -->
        <a class="navbar-brand brand-logo-mini" href="/"></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="/"><img src="https://scontent.fcgy1-1.fna.fbcdn.net/v/t34.0-12/s851x315/28512235_1892307170841763_1072588819_n.png?efg=eyJpIjoidCJ9&oh=cb86a7f4163d09db1a2c5703ff7506dc&oe=5A9B7DD9" alt="logo"/></a> -->

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <!-- <div class="search-field ml-4 d-none d-md-block">
            <form class="d-flex align-items-stretch h-100" action="#">
            <div class="input-group">
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
                <div class="input-group-btn">
                <button type="button" class="btn bg-transparent dropdown-toggle px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-earth purple-text"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Today</a>
                    <a class="dropdown-item" href="#">This week</a>
                    <a class="dropdown-item" href="#">This month</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Month and older</a>
                </div>
                </div>
                <div class="input-group-addon bg-transparent border-0 search-button">
                <button type="submit" class="btn btn-sm bg-transparent px-0">
                    <i class="mdi mdi-magnify"></i>
                </button>
                </div>
            </div>
            </form>
        </div> -->
        <ul class="navbar-nav navbar-nav-right">
           
            <li class="nav-item dropdown">
            <!-- <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count"></span>
            </a> -->
            <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0">
                    1 Minutes ago
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0">
                    15 Minutes ago
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0">
                    18 Minutes ago
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div> -->
            </li>
            <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                    </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                    </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0">
                    Update dashboard
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                    </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0">
                    New admin wow!
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
            </li> -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img :src="'userprofilepic/'+studentdata.profilepic" alt="image">
                <!-- <img :src="ckcmascs/images/faces-clipart/pic-1.png" alt="image"> -->
                
                <span class="d-none d-lg-inline"> {{studentdata.first}} {{studentdata.last}}</span>
               
                <span class="d-none d-lg-inline teal-text ml-1" style="font-size:9px;">Student</span>
                
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
            <!-- <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
            </a>
            </li> -->
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
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            <li class="nav-item" :class="active1">
                <a class="nav-link " href="#" @click="pageactivedash">
                <span class="menu-title">Clearance</span>
                <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Status</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                 class="collapse" id="ui-basic"
                <div>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Cleared</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Pending</a></li>
                </ul>
                </div>
            </li> -->
            <!-- <li class="nav-item" :class="active2">
                <a class="nav-link" href="#" @click="pageactivestudents">
                <span class="menu-title">Request</span>
                <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li> -->
            <li class="nav-item" :class="active3">
                <a class="nav-link" href="#" @click="pageactiverequest">
                <span class="menu-title">Request </span>
                <span class="menu-sub-title">( 2 new updates )</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Chart</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
            </li> -->
            <!-- <li class="nav-item"  :class="active4">
                <a class="nav-link" href="#"  @click="pageactiveoffice">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="!#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
                </a>
            </li> -->
            </ul>
            <!-- <div class="sidebar-progress">
            <p>Total Sales</p>
            <div class="progress progress-sm">
                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>50 Items sold</p>
            </div> -->
            <div class="sidebar-progress">
            <p>Clearance Target</p>
            <div class="progress progress-sm">
                <div class="progress-bar bg-gradient-success" role="progressbar" :style="'width:'+ percent +'%'"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>{{count}} Successfully Signed </p>
            </div>  

             <div class="sidebar-progress">
           
            <p>School Year: 2017-2018</p>
            <p>{{studentdata.semester}}</p>
            
            </div>
        </nav>
        <!-- partial -->
        <dashstu v-if="pagedash"></dashstu>
		<!-- <insstudents v-if="pagestudents"></insstudents> -->
		<dashreq v-if="pagerequest"></dashreq>
		<!-- <insoffice v-if="pageoffice"></insoffice> -->

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
          
		  studentdatas:[],
		  pagedash:true,
		  pagestudents:false,
          pageoffice:false,
          pagerequest:false,

          count:'',
          countt:'',
          percent:''
          
	  }
    },
    created(){
        this.fetchUserre();
    },
    methods: {
     
        fetchUserre(){
            axios.get('studentsdata').then(
                response=>{
                    this.studentdatas=response.data.studentsdata
                    setTimeout(this.fetchUserre(), 1000); 
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
