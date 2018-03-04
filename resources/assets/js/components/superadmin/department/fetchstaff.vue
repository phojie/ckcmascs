<template>
    <tr v-if="staff.department==idde">
        <td>
            <img :src="'userprofilepic/'+staff.profilepic" alt="">
        </td>
        <td>
            {{staff.fullname}}
        </td>
        <td>
            {{staff.jobtitle}}
        </td>
        <td>
            {{staff.ad}}
        </td>
        <td>
            {{staff.em}}
        </td>
    </tr>
</template>

<script>
export default {
    props:['staff','idde'],
    data(){
        return{
            stat:''
        }
    },
    created(){
        
    }
}
</script>
