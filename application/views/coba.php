<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table" id="dynamic">
                                <tr>
                                    <td><input type="text" placeholder="Masukkan Nama" class="form-control" /></td>
                                    <td><button type="button" id="tambah" class="btn btn-success">Add</button></td>
                                </tr>
                            </table>
                            <input type="button" id="submit" class="btn btn-info" value="KIRIM" />
                        </div>
                    </div>
                </div>
 </div>
</div>

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
                
                var no =1;
                $('#tambah').click(function(){
                    no++;
                    $('#dynamic').append('<tr id="row'+no+'"><td><input type="text" name="name[]" placeholder="Masukkan Nama" class="form-control" /></td><td><button type="button" id="'+no+'" class="btn btn-danger btn_remove">Hapus</button></td></tr>');
                });

                $(document).on('click', '.btn_remove', function(){
                    var button_id = $(this).attr("id"); 
                    $('#row'+button_id+'').remove();
                });
            });
    </script>

    </body>
</html>