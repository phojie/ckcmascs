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
            <!-- <label style="cursor:pointer"  class="badge  light-green accent-2">View students</label> -->
            
            
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
                                
                                <tr v-for="studentlist in filteredList" :key="studentlist.id">
                                    
                                    <td>{{studentlist.idno}}</td>
                                    <td>{{studentlist.fullname}}</td>
                                    <td>{{studentlist.department}}</td>
                                    <td>{{studentlist.yearlevel}}</td>
                                    <td v-for="addedlist in addedlists" :key="addedlist.id">
                                        <label v-if="studentlist.user_id==addedlist.student && addedlist.subjectcode==idsub.id" @click="delst(addedlist.id)" class="badge  red accent-2" style="cursor: pointer;">Cancel</label>
                                   
                                    </td>
                                        <label   @click="addst(idsub,studentlist)" class="badge  light-green accent-2" style="cursor: pointer;">Add</label>
                                    
                                </tr>
                            </tbody></table></div></div></div>

                    </div>
                    <div class="modal-footer">
                   <input type="text" v-model="search" class="col-md-5 form-control" placeholder="Search Fullname" aria-label="Username" aria-describedby="colored-addon3">
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
            c:'',
            addedlists:[],
            studentlists:[],
            search:'',
            jie:[],
            stfd:{
                instructor:'',
                subid:'',
                stid:''
            }
        }
    },  
    methods:{
        addst(idsub,studentlist){
            this.stfd.instructor=idsub.user_id
            this.stfd.subid=idsub.id
            this.stfd.stid=studentlist.user_id
         
            axios.post('studentsSubdata',this.stfd).then(response=>{
                this.fetchStudentsdata();
            })
        },
        delst(id){
            axios.delete("/studentsSubdata/" + id).then(response=>{
                this.fetchStudentsdata();
            })
        },
        deletethis(getsubid){
            axios.delete('/subjectdata/'+getsubid.id).then(response=>{
                this.$emit('refresh');
            })
        },
        fetchStudentsdata(){
            axios.get('studentsdata').then(response=>{
                this.studentlists=response.data.studentlists;
                
                })
            axios.get('studentsSubdata').then(response=>{
                this.addedlists=response.data.data;
                this.c=response.data.count;
                })
            
        }
    },
    created(){
        this.fetchStudentsdata()
    },
    computed:{
        filteredList() {
        return this.studentlists.filter(studentlist  => {
            return studentlist.fullname.toLowerCase().includes(this.search.toLowerCase())
                })
            }
    },

}
</script>
