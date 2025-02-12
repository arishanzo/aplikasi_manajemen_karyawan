<template>
    <div>
      <!-- Modal Edit Mobils -->
      <div v-if="data" class="modal fade show" style="display: block;" tabindex="-1" aria-labelledby="SewaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="SewaModalLabel">Edit Data</h5>
              <button type="button" class="btn-close" @click="closeModal"></button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="submitForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input 
                    v-model="form.name" 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    placeholder="Masukkan nama"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea 
                    v-model="form.description" 
                    class="form-control" 
                    id="description" 
                    rows="3" 
                    placeholder="Masukkan deskripsi"
                    required
                  ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, watch } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    props: {
      data: Object,
    },
    setup(props, { emit }) {
      // Menggunakan useForm untuk binding data form dengan nilai default dari props
      const form = useForm({
        name: props.data ? props.data.name : '',
        description: props.data ? props.data.description : '',
      });
  
      // Watch untuk perubahan data, jika props.data berubah, update form
      watch(() => props.data, (newData) => {
        form.name = newData.name;
        form.description = newData.description;
      });
  
      // Fungsi submit form untuk mengupdate data
      const submitForm = () => {
        form.put(`/data/${props.data.id}`, {
          onSuccess: () => {
            emit('close'); // Tutup modal setelah berhasil update
          },
        });
      };
  
      const closeModal = () => {
        emit('close'); // Emit event untuk menutup modal
      };
  
      return { form, submitForm, closeModal };
    },
  };
  </script>
  
  <style scoped>
  .modal.fade.show {
    display: block;
    background-color: rgba(0, 0, 0, 0.5);
  }
  </style>
  