<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
<button class="btn btn-success"   type="button" data-toggle="modal" data-target="#exampleModal">
     <i class="fas fa-plus"></i>
Tambah
</button>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>namabarang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    $no = 1;
                    foreach($datamenu as $data => $menu){
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $menu['namabarang'];?></td>
                        <td><?= $menu['jumlah'];?></td>
                        <td><?= $menu['harga'];?></td>
                        <td>
                        <a href="<?= base_url('dashboard/edit_barang/'.$menu['id']); ?>" class="btn btn-warning btn-circle">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('dashboard/delete_barang/'.$menu['id']); ?>" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                <?php
                    
                $no++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/create_barang'); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input type="text" class="form-control" name="namabarang" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">jumlah</label>
                <input type="number" class="form-control" name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>
            
            
                
          
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>