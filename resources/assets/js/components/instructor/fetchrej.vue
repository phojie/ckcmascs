<template>
    <tr>
        <td class="py-1">
        <img :src="'userprofilepic/'+requestdata.profilepic" alt="image">
        </td>
        <td>
        {{requestdata.fullname}}
        </td>
        <td>
        {{requestdata.idno}}
        </td>
        <td>
        {{requestdata.yearlevel}}
        </td>
        <td>
        {{requestdata.department}}
        </td>
        <td>
        <!-- <button type="button" @click="rejectClearance(requestdata)" style="cursor:pointer" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-empty"></i>Reject</button> -->
        <button type="button" @click="signClearance(requestdata)" style="cursor:pointer" class="btn btn-success btn-sm"><i class="mdi mdi-clipboard-check"></i>Sign Now</button>
        
        </td>
    </tr>

</template>

<script>
export default {
    props:['requestdata'],
    data(){
        return{

        }
    },
    
    methods:{
        rejectClearance(requestdata){
            // alert(requestdata.id);
            axios.delete('/requestdata/'+requestdata.bid).then(
                response=>{
                    this.$emit('refresh');
                }
            )
        },
        signClearance(requestdata){
            axios.patch('/rejectdata/'+requestdata.id,requestdata).then(
                response=>{
                    this.$emit('refresh');
                }
            )}
         
    }
}
</script>
