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

	<form action="{{ url('detail', @$detail->id) }}" method="POST">
		@csrf

		@if(!empty($detail))
			@method('PATCH')
		@endif
		<table border="1" class="table">
			<tr>
				<td>ID Transaksi</td>
				<td>ID Paket</td>
				<td>Kuantitas</td>
				<td>Keterangan</td>
			</tr>
			<tr>
				<td><select name="id_transaksi">
					<option value="1" {{ old('id_transaksi','@$detail->id_transaksi') == '1' ? 'selected' :'' }}>1</option>
				</select></td>
				<td><select name="id_paket">
					<option value="1" {{ old('id_paket','@$detail->id_paket') == '1' ? 'selected' :'' }}>1</option>
					<option value="2" {{ old('id_paket','@$detail->id_paket') == '2' ? 'selected' :'' }}>2</option>
				</select></td>
				<td><input type="text" name="qty" value="{{ old('qty',@$detail->qty) }}"></td>
				<td><input type="text" name="keterangan" value="{{ old('keterangan',@$detail->keterangan) }}"></td>
				
				
			</tr>
		</table>
		<button type="submit" value="simpan" class="btn btn-success">Simpan</button>
	</form>
	
</body>
</html>