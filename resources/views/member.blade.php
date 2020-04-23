<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Pembatas -->
	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success')}}
	</div>
	@endif

	@if(session('error'))
	<div class="alert alert-error">
		{{ session('error') }}
	</div>
	@endif
	<!-- Pembatas -->
	
	
	<table border="1" class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>No Telephone</th>
			<th>Edit/Delete</th>
		</tr>
		</thead>
		@foreach ($member as $row)
		<tr>
			<td>{{ isset($i) ? ++$i : $i=1 }}</td>
			<td>{{ $row->id}}</td>
			<td>{{ $row->nama}}</td>
			<td>{{ $row->alamat }}</td>
			<td>{{ $row->jenis_kelamin}}</td>
			<td>{{ $row->tlp}}</td>
			<td><a href="{{url('/member/'.$row->id.'/edit')}}" class="btn btn-success" style="width: 100px;">Edit</a>
				<form action="{{ url('member', $row->id)}}" method="POST">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-success" style="width: 100px; margin-top: 10px;">Delete</button>
			</form>
			</td>
		</tr>
		@endforeach
	</table>
	<a href="{{ url('/member/create') }}" class="btn btn-success">Tambah Member</a>
</body>
</html>