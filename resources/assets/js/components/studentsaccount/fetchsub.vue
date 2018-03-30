<template>
    <div class="row " style="height:37px">
        <div style="font-size:18px" class="col-md-12 stretch-card grid-margin">
            <div class="text-capitalize col-md-3 offset-md-1">
            {{sub.subject}}
            </div>
            <div class="text-capitalize col-md-5">
            {{sub.fullname}}
            </div>
            <div  class="text-capitalize col-md-3">
            
               <label v-if="sub.status!='Signed'"  class="badge badge-gradient-warning" style="font-size:18px;cursor: pointer;">Pending</label>
                
               <label v-if="sub.status=='Signed'"  class="badge badge-gradient-success" style="font-size:18px;cursor: pointer;">Signed</label>
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
    props:['sub'],
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
