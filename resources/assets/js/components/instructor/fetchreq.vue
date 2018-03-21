<template>
    <tr >
        <td><center><i @click="deletet(list)" style="cursor:pointer" class="mdi mdi-delete-circle icon-md text-danger"></i></center></td>
        <td>{{list.name}} </td>
        <td>{{list.description}} </td>
        <td>{{list.Subjects}} </td>
        
   
    </tr>

</template>

<script>
export default {
    props:['list'],
    data(){
        return{
            showdel:false,
            requirements:[],
        }
    },
    methods:{
        showbtn(){
            this.showdel=true;
        },
        hidebtn(){
            this.showdel=false;

        },
        deletet(list){
            axios.delete('/requirementdata/'+list.id).then(response=>{
                // console.log(reponse);
                this.$emit('refresh');

            });
        }
    }
}
</script>
