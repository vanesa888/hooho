<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Kategori</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success float-right" @click="modalBaru"><i class="fas fa-th nav-icon"></i> Tambah Blog
                        </button>        
                        <table class="table table-bordered">  
                            <thead>
                    <tr>
                      <th><center>Id</center></th>
                      <th><center>Kategori</center></th>
                      <th style="width :35%"><center>Jumlah Data</center></th> 
                      <th style="width :35%"><center>Aksi</center></th>  
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="items in kategoris" :key="items.id">
                         <td>{{items.id}}</td>
                        <td>{{items.namakategori}}</td> 
                        <td>{{items.jumlah}}</td>  
                        

                       <td> 
                      <center></center>
                     </td>
                     <td>
                     <center>
                       <a href="#" @click="editData(items)" title="Edit Data">
                         <i class="fas fa-edit blue"></i>
                       </a>
                       |
                       <a  href="#" @click="deleteData(items.id)" title="Hapus Data">
                          <i class="fas fa-trash-alt red"></i>
                       </a>
                       </center>
                       </td>
                    
                    </tr>
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        [09.12, 3/1/2020] Pak Nahdi: <!-- Modal -->
    <div
      class="modal fade"
      id="tambah"
      tabindex="-1"
      role="dialog"
      aria-labelledby="tambahLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahLabel" v-show="!editmode">Tambah Data Baru</h5>
            <h5 class="modal-title" id="tambahLabel" v-show="editmode">Rubah Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateData() : createData()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.namakategori"
                  type="text"
                  name="namakategori"
                  placeholder="Nama Kategori"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('namakategori') }"
                />
                <has-error :form="form" field="namakategori"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">Tambah</button>
              <button v-show="editmode" type="submit" class="btn btn-primary">Rubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/Modal-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                kategoris: {}, //aray yang menmpung data dari table
                form: new Form({ //untuk menyimpan data
                    id: "",
                    namakategori: "",
                    jumlah: ""
                })
            };
      
        },
        methods: {
                modalBaru(){
                    this.editmode= false;
                    this.form.reset();
                    $("#tambah").modal("show");
                },
                editData(items) {
                  this.editmode = true;
                  this.form.reset();
                  $("#tambah").modal("show");
                  this.form.fill(items);
                },
                 
              loadData() { //methods dari semua form CRUD Masuk ke dalam methods 
            axios.get("api/kategori").then(({ data }) =>(this.kategoris = data)); 
            //untuk menampilkan dat
        },
        createData() {
      this.form
        .post("api/kategori")
        .then(() => {
          this.$Progress.start();
          Fire.$emit("refreshData");
          $("#tambah").modal("hide");
          Toast.fire({
            type: "success",
            title: "Data Berhasi Tersimpan"
           });
          this.$Progress.finish();
        })
        .catch();  
      },
      updateData(){
        this.form
        .put("api/kategori/" + this.form.id)
        .then(() =>{
          this.$Progress.start();
          $("#tambah").modal("hide");
          Toast.fire({
            type: "success",
            title: "Data Berhasil Terubah"
          });
          this.$Progress.finish();
          Fire.$emit("refreshData");
        })
        .catch(() => {
          this.$Progress.fail();
        });
      },
      deleteData(id) {
        Swal.fire({
          title: "Anda Yakin Ingin Menghapus Data Ini ?",
          text:  "Kilit Batal Untuk Membatalkan Penghapusan",
          type:  "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
         cancelButtonColor : "#d33",
          confirmButtonText: "Hapus" 
        }).then(result => {
          if (result.value) {
            this.form
            .delete("api/kategori/" + id)
            .then(() => {
              Swal.fire("Terhapus", "Data Anda Sudah Terhapus", "success");
              Fire.$emit("refreshData");
            })

            .catch(() =>{
              Swal.fire("Gagal", "Data Gagal Terhapus", "warning");
            });
          }

        });
      }

     },
        created(){ //untuk menampilkan data
            this.loadData(); //this.form.loadData
            Fire.$on("refreshData", () => {
                this.loadData();
            });
        }
    };
</script>
