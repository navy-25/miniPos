<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable( {responsive: true,});
        $("#select_kategori").select2({
            theme: 'bootstrap4',
            placeholder: "Pilih Kategori"
        });
    });

    function reset_form(data) {
        data.forEach(id => {
            document.getElementById(id).value = "";
        });
    }

    function delete_confirm(title,url){
        event.preventDefault();
        Swal.fire({
            title:'Apakah anda yakin menghapus '+title+' ?',
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Hapus",
            confirmButtonColor: "#dc3545",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
    function modal_update_users(data,url){
        var data = JSON.parse(data)
        document.getElementById('name-update').value = data.name
        document.getElementById('email-update').value = data.email
        $('.modal-update').attr('action',url);
    }

    function modal_update_product(data,url){
        var data = JSON.parse(data)
        document.getElementById('nama_produk_update').value = data.nama_produk
        document.getElementById('harga_update').value = data.harga
        document.getElementById('deskripsi_produk_update').value = data.deskripsi_produk
        $.get("/getKategori", function(response){
            $(".select_kategori").html("");
            response.forEach(x => {
                if(x.id == data.id_kategori){
                    $(".select_kategori").append(`<option value="`+x.id+`" selected>`+x.nama_kategori+`</option>`);
                }else{
                    $(".select_kategori").append(`<option value="`+x.id+`">`+x.nama_kategori+`</option>`);
                }
            });
        });
        $.get("/getSupplier", function(response){
            $(".select_supplier").html("");
            response.forEach(x => {
                if(x.id == data.id_supplier){
                    $(".select_supplier").append(`<option value="`+x.id+`" selected>`+x.nama_supplier+`</option>`);
                }else{
                    $(".select_supplier").append(`<option value="`+x.id+`">`+x.nama_supplier+`</option>`);
                }
            });
        });

        $('.modal-update').attr('action',url);
    }

    function modal_update_supplier(data,url){
        var data = JSON.parse(data)
        document.getElementById('nama_supplier-update').value = data.nama_supplier
        document.getElementById('email-update').value = data.email
        document.getElementById('telepon-update').value = data.telepon
        document.getElementById('alamat-update').value = data.alamat
        $('.modal-update').attr('action',url);
    }
    function modal_update_pelanggan(data,url){
        var data = JSON.parse(data)
        document.getElementById('nama_pelanggan-update').value = data.nama_pelanggan
        document.getElementById('telepon-update').value = data.telepon
        $('.modal-update').attr('action',url);
    }
    function modal_update_kategori(data,url){
        var data = JSON.parse(data)
        document.getElementById('nama_kategori-update').value = data.nama_kategori
        $('.modal-update').attr('action',url);
    }

    function minqty(text_qty,value_qty){
        var qty = document.getElementById(text_qty).innerHTML
        if(parseInt(qty)  == 0){
            document.getElementById('btn_min').disable
        }else{
            var new_qty = parseInt(qty) - 1
            document.getElementById(text_qty).innerHTML = new_qty
            var val_qty = document.getElementById(value_qty).value = new_qty
        }
    }
    function addqty(text_qty,value_qty){
        var qty = document.getElementById(text_qty).innerHTML
        var new_qty = parseInt(qty) + 1
        document.getElementById(text_qty).innerHTML =new_qty
        var val_qty = document.getElementById(value_qty).value = new_qty
    }
</script>
