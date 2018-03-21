<template>
    <div class="row " style="height:37px">
        <div style="font-size:15px" class="col-md-12 stretch-card grid-margin">
            <div class="col-md-3 offset-md-1">
            {{sub.subject}}
            </div>
            <div class="col-md-5">
            {{sub.fullname}}
            </div>
            <div  class="col-md-3">
            
               <label v-if="sub.status!='Signed'"  class="badge badge-gradient-warning" style="cursor: pointer;">Pending</label>
                
               <label v-if="sub.status=='Signed'"  class="badge badge-gradient-success" style="cursor: pointer;">Signed</label>
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
