@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h2><center>Traveler Database</h2></center>
			  	</div>
				</div>
		<br>
			  <div class="row">
          <div class="col-lg-9">
         <h2 class="title-1 s-b-2"><a href="{{ route('artikel.create') }}">Tambah</a></h2>
      <div class="table-responsive table--no-card m-b-40">
             <table class="table table-borderless table-striped table-earning">
              <thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Judul</th>
					  <th>Content</th>
						<th>Tempat Wisata</th>
					  <th colspan="2">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($artikel as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->Judul }}</td>
				    	<td><p>{{ $data->content }}</p></td>
				    	<td><p>{{ $data->kategori->Tempat_Wisata }}</p></td>

</td>
<td>
<td>

	<form method="post" action="{{ route('artikel.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">
		<a class="btn btn-warning" href="{{ route('artikel.edit',$data->id) }}">Edit</a>
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection