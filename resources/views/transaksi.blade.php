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
  	<!-- Styles -->
        <style>
/*            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }*/
        </style>
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
	
	
<table>
	<tr>
		<td>
			<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}" class="btn btn-danger">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
		</td>
		<td><a href="{{ url('/transaksi/create') }}" class="btn btn-success">Tambah Transaksi</a></td>
	</tr>
	
</table>
    <table border="1" class="table table-hover">
	<thead class="thead-dark">
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Kode Invoice</th>
		<th>Tanggal Pesan</th>
		<th>Batas Waktu Pembayaran</th>
		<th>Tanggal Bayar</th>
		<th>Biaya Tambahan</th>
		<th>Diskon</th>
		<th>Pajak</th>
		<th>Status</th>
		<th>Status Bayar</th>
		<th>Edit/Delete</th>
	</tr>
	</thead>
	@foreach ($transaksi as $row)
		<tr>
			<td>{{ isset($i) ? ++$i : $i=1 }}</td>
			<td>{{ $row->id}}</td>
			<td>{{ $row->kode_invoice }}</td>
			<td>{{ $row->tgl }}</td>
			<td>{{ $row->batas_waktu}}</td>
			<td>{{ $row->tgl_bayar}}</td>
			<td>{{ $row->biaya_tambahan }}</td>
			<td>{{ $row->diskon }}</td>
			<td>{{ $row->pajak }}</td>
			<td>{{ $row->status }}</td>
			<td>{{ $row->dibayar }}</td>
			<td><a href="{{url('/transaksi/'.$row->id.'/edit')}}" class="btn btn-success" style="width: 100px;">Edit</a>
				<form action="{{ url('transaksi', $row->id)}}" method="POST">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-success" style="width: 100px; margin-top: 10px;">Delete</button>
			</form>
			</td>
		</tr>
		@endforeach
	</table>
   </div>
   
</body>
</html>