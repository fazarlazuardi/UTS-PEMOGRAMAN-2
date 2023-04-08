<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $("#table").DataTable();
        } );
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title></title>
  </head>
  <body style="background-color:rgb(136,206,235);">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
 
                <?php if(!empty(session()->getFlashdata('message'))) : ?>
 
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message');?>
                </div>
                    
                <?php endif ?>
 
               
                <a href="<?php echo base_url('dosen/input/') ?>" class="btn btn-md btn-warning mb-3 ">TAMBAH DATA</a>

                <table id="table" class="display">
                    <thead>
                        <tr>
                            <th>NAMA DOSEN</th>
                            <th>NIDN</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($dosens as $key => $dosen) : ?>
 <tr>
     <td><?php echo $dosen['NAMADOSEN'] ?></td>
     <td><?php echo $dosen['NIDN'] ?></td>
       <td><?php echo $dosen['ALAMAT'] ?></td>
     <td class="text-center">
         <a href="<?php echo base_url('dosen/update/'.$dosen['id']) ?>" class="btn btn-sm btn-primary">EDIT</a>
         <a href="<?php echo base_url('dosen/delete/'.$dosen['id']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
     </td>
 </tr>
<?php endforeach ?>
</tbody>
</table>            
            </div>
        </div>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>