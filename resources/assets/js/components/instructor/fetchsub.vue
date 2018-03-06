<template>
  
    <tr>
        <td>
        {{lsub.subject}}
        </td>
        <td>
        {{lsub.description}}
        </td>
        <td>
            <label  @click="deletethis(lsub)" style="cursor:pointer" class="badge  red accent-2">Delete</label>
            <label @click="$emit('getdetails',lsub)" data-toggle="modal" data-target="#ms" style="cursor:pointer"  class="badge  yellow accent-2">Manage Students</label>
            <label style="cursor:pointer"  class="badge  light-green accent-2">View students</label>
            
            
        <!-- <i  class="mdi mdi-delete-circle icon-md text-danger" style="cursor: pointer;"></i> |
        <i  class="mdi mdi-account-multiple-plus icon-md text-warning" style="cursor: pointer;"></i> |
        <i  class="mdi mdi-account-multiple-plus icon-md text-success" style="cursor: pointer;"></i> -->
        
        </td>
        <td>
        </td>

            
        <div class="modal fade" id="ms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title success-text"  id="exampleModalLabel"> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card"><div class="card-body"><h4 class="card-title">Available Students</h4> <div class="table-responsive"><table class="table"><thead><tr><th>
                            Id No.
                            </th> <th>
                            Fullname
                            </th> <th>
                            Course
                            </th> 
                            <th>
                            Year
                            </th> <th>
                            Action
                            </th> </tr>
                            </thead> 
                            <tbody>
                                <tr v-for="studentlist in studentlists" :key="studentlist.id">
                                    <td>{{studentlist.id}}</td>
                                    <td>{{studentlist.fullname}}</td>
                                    <td>{{studentlist.department}}</td>
                                    <td>{{studentlist.yearlevel}}</td>
                                    <td><label @click="addst(idsub,studentlist)" class="badge  light-green accent-2" style="cursor: pointer;">Add</label></td>
                                </tr>
                            </tbody></table></div></div></div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success mr-2">Add</button> -->
                    </div>
                </div>
            </div>
        </div>
        
    </tr>

</template>

<script>
export default {
  
    props:['lsub','idsub'],
    data(){
        return{
            studentlists:[],
            stfd:{
                subid:'2',
                stid:'2'
            }
        }
    },
    methods:{
        addst(idsub,studentlist){
            this.stfd.subid=idsub.id
            this.stfd.stid=studentlist.user_id
            console.log(stfd.subid)
            // alert(studentlist.user_id + " " + idsub.id)
            // axios.post('subjectdata',this.studentd).then(response=>{
            // })
        },
        deletethis(getsubid){
            axios.delete('/subjectdata/'+getsubid.id).then(response=>{
                this.$emit('refresh');
            })
        },
        fetchStudentsdata(){
              axios.get('studentsdata').then(response=>{
                this.studentlists=response.data.studentlists;
                setTimeout(this.fetchStudentsdata,1000);
                
                }
            )
        }
    },
    created(){
        this.fetchStudentsdata()
    }

}
</script>
