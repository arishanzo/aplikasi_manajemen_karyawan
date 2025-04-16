<script setup>
import Navbar from '@/Layouts/Navbar.vue';
import { ref, watch } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

const page = usePage()
const filters = page.props.filters

const selectedCategory = ref(filters.departemen || '')

watch(selectedCategory, (newVal) => {
  router.get(route('DataHadir.index'), {
    departemen: newVal
  }, {
    preserveScroll: true,
    preserveState: true,
    replace: true,
  })
})

const downloadExcel = () => {
  window.open(route('datahadir.export'), '_blank');
};
</script>

<template>
    <Head title="Daftar Hadir" />

    <Navbar>
        

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
     
               

<div class="pt-8 bg-white p-8 pb-8">

     <select v-model="selectedCategory" class="border p-2 w-48 rounded">
        <option disable value="">Filter Departemen</option>
        <option v-for="departemen in Departemen" :key="departemen" :value="departemen.nama_departemen">{{ departemen.nama_departemen }}</option>
      </select>

      <button @click="navigateAndRefresh" class="m-8 inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-blue-900 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none">Reset</button>

      
    <button @click="downloadExcel" class=" inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-green-900 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none">
      Download Excel
    </button>

              </div>

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
                
          <th  class="px-4 py-2">Nama Karyawan</th>
          <th  class="px-4 py-2">Departemen</th>
          <th  class="px-4 py-2">Tanggal Hadir</th>
          <th  class="px-4 py-2">Status</th>
          <th  class="px-4 py-2">Keterangan</th>
        
        </tr>
      </thead>
      <tbody>
        <tr v-for="hadir in Hadir" :key="hadir.id_hadir">
          <td class="border px-4 py-2">{{ hadir.karyawan.nama_karyawan }}</td>
          
          <td class="border px-4 py-2">{{ hadir.karyawan.departemen }}</td>
          
          <td class="border px-4 py-2">{{ hadir.tgl_hadir }}</td>
          <td class="border px-4 py-2"> {{ hadir.status}}</td>
          <td class="border px-4 py-2"> {{ hadir.keterangan }}</td>
      
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
    Hadir: Object,
    Departemen: Object,
  },
  data() {
    return {
    }
  },

  methods: {
  
    navigateAndRefresh() {
        window.location.reload();
    },

  }
};


</script>