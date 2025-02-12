<script setup>

import NavbarMerchaint from '@/Layouts/NavbarMerchaint.vue';
import { Head , Link, router} from '@inertiajs/vue3';


const formatRupiah = (value) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(value);
};
</script>

<template>
    <Head title="Menu" />

    <NavbarMerchaint>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Halaman Menu </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-4xl font-semibold  text-gray-900">Halaman Menu</div>
 
                </div>

<div class="pt-8 bg-white p-8 pb-8">
                <Link
                   
                   :href="route('makanan.create')"
                  
                   class="p-2  mb-16 btn btn-blue bg-blue-500  text-xl text-gray-100 hover:text-gray-200 rounded-md"
               >
                 Tambah Menu
               </Link>

              </div>

                <div class="bg-white container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <table  id="example" class="table-auto w-full table-bordered">
        <thead class="bg-gray-200">
            <tr>
          <th  class="px-4 py-2">Makanan</th>
          <th  class="px-4 py-2">Jenis Makanan</th>
          <th  class="px-4 py-2">Deskripsi</th>
          <th  class="px-4 py-2">Foto</th>
          <th  class="px-4 py-2">Harga</th>
          <th  class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="menu in Menu" :key="menu.id_makanan">
          <td class="border px-4 py-2">{{ menu.makanan }}</td>
          <td class="border px-4 py-2"> {{ menu.jenis_makanan}}</td>
          <td class="border px-4 py-2"> {{ menu.deskripsi }}</td>
          <td class="border px-4 py-2">
            <img v-if="menu.foto" :src="`/storage/${menu.foto}`" alt="Gambar" class="w-80 h-40 object-cover">

          </td>
          <td class="border px-4 py-2">{{ formatRupiah (menu.harga) }}</td>
          <td class="border px-4 py-2 text-center"> 

            
            <Link
                    :href="route('makanan.edit', menu.id_makanan)" 
                   
                    class="btn btn-blue-800 bg-blue-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
                >
                 Edit Data
                </Link>

                   
                   <!-- Tombol Hapus -->
                   <button @click="confirmDelete(menu.id_makanan)" class="btn btn-blue-800 bg-red-500 p-2 text-sm text-gray-100 hover:text-gray-200 rounded-md"
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
    Menu: Object,
   
    
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
          router.delete(route("makanan.destroy", id), {
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