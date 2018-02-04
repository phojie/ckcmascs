<template>
<div style="margin-top:70px;">

<div class="row mx-5">

    <table class="table table-medium">
        <thead>
            <tr>
               
         
                <th>
                     <center>Actions</center>
                </th>
                <th>
                 <center>Actions</center>
                </th>
                <th>
                   <center>Date</center>
                </th>
                <th>
                    <center>Date</center>
                </th>
            </tr>
        </thead>
    <tbody>     
      <tr v-for="Activity in Activitys" :key="Activity.id">
          <td>
            {{Activity.activity}}
          </td>
          <td>
            {{Activity.activity}}
          </td>
          <td>
            {{Activity.created}}
          </td>
          <td>
            {{Activity.message}}
          </td>
      </tr>
    </tbody>
    </table>
                    
    </div>    
</div>
   
</template>

<script>
export default {
  
  data(){
      return{
         Activitys:[

         ],

      }
  },
  created(){
      this.fetchActivity();
  },
  methods:{
      fetchActivity(){
            axios.get("activitylog").then(
                response=>{
                    this.Activitys=response.data.activitylog
                
                    }

            )
      }
  }
}
</script>
