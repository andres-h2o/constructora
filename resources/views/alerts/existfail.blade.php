@if(Session::has('error'))
<div id="msj" class ="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('error')}}
</div>
@endif
