<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Kategori</div>

                    <div class="card-body">
                    <td>
                      <button type="button" class="btn btn-block btn-secondary float-right"><i class="fas fa-user nav-icon"></i>User</button>
                       </td>
                      <td>
                       <button type="button" class="btn btn-success float-right"><i class="fas fa-bars nav-icon"></i>Tambah Kategori
                        </button>  
                        </td>      
                        <table class="table table-bordered">  
                            <thead>
                    <tr>
                      <th><center>Berita</center></th>
                      <th style="width :35%"><center>Jumlah Data </center></th> 
                      <th style="width :35%"><center>Aksi </center></th> 
                    </tr>
                    </thead>
                    <tbody>

                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center>
                    <tr>
                        <a href="#">
                        <i class="fas fa-eye red"> VIEW | </i>
                        </a>
                        <a href="#">
                        <i class="fas fa-edit pink">EDIT | </i>
                        </a>
                    </tr>
                    </center></td>
                    </tbody>
                        </table>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
