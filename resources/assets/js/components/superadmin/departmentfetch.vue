<template>
    <tr>
        <td>
            {{datadepartment.id}}
        </td>
        <td>
            {{datadepartment.name}}
        </td>
        <td>
        <div class="progress">
            <div class="progress-bar bg-gradient-success" role="progressbar" :style="'width:'+ percent +'%'"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
            {{datadepartment.total}}
        </td>
        <td>
        -
        </td>
        <td>
        -
        </td>
    </tr>
</template>

<script>
export default {
    props:['datadepartment'],
    // created(){
    //     var dec = datadepertm - this.count
    //     var nice = dec / this.countt
    //     var nicer = nice * 100
    //     this.percent= 100 - nicer;
    // }
}
</script>

