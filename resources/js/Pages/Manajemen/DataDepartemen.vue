<script setup>
import Navbar from '@/Layouts/Navbar.vue';
import { Head , Link, router} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Daftar Hadir" />

    <Navbar>
        

        <div class="py-20">
            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
     
               

<div class="pt-8 bg-white p-8 pb-8">
                <Link
                   
                   :href="route('DataDepartemen.create')"
                  
                   class="p-2  mb-16 btn btn-blue bg-blue-500  text-xl text-gray-100 hover:text-gray-200 rounded-md"
               >
                 Tambah Departemen
               </Link>

              </div>

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
          <th  class="px-4 py-2">Kode Departemen</th>
          <th  class="px-4 py-2">Nama Departemen</th>
          <th  class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="departemen in Departemen" :key="departemen.id_departemen">
          <td class="border px-4 py-2">{{ departemen.kode_departemen }}</td>
          <td class="border px-4 py-2"> {{ departemen.nama_departemen}}</td>
                 <td class="border px-4 py-2 text-center"> 

            
            <Link
                    :href="route('DataDepartemen.edit', departemen.id_departemen)" 
                   
                    class="btn btn-blue-800 bg-blue-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
                >
                 Edit Data
                </Link>

                   
                   <!-- Tombol Hapus -->
                   <button @click="confirmDelete(departemen.id_departemen)" class="btn btn-blue-800 bg-red-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
            >
              Hapus
            </button>    
    
    </td>
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
    Departemen: Object,
   
    
  },

  methods: {
  
    navigateAndRefresh(url) {
      window.location.href = url; // Navigasi dan refresh total
    },

    confirmDelete(id) {
      // Tampilkan konfirmasi menggunakan SweetAlert2
      Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang sudah dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna mengonfirmasi, kirim permintaan hapus
          router.delete(route("DataHadir.destroy", id), {
            onSuccess: () => {
              Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
            },
            onError: (error) => {
              Swal.fire("Error!", "Terjadi kesalahan saat menghapus data.", "error");
            },
          });
        }
      });
    }
  

  }
};


</script>