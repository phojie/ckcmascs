<template>
    <div>
        <p><b>{{message}}</b></p>
        <app-input :msg="message" @messageChanged="message=$event"></app-input>
    </div>
</template>

<script>
import Input from './Input.vue';
export default {
    data(){
        return{
            message:'This from output messages'
        }
    },
    components:{
        'app-input':Input
    }
}
</script>

