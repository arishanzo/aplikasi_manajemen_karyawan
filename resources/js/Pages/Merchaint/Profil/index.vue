<script setup>
import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';
import { Head , Link, router} from '@inertiajs/vue3';

</script>

<template>
    <Head title="Profil" />

    <NavbarMerchaint>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Halaman Profil </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-4xl font-semibold  text-gray-900">Halaman Profil Katering</div>
 
                </div>

<div class="pt-8 bg-white p-8 pb-8">
                <Link
                   
                   :href="route('profil.create')"
                  
                   class="p-2  mb-16 btn btn-blue bg-blue-500  text-xl text-gray-100 hover:text-gray-200 rounded-md"
               >
                 Tambah Profil
               </Link>

              </div>

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
          <th  class="px-4 py-2">Nama Perusahaan</th>
          <th  class="px-4 py-2">Nama Alamat</th>
          <th  class="px-4 py-2">Kontak</th>
          <th  class="px-4 py-2">Deskripsi</th>
          <th  class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="profils in Profil" :key="profils.id_profil">
          <td class="border px-4 py-2">{{ profils.nama_perusahaan }}</td>
          <td class="border px-4 py-2"> {{ profils.alamat}}</td>
          <td class="border px-4 py-2"> {{ profils.kontak }}</td>
          <td class="border px-4 py-2">{{ profils.deskripsi_perusahaan}}</td>
     
          <td class="border px-4 py-2 text-center"> 

            
            <Link
                    :href="route('profil.edit', profils.id_profil)" 
                   
                    class="btn btn-blue-800 bg-blue-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
                >
                 Edit Data
                </Link>

                   
                   <!-- Tombol Hapus -->
                   <button @click="confirmDelete(profils.id_profil)" class="btn btn-blue-800 bg-red-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
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
      </NavbarMerchaint>
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
    Profil: Object,
   
    
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
          router.delete(route("profil.destroy", id), {
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