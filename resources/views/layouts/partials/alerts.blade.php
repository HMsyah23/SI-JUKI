@if(session('success'))
<script type="text/javascript">
  swal("Success!", "{!! Session::get('success') !!}", "success");
</script>
@endif
@if(session('error'))
<script type="text/javascript">
  swal("Gagal !", "{!! Session::get('error') !!}", "error");
</script>
@endif

@if($errors->any())
<script type="text/javascript">
  swal("Gagal !", "{!! implode('', $errors->all('<div>:message</div>')) !!}", "error");
</script>
@endif