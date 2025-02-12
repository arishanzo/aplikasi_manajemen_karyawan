<script setup>
import NavbarCompany from '@/Layouts/NavbarCompany.vue';
import { Head , Link, router} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Order" />

    <NavbarCompany>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Halaman Order</h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-4xl font-semibold  text-gray-900">Halaman Orders</div>
 
                </div>


                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
              <th  class="px-4 py-2">Nama Makanan</th>
          <th  class="px-4 py-2">Jumlah Porsi</th>
          <th  class="px-4 py-2">Tanggal Pengiriman</th>
          <th  class="px-4 py-2">Nama_Pembeli</th>
          <th  class="px-4 py-2">Nama_Katering</th>
          <th  class="px-4 py-2">No Orderan</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="order in Order" :key="order.id_orders">
          <td class="border px-4 py-2">{{ order.makanan.makanan }}</td>
          <td class="border px-4 py-2"> {{ order.jumlah_porsi}}</td>
          <td class="border px-4 py-2"> {{ formatDate(order.tgl_pengiriman) }}</td>
          <td class="border px-4 py-2"> {{ order.nama_pembeli}}</td>
          <td class="border px-4 py-2"> {{ order.nama_katering}}</td>
          <td class="border px-4 py-2">{{ order.no_order}}</td>
     
         
        </tr>
      </tbody>
           
    </table>

   
    
</div>
                
            </div>
            
        </div>
    </NavbarCompany>
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
    Order: Object,
   
    
  },

  methods: {
  
    navigateAndRefresh(url) {
      window.location.href = url; // Navigasi dan refresh total
    },

  
    formatDate(date) {
      return new Date(date).toLocaleDateString('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric',
      });
    }

  }
};


</script>