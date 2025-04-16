<script setup>
import Navbar from '@/Layouts/Navbar.vue';
import { Head , Link, router} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Daftar Audit / History" />

    <Navbar>
        

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
     

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
        
                <th  class="px-4 py-2">Dibuat</th>
          <th  class="px-4 py-2">Role User</th>
          <th  class="px-4 py-2">Menu </th>
          <th  class="px-4 py-2">Keterangan Lama</th>
          <th  class="px-4 py-2">Keterangan Baru</th>
          <th  class="px-4 py-2">Tanggal</th>
          <th  class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="audit in Audit" :key="audit.id_audit">
            <td class="border px-4 py-2"> {{  audit.user.name }}</td>
            <td class="border px-4 py-2"> {{  audit.user.role }}</td>
          <td class="border px-4 py-2"> {{ audit.model}}</td>
          <td v-if="audit.old_data" class="border px-4 py-2"> {{ audit.old_data}}</td>
          <td v-else class="border px-4 py-2 text-center"> - </td>
          <td v-if="audit.new_data"  class="border px-4 py-2"> {{ audit.new_data}}</td>
          <td v-else class="border px-4 py-2 text-center"> - </td>
          <td class="border px-4 py-2"> {{  formatDate(audit.created_at)}}</td>
    
          <td class="border px-4 py-2">{{ audit.action }}</td>
        </tr>
      </tbody>
           
    </table>

   
    
</div>
                
            </div>
            
        </div>
      </Navbar>
</template>

<script>
$(document).ready(function() {
    if (!$.fn.DataTable.isDataTable('#example')) {
    $('#example').DataTable({
        // konfigurasi DataTable
    });
}
    });

export default {
    name: "App",

    props: {
    Audit: Object,
   
    
  },

  methods: {
    formatDate(dateStr) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(dateStr).toLocaleDateString('id-ID', options);
    }
  
  }
};


</script>