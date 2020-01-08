<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data User</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-success float-right" @click="modalBaru"><i class="fas fa-bars nav-icon"></i> Tambah Kategori
                        </button>        
                        <table class="table table-bordered">  
                            <thead>
                            <tr>
                            <th style="width :25%"><center>Id </center></th>
                            <th style="width :35%"><center>Nama </center></th> 
                            <th style="width :25%"><center>Email </center></th>
                            <th style="width :25%"><center>Aksi </center></th>    
                            </tr>
                            </thead>
                    <tbody>
                    <tr v-for="items in users" :key="items.id">
                        <td>{{items.id}}</td>
                        <td>{{items.name}}</td>
                        <td>{{items.email}}</td>      
                        <td>
                        <a href="#">
                        <i class="fas fa-edit pink"> | &nbsp; &nbsp; </i>
                        </a>
                        <a href="#">
                        <i class="fas fa-trash teal"></i>
                        </a>
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
                  v-model="form.id"
                  type="text"
                  name="id"
                  placeholder="id"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('id') }"
                />
                <has-error :form="form" field="id"></has-error>
              </div>
            </div>
          
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Nama"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
            </div>
              <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.email"
                  type="text"
                  name="email"
                  placeholder="Nama Email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.password"
                  type="text"
                  name="password"
                  placeholder="password"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
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
                users: {}, //aray yang menmpung data dari table
                form: new Form({ //untuk menyimpan data
                    id: "",
                    name: "",
                    email: "",
                    password: ""                  
                })
            };
        },
        methods: {

             modalBaru(){
                    this.editmode= false;
                    this.form.reset();
                    $("#tambah").modal("show");
                },

            loadData() { //methods dari semua form CRUD Masuk ke dalam methods 
            axios.get("api/user").then(({ data }) =>(this.users = data)); 
            //untuk menampilkan data
          },
          
        createData() {
      this.form
        .post("api/user")
        .then(() => {
          this.$Progress.start();
          Fire.$emit("refreshData");
          $("#tambah").modal("hide");
        //   Toast.fire({
        //     type: "success",
        //     title: "Data Berhasi Tersimpan"
        //   });
          this.$Progress.finish();
        })
        .catch();
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
