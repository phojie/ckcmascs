<template>

<div>
    
    <div class="container-scroller special-color-dark" style="background-image:url('https://www.jinnah.edu/wp-content/uploads/2014/06/university-background-04.jpg');background-repeat: no-repeat;background-position: center; " >
        <div class="container-fluid page-body-wrapper">
            <div class="row">
               
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                <div class="card col-lg-4 mx-auto" >
                <div class=" card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Login</h3>
                    <form method="post" @keydown="evalidatehi" @submit.prevent="evalidate">
                    <div class="form-group">
                        <label>Email *</label>
                        <input  v-model="inputform.email" :disabled="disbtn==1" autocomplete="off" :type="disbtn"  class="form-control p_input">
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input v-model="inputform.password" :disabled="disbtn==1" type="password" class="form-control p_input">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                            </label>
                        </div>
                        <!-- <a href="#" class="forgot-pass">Forgot password</a> -->
                    </div>
                    <div v-if="validation" v-bind:class="[moshake]" class=" mb-2 animated chip  lighten-4" style="margin-top:-10px;height:30px;padding:3px 10px; ">
                        <small class="text-center red-text fontnku">{{messageerror}}</small><i @click="validation=false"  style="font-size:15px" class="mt-1 close fa fa-times"></i>
                    </div>
                    <div class="text-center">
                        <button type="submit"  class=" btn btn-primary  btn-block enter-btn">Login 
                        <img v-if="!mosignin" src="/images/loading1.gif" height="30" alt="">
                            
                        </button>

                        <!-- <small  class="text-center red-text fontnku">trying to login.....</small> -->
                    </div>
                    
                    <p class="sign-up">Don't have an Account?<a href="#"> Enroll Now!</a></p>
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
            disbtn:0,
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
                this.messageerror='Please provide email ';
                this.moshake='bounceIn';
                this.validation=true;
            }
            else if (this.inputform.password == ""){
                this.messageerror='Please provide password ';
                this.moshake='bounceIn';
                this.validation=true;
            }
            else if(this.inputform.email == ""|| this.inputform.password == ""){
                this.messageerror='Please provide all fields ';
                this.moshake='bounceIn';
                this.validation=true;
            }
            else{
                this.disbtn=1
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
                        vm.moshake='bounceIn';
                        vm.validation=true; 
                        vm.inputform.password='';
                        vm.mosignin=true;
                        vm.disbtn=0
                        
                    }
                   
                }
                else{
                        vm.messageerror="Somethings wrong with the Server";
                    
                }
            
            })
            
                // this.messageerror='Invalid Account! ';
                // this.moshake='shake';
                // this.validation=true;

        }
    }
}
</script>
