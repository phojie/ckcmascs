<template>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <img :src="" class="mr-2 mb-2 " alt="Department Logo" height="60px" width="60px" style="border-radius:50%;">
        
        <h4 class="card-title mb-5" style="margin-top:-60px;margin-left:70px"> 
            
            Department of {{datadepartment.name}} 
            <i class="green-text fa fa-sort-down float-right"></i>
            <br>
            <i style="font-size:12px;" class="ml-2 text-success fa fa-circle"></i><span>Completed</span> 

        </h4> 
        
       

        
        <div class="table-responsive scrollbar-pink"  style="height:410px">
        <table class="table table-hover" >
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Sale</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr>
                        <td>Jacob</td>
                        <td>Photoshop</td>
                        <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-danger">Pending</label></td>
                      </tr>
                      <tr>
                        <td>Messsy</td>
                        <td>Flash</td>
                        <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>Premier</td>
                        <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                        <td><label class="badge badge-info">Fixed</label></td>
                      </tr>
                      <tr>
                        <td>Peter</td>
                        <td>After effects</td>
                        <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-success">Completed</label></td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                      <tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr><tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr><tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr><tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr><tr>
                        <td>Dave</td>
                        <td>53275535</td>
                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                        <td><label class="badge badge-warning">In progress</label></td>
                      </tr>
                    </tbody>
                  </table>
        </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
        props:['datadepartment'],

}
</script>

