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
	
	@if(session('error'))
	<div class="alert alert-error">
		{{ session('error') }}
	</div>
	@endif

	@if (count($errors) > 0)
	<div class="alert alert-error">
		<strong>Perhatian</strong>
		<br />
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ url('outlet', @$outlet->id) }}" method="POST">
		@csrf

		@if(!empty($outlet))
			@method('PATCH')
		@endif
		<table class="table" border="1">
			<tr>
				<td>Nama</td>
				<td>Alamat</td>
				<td>Telepon</td>
			</tr>
			<tr>
				<td><input type="text" name="nama" value="{{ old('nama', @$outlet->nama) }}"></td>
				<td><input type="text" name="alamat" value="{{ old('alamat', @$outlet->alamat) }}"></td>
				<td><input type="text" name="tlp" value="{{ old('tlp', @$outlet->tlp) }}"></td>
			</tr>
		</table>
		<button type="submit" value="simpan" class="btn btn-success">Simpan</button>
	</form>
	
</body>
</html>