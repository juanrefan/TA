<div class="page-header">
  <div class="header-title">Pesan Berjalan</div>
  <div class="header-button">
    <form method="post" action="/News_Running">
      <?php if (($_SESSION['UBSEEDRAROIHGEHITA'] & 2) > 0) {echo '<button type="button" class="btn btn-sm btnTambah" name="tombolForm" data-bs-toggle="modal" data-bs-target="#pesanBorang">Tambah</button>';}?>
      <button type="button" class="btn btn-sm btnRefresh" name="tombolForm" onclick="this.form.submit();">Perbaharui</button>
    </form>
  </div>
</div>
<div class="page-content">
  <table id="tblPesan" class="stripe">
    <thead><tr>
      <th class="kol1"></th>
      <th class="kol1">Pesan</th>
      <th class="kol2">Mulai</th>
      <th class="kol3">Akhir</th>
      <th class="kol4">Ubah</th>
      <th class="kol5">Pengubah</th>
      <th class="kolStatus">Status</th>
      <?php if (($_SESSION['UBSEEDRAROIHGEHITA'] & 2) > 0) {?><th class="kolEdit"></th><?php } ?>
      <?php if (($_SESSION['UBSEEDRAROIHGEHITA'] & 4) > 0) {?><th class="kolDelete"></th><?php } ?>
    </tr></thead>
    <tbody></tbody>
  </table>
</div>
<?php
  $kolSort= "'columnDefs': [{'targets':0, 'visible':false}";
  if (($_SESSION['UBSEEDRAROIHGEHITA'] & 2) > 0) {$kolSort .= ",{'targets':5, 'orderable':false}";}
  if (($_SESSION['UBSEEDRAROIHGEHITA'] & 4) > 0) {$kolSort .= ",{'targets':6, 'orderable':false}";}
  $kolSort .= "]";      
?>
<script id="pageScript" type="text/javascript">
$(document).ready(function () {ViewData();})

$(document).on("click", '#rdMulai0',function(e) {$("#dtMulai").prop('disabled',true);})
$(document).on("click", '#rdMulai1',function(e) {$("#dtMulai").prop('disabled',false);
  if($('#dtMulai').val().length==0) {
  var d=new Date(); thn=d.getFullYear(); bln=''+(d.getMonth()+1); tgl=''+d.getDate(); 
  if (bln.length < 2) {bln='0'+bln;} if (tgl.length < 2) {tgl='0'+bln;}
  $("#dtMulai").val(thn+'-'+bln+'-'+tgl);}})
$(document).on("click", '#rdAkhir0',function(e) {$("#dtAkhir").prop('disabled',true);})
$(document).on("click", '#rdAkhir1',function(e) {$("#dtAkhir").prop('disabled',false);
  if($('#dtAkhir').val().length==0) {
  var d=new Date(); thn=d.getFullYear(); bln=''+(d.getMonth()+1); tgl=''+d.getDate(); 
  if (bln.length < 2) {bln='0'+bln;} if (tgl.length < 2) {tgl='0'+bln;}
  $("#dtAkhir").val(thn+'-'+bln+'-'+tgl);}})

$(document).on("click", '.btnTambah',function(e) {
  $("#objekKode").val(''); $("#txtPesan").val(''); $("#rdMulai0").prop("checked",true); $("#dtMulai").val(''); $("#dtMulai").prop('disabled',true);
  $("#rdAkhir0").prop("checked",true); $("#dtAkhir").val(''); $("#dtAkhir").prop('disabled',true); $("#status0").prop("checked",true);})

$(document).on("click", '.btnEdit',function(e) { 
  $("#objekKode").val($(this).data('id')); $("#txtPesan").val($(this).data('teks')); 
  if($(this).data('mulaikode')==0) {$("#rdMulai0").prop("checked",true); $("#dtMulai").val(''); $("#dtMulai").prop('disabled',true);} else {$("#rdMulai1").prop("checked",true); $("#dtMulai").val($(this).data('mulai')); $("#dtMulai").prop('disabled',false);}
  if($(this).data('akhirkode')==0) {$("#rdAkhir0").prop("checked",true); $("#dtAkhir").val(''); $("#dtAkhir").prop('disabled',true);} else {$("#rdAkhir1").prop("checked",true); $("#dtAkhir").val($(this).data('akhir')); $("#dtAkhir").prop('disabled',false);}
  if($(this).data('kondisi')==0) {$("#status0").prop("checked",true);} else {$("#status1").prop("checked",true);}})

$(document).on("click", '.btnSimpan',function(e) {
  if ($("#status0").prop("checked")) {kondisi=0;} else {kondisi=1;} 
  if ($("#rdMulai0").prop("checked")) {mulai='';} else {mulai=$("#dtMulai").val();}
  if ($("#rdAkhir0").prop("checked")) {akhir='';} else {akhir=$("#dtAkhir").val();}
  if (confirm('Apakah data akan disimpan ?')){
    $.ajax({
    type: 'POST',
    url : 'ajax/desa',
    data: {proses:'SetRunningTeks',kode:$("#objekKode").val(), nama:$("#txtPesan").val(), tglMulai:mulai, tglAkhir:akhir, status:kondisi,
          menu:'<?php echo $menu;?>', pengguna:'<?php echo $_SESSION['IADXPWEONJGTGRULNA'];?>', password:'<?php echo $_SESSION['KIAYTWAPKBULNWCKIC'];?>', 
          fungsi:'<?php echo $_SESSION['UBSEEDRAROIHGEHITA'];?>', lokasi:'<?php echo get_client_address();?>'},
    beforeSend: function(e) {if (e && e.overrideMimeType) {e.overrideMimeType('application/json;charset=UTF-8');}},
    dataType: 'json',
    success: function(response) {alert(response.pesan); if (response.status==0) {ViewData(); $('#pesanBorang').modal('hide');}},
    error: function (xhr, ajaxOptions, thrownError) {alert(thrownError);},
    timeout: 3000});}})

$(document).on("click", '.btnDelete',function(e) {
  if (confirm('Apakah pesan \"'+$(this).data('teks')+'\" akan dihapus ?')) {
    $.ajax({
    type: 'POST',
    url : 'ajax/desa',
    data: {proses:'DelRunningTeks',kode:$(this).data('id'), menu:'<?php echo $menu;?>', pengguna:'<?php echo $_SESSION['IADXPWEONJGTGRULNA'];?>', 
          password:'<?php echo $_SESSION['KIAYTWAPKBULNWCKIC'];?>', fungsi:'<?php echo $_SESSION['UBSEEDRAROIHGEHITA'];?>', lokasi:'<?php echo get_client_address();?>'},
    beforeSend: function(e) {if (e && e.overrideMimeType) {e.overrideMimeType('application/json;charset=UTF-8');}},
    dataType: 'json',
    success: function(response) {alert(response.pesan); if (response.status==0) {ViewData();}},
    error: function (xhr, ajaxOptions, thrownError) {alert(thrownError);},
    timeout: 3000});}})

function ViewData() {
  $.ajax({
    type: 'POST',
    url : 'ajax/desa',
    data: {proses:'GetRunningTeks', status:-1, bentuk:0, menu:'<?php echo $menu;?>', pengguna:'<?php echo $_SESSION['IADXPWEONJGTGRULNA'];?>',
          password:'<?php echo $_SESSION['KIAYTWAPKBULNWCKIC'];?>', fungsi:'<?php echo $_SESSION['UBSEEDRAROIHGEHITA'];?>', 
          lokasi:'<?php echo get_client_address();?>'},
    beforeSend: function(e) {if (e && e.overrideMimeType) {e.overrideMimeType('application/json;charset=UTF-8');}},
    dataType: 'json',
    success: function(response) {
        halaman = $('#tblPesan').DataTable().page.info().page; urut = $('#tblPesan').DataTable().order();
        kolomurut=urut[0][0]; kolomarah=urut[0][1];
        $('#tblPesan').DataTable().clear(); $('#tblPesan').DataTable().destroy();  
        if (response.status == 1) {alert(response.pesan);} else {$('#tblPesan tbody').append(response.result);}
        $('#tblPesan').DataTable({dom:"ftip", <?php echo $kolSort;?>, 'pageLength': 25, "order": [[kolomurut, kolomarah]]});
        $('#tblPesan').DataTable().page(halaman).draw(false);},
    error: function (xhr, ajaxOptions, thrownError) {alert(thrownError);},
    timeout: 3000});}
</script>
<div class="modal fade" id="pesanBorang">
  <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header"><div class="header-title">Pesan Berjalan</div></div>
      <div class="modal-body">
        <div class="row">
          <div class="table-header pesan-header">Isi pesan</div>               
          <div class="table-separator"><b>:</b></div>               
          <div class="table-value pesan-content"><input type="text" id="txtPesan" maxlength="200" placeholder="Isi pesan berjalan"></div>               
        </div>        
        <div class="row">
          <div class="table-header pesan-header">Tanggal mulai</div>               
          <div class="table-separator"><b>:</b></div>               
          <div class="table-value pesan-content">
            <input type="radio" name="tglMulai" id="rdMulai0"> Sekarang &nbsp;&nbsp;
            <input type="radio" name="tglMulai" id="rdMulai1""> <input type="date" id="dtMulai" placeholder="Tanggal mulai tampilan"> 
          </div>               
        </div>        
        <div class="row">
          <div class="table-header pesan-header">Tanggal selesai</div>               
          <div class="table-separator"><b>:</b></div>               
          <div class="table-value pesan-content">
            <input type="radio" name="tglAkhir" id="rdAkhir0""> Selamanya &nbsp;
            <input type="radio" name="tglAkhir" id="rdAkhir1""> <input type="date" id="dtAkhir" placeholder="Tanggal akhir tampilan">
          </div>               
        </div>        
        <div class="row">
          <div class="table-header pesan-header">Status</div>               
          <div class="table-separator"><b>:</b></div>               
          <div class="table-value pesan-content">
            <input type="radio" name="status" id="status0"> Tidak aktif &nbsp;
            <input type="radio" name="status" id="status1"> Aktif
          </div>               
        </div>             
      </div>
      <div class="modal-footer">
        <input type="hidden" id="objekKode">
        <button type="button" class="btn btnSimpan btn-sm">Simpan</button>
        <button type="button" class="btn btnTutup btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>     