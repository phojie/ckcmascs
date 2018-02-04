<template>

<div>
    
    <div class="container-scroller special-color-dark" >
        <div class="container-fluid page-body-wrapper">
            <div class="row">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Login</h3>
                    <form method="post" @keydown="evalidatehi" @submit.prevent="evalidate">
                    <div class="form-group">
                        <label>Username or email *</label>
                        <input  v-model="inputform.email"  autocomplete="off" type="text" class="form-control p_input">
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input v-model="inputform.password" type="password" class="form-control p_input">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                            </label>
                        </div>
                        <a href="#" class="forgot-pass">Forgot password</a>
                    </div>
                    <div v-if="validation" v-bind:class="[moshake]" class=" animated chip  lighten-4" style="margin-top:-10px;height:30px;padding:3px 10px; ">
                        <small class="text-center red-text fontnku">{{messageerror}}</small><i @click="validation=false"  style="font-size:15px" class="mt-1 close fa fa-times"></i>
                    </div>
                    <div class="text-center">
                        <button type="submit" class=" btn btn-primary btn-block enter-btn">Login</button>
                        <img id="tigihap" v-if="!mosignin" class="animated  ml-3" src="images/4.gif" height="30" alt="">
                        
                    </div>
                    
                    <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                    </form>
                </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->



    
</div>       
</template>

<script>
export default {
    data(){
        return{
            timer:'',
            messageerror:null,
            moshake:'',
            validation:false,
            loadnow:false,
            mosignin:true,
            inputform:{
                email:'',
                password:''
            }
        }
    },
   
    methods:{
        evalidatehi(){
           this.validation=false;
            
        },
        evalidate(){
            if (this.inputform.email == ""){
                this.messageerror='Please provide username ';
                this.moshake='shake';
                this.validation=true;
            }
            else if (this.inputform.password == ""){
                this.messageerror='Please provide password ';
                this.moshake='shake';
                this.validation=true;
            }
            else if(this.inputform.email == ""|| this.inputform.password == ""){
                this.messageerror='Please provide all fields ';
                this.moshake='shake';
                this.validation=true;
            }
            else{
                this.mosignin=false
                this.loginnow();
            }
      
        },
        invalid(){
              
        },
        loginnow(){
            
            let vm = this;
            axios.post('login', vm.inputform).then(function(reponse){
                console.log(reponse);
                window.location.href = '/';
            })
            
            .catch(function(error){
                var errors =error.response
                console.log(errors)
                
                if(errors.statusText === "Unprocessable Entity" || errors.status ===422){
                    if(errors.data){
                     
                        vm.messageerror="We don't recognize this account";
                        vm.moshake='shake';
                        vm.validation=true; 
                        vm.inputform.password='';
                        vm.mosignin=true;
                    }
                   
                }
            
            })
            
                // this.messageerror='Invalid Account! ';
                // this.moshake='shake';
                // this.validation=true;

        }
    }
}
</script>
