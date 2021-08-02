<div class="col-lg-6">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Barang</h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('dashboard/proses_edit_barang/'.$datamenu[0]['id']); ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang" value="<?= set_value('namabarang',$datamenu[0]['namabarang']) ?> " required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="<?= set_value('jumlah',$datamenu[0]['jumlah']) ?>"  required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">harga</label>
                    <input type="number" class="form-control" name="harga" value="<?= set_value('harga',$datamenu[0]['harga']) ?>"  required>
                </div>
                

                

                <div class="mt-4">
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button background-color="#B22222">Simpan</button>
                </div>
        </form>
        </div>
    </div>

</div>

