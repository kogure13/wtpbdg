
<script type="text/javascript">
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    
    $(document).ready(function () {
        var tabs = $("#tab").tabs({
            activate: function(event, ui){
                //get the active tab index
                var active = $("#tab").tabs("option", "active");

                //save it to cookies
                $.cookie("activeTabIndex", active);
            }
        });

        //read the cookie
        var activeTabIndex = $.cookie("activeTabIndex");

        //make active needed tab
        if(activeTabIndex !== undefined) {
            tabs.tabs("option", "active", activeTabIndex);
        }
        
        $("#txtDate").datepicker({           
           format: 'mm/yyyy',
           autoclose: true,
           minViewMode: 1
        });
        $("#txtYear").datepicker({           
           format: 'yyyy',
           viewMode: "years", 
           minViewMode: "years",
           autoclose: true
        });
        
        $(".date").datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
        });
        $(".nowDate").datepicker('setDate', new Date());

        $(".tbl-scroll").dataTable();

        $('[data-toggle="tooltip"]').tooltip();
        $('.bayarCash, .bayarAnggunan').hide()
    });

    $(function () {
        $(document).on('click', '.view', function (e) {
            e.preventDefault();

            $idClick = this.id;
            if ($idClick === "pelanggan-info") {
                $("#myModal").modal('show');
                $.post('model/modal.pelanggan.php', {id: $(this).attr('data-id')}, function (html) {
                    $(".modal-body").html(html);
                });
            } else if ($idClick === "abodemen-info") {
                $("#myModal").modal('show');
                $.post('model/modal.abodemen-info.php', {id: $(this).attr('data-id')}, function (html) {
                    $(".modal-body").html(html);
                });
            }
        });

        $('input[type="radio"]').click(function () {
            var infoTarif = $('#idInfoTarif').val();
            var jenisRek = $('#idRekening').val();

            if ($(this).attr("value") == "Cash") {
                $('.bayarCash').show();
                $('.bayarAnggunan').hide();
                $('.inputBayarAnggunan').attr("disabled", "disabled");
                $('#inputBayarCash').removeAttr("disabled", "disabled");

                $.post("model/data.infoTarif.php", {id: infoTarif, caraBayar: "Cash", jenisRek: jenisRek}, function (data) {
                    $('#nominalBayarCash').attr("value", data);
                });                
            }
            if ($(this).attr("value") == "Anggunan") {
                $('.bayarAnggunan').show();
                $('.bayarCash').hide();
                $('.inputBayarAnggunan').removeAttr("disabled", "disabled");
                $('#inputBayarCash').attr("disabled", "disabled");
                $('#jangkaBayar').on('change', function () {
                    var tenor = this.value;

                    $.post("model/data.infoTarif.php", {id: infoTarif, caraBayar: "Anggunan", jenisRek: jenisRek, tenor: tenor}, function (data) {
                        $('#nominalBayarAnggunan').attr("value", data);
                    });
                });
            }                                    
        });
    });
</script>
