<template>

    <div>
        <input type="text" :value="msg" @input="changeMessage">
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    props:['msg'], //->para ni sa v-bind nga iyang tawgun, Para makuha iyahang ge data sa ge bind ddto .para ma output dre
    data(){
        return{
            message:''
        }
    },
    methods:{
        changeMessage(event){
            this.message=event.target.value;
            this.$emit('messageChanged', this.message);
        }
    }

}
</script>

//1. v-on="" || @input=""
