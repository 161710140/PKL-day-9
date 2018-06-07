@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Traveler 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kategori.update',$kategori->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('Tempat_Wisata') ? ' has-error' : '' }}">
			  			<label class="control-label">Tempat Wisata</label>	
			  			<input type="text" name="Tempat_Wisata" class="form-control" value="{{ $kategori->Tempat_Wisata }}"  required>
			  			@if ($errors->has('Tempat_Wisata'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Tempat_Wisata') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection