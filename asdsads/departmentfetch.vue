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
            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </td>
        <td>
            {{datadepartment.total}}
        </td>
        <td>
        May 10, 2015
        </td>
        <td>
        May 15, 2015
        </td>
    </tr>
</template>

<script>
export default {
        props:['datadepartment'],

}
</script>

