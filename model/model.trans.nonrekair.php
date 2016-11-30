<script type="text/javascript">
    $(function () {
        $("#vForm").validate({
            rules: {
                infoTarif: "required",
                alamat: "required",
                rekening: "required"                
            },
            messages: {
                infoTarif: " *) harus diisi",
                alamat: " *) harus diisi",
                rekening: " *) harus diisi"                
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        
        $("#alamat").autocomplete({
            source: "model/model.auto.trans.rekair.php",
            minLength: 2,
            select: function(event, ui){
                event.preventDefault();
                $("#alamat").val(ui.item.label);
                this.value = ui.item.label;
                $("#pelanggan").val(ui.item.value);
                $("#id_pel").val(ui.item.id_pel);
            }
        });                
    });        
</script>

<?php
$userUI = new User;
$dtaCRUD = new CRUD;
$dataPelanggan = new Pelanggan;
$dtaLoket = new Main;

$tableName = "wtp_tagihan_nonair";
$act = "crud.trans.nonrekair";
$page_before = "?page=views.trans.nonrekair";
