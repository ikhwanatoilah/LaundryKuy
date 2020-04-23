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

	<form action="{{ url('paket', @$paket->id) }}" method="POST">
		@csrf

		@if(!empty($paket))
			@method('PATCH')
		@endif
		<table border="1" class="table">
			<tr>
				<td>ID Outlet</td>
				<td>Jenis</td>
				<td>Nama Paket</td>
				<td>Harga</td>
			</tr>
			<tr>
				<td><select name="id_outlet">
					<option value="1" {{ old('id_outlet','@$paket->id_outlet') == '1' ? 'selected' :'' }}>1</option>
				</select></td>
				<td><select name="jenis">
					<option value="kaos" {{ old('jenis','@$paket->jenis') == 'kaos' ? 'selected' :'' }}>Kaos</option>
					<option value="kiloan" {{ old('jenis','@$paket->jenis') == 'kiloan' ? 'selected' :'' }}>Kiloan</option>
					<option value="selimut" {{ old('jenis','@$paket->jenis') == 'selimut' ? 'selected' :'' }}>Selimut</option>
					<option value="bed_cover" {{ old('jenis','@$paket->jenis') == 'bed_cover' ? 'selected' :'' }}>Bed Cover</option>
					<option value="kain" {{ old('jenis','@$paket->jenis') == 'kain' ? 'selected' :'' }}>Kain</option>
				</select></td>
				<td><input type="text" name="nama_paket" value="{{ old('nama_paket', @$paket->nama_paket) }}"></td>
				<td><input type="harga" name="harga" value="{{ old('harga', @$paket->harga) }}" ></td>
			</tr>
		</table>
		<button type="submit" value="simpan" class="btn btn-success">Simpan</button>
	</form>
	
</body>
</html>