<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    


    <div class="row">
    <div class="col-md-12">
        
        <div class="box box-primary with-border">
            <div class="box-header">
                <!-- <h3 class="box-title">Data Perangkat</h3> -->
            </div>
            <div class="box-body">
              <form action="">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <!-- <span class="h4"><i class="fa fa-sort-amount-asc fa-fw"></i> Filter Data</span> -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="kategori" class="form-control">
                                <option value>Pilih kategori...</option>
                                <?php  foreach ($data_kategori as $key => $value) :?>
                                <option value="<?=$value->id?>"><?=$value->name?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="brand" class="form-control">
                                <option value>Pilih brand...</option>
                                <?php  foreach ($data_brand as $key => $value) :?>
                                <option value="<?=$value->id?>"><?=$value->name?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-sort-amount-asc fa-fw"></i>Filter Data
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                        </div>
                    </div>
                </div>
              </form>

                <div class="table-responsive">
                    <table id="table_perangkat" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Brand</th>
                                <th>Tipe</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data_barang as $key => $value): ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><span class="badge badge-primary py-1 px-3"><b><?=$value['kode']?></b></span></td>
                                <td><?=$value['name']?></td>
                                <td><?=$value['brand']?></td>
                                <td><?=$value['tipe']?></td>
                                <td><?=$value['kategori']?></td>
                                <td><?=$value['jumlah']?></td>
                                <td><a href="#" class="btn btn-xs btn-success"><b>Lihat Detail</b></a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('DataMaster/create')?>" method="POST">
      <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="name" placeholder="Nama">
          </div>
          <div class="form-group">
            <select name="brand_id" class="form-control">
                <option value>Pilih brand...</option>
                <?php  foreach ($data_brand as $key => $value) :?>
                <option value="<?=$value->id?>"><?=$value->name?></option>
                <?php endforeach?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="tipe" placeholder="Tipe">
          </div>
          <div class="form-group">
            <select name="kategori_id" class="form-control">
                <option value>Pilih brand...</option>
                <?php  foreach ($data_kategori as $key => $value) :?>
                <option value="<?=$value->id?>"><?=$value->name?></option>
                <?php endforeach?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="jumlah" placeholder="Jumlah">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 