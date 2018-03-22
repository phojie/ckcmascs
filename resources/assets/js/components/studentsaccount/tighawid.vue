<template>
<div>
    dsdsf
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
