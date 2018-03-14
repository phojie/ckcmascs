<template>
    <div class="row " style="height:37px">
        <div style="font-size:15px" class="col-md-12 stretch-card grid-margin">
            <div class="col-md-3 offset-md-1">
            {{office.name}}
            </div>
            <div class="col-md-5">
            {{office.assign}}
            </div>
            <div  class="col-md-3">
               <label  class="badge badge-gradient-warning" style="cursor: pointer;">Pending</label>
                
               <!-- <label  class="badge badge-gradient-success" style="cursor: pointer;">Signed</label> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            status:''
            }
    },
    props:['office'],
    methods:{
        getStatus(){
            // axios.('d').then(response=>{

            // })
        }
    },
    created(){
        this.getStatus();
    }
    
}
</script>
