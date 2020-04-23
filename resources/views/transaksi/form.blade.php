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

<style type="text/css">
	
</style>
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
	
	<form action="{{ url('transaksi', @$transaksi->id) }}" method="POST">
		@csrf

		@if(!empty($transaksi))
			@method('PATCH')
		@endif
		<table border="1" class="table">
			<tr>
				<td>Outlet</td>
				<td>Kode Invoice</td>
				<td>ID Member</td>
				<td>Tanggal</td>
				<td>Batas Waktu</td>
				<td>Tanggal Bayar</td>
				<td>Biaya Tambahan</td>
				<td>Discount</td>
				<td>Pajak</td>
				<td>Status Pemrosesan</td>
				<td>Status Dibayar</td>
				<td>User Yang Menangani</td>

			</tr>
			<tr>
				<td><select name="id_outlet">
					<option value="1" {{ old('id_outlet','@$transaksi->id_outlet') == '1' ? 'selected' :'' }}>Ujang</option>
				</select></td>
				<td><input type="text" name="kode_invoice" value="{{ old('kode_invoice', @$transaksi->kode_invoice) }}"></td>
				
				<td>
					<select name="id_member">
					<option value="1" {{ old('id_member','@$transaksi->id_member') == '1' ? 'selected' :'' }}>Asd</option>
					</select>
				</td>

				<td><input type="datetime-local" name="tgl" value="{{ old('tgl', @$transaksi->tgl) }}"></td>
				<td><input type="datetime-local" name="batas_waktu" value="{{ old('batas_waktu', @$transaksi->batas_waktu) }}"></td>
				<td><input type="datetime-local" name="tgl_bayar" value="{{ old('tgl_bayar', @$transaksi->tgl_bayar) }}"></td>
				<td><input type="number" name="biaya_tambahan" value="{{ old('biaya_tambahan', @$transaksi->biaya_tambahan) }}"></td>
				<td><input type="text" name="diskon" value="{{ old('diskon', @$transaksi->diskon) }}"></td>
				<td><input type="number" name="pajak" value="{{ old('pajak', @$transaksi->pajak) }}"></td>
				
				<td>
					<select name="status">
					<option value="baru" {{ old('status','@$transaksi->status') == 'baru' ? 'selected' :'' }}>Baru</option>
					<option value="proses" {{ old('status','@$transaksi->status') == 'proses' ? 'selected' :'' }}>Proses</option>
					<option value="selesai" {{ old('status','@$transaksi->status') == 'selesai' ? 'selected' :'' }}>Selesai</option>
					<option value="diambil" {{ old('status','@$transaksi->status') == 'diambil' ? 'selected' :'' }}>Diambil</option>
					</select>
				</td>

				<td>
					<select name="dibayar">
					<option value="dibayar" {{ old('dibayar','@$transaksi->dibayar') == 'dibayar' ? 'selected' :'' }}>Dibayar</option>
					<option value="belum_bayar" {{ old('dibayar','@$transaksi->dibayar') == 'belum_bayar' ? 'selected' :'' }}>Belum Bayar</option>
					</select>
				</td>
				<td>
					<select name="id_user">
					<option value="1" {{ old('id_user','@$transaksi->id_user') == '1' ? 'selected' :'' }}>nama</option>
					<option value="2" {{ old('id_user','@$transaksi->id_user') == '2' ? 'selected' :'' }}>asd</option>
					</select>
				</td>
			</tr>
		</table>
		<button type="submit" value="simpan" class="btn btn-success">Simpan</button>
	</form>
	
</body>
</html>