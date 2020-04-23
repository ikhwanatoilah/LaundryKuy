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

	<form action="{{ url('user', @$user->id) }}" method="POST">
		@csrf

		@if(!empty($user))
			@method('PATCH')
		@endif
		<table border="1" class="table">
			<tr>
				<td>Nama</td>
				<td>Username</td>
				<td>Password</td>	
				<td>ID Outlet</td>
				<td>Role</td>
			</tr>
			<tr>
				<td><input type="text" name="nama" value="{{ old('nama', @$user->nama) }}" ></td>
				<td><input type="text" name="username" value="{{ old('username',@$user->username) }}" ></td>
				<td><input type="text" name="password" value="{{ old('password',@$user->password) }}" ></td>
				<td><select name="id_outlet">
					<option value="" {{ old('id_outlet','@$user->id_outlet') == '' ? 'selected' :'' }}>Pilih Outlet</option>
					<option value="1" {{ old('id_outlet','@$user->id_outlet') == '1' ? 'selected' :'' }}>Laundry</option>
				</select></td>
				<td><select name="role">
					<option value="" {{ old('role','@$user->role') == '' ? 'selected' :'' }}>Pilih Role</option>
					<option value="admin" {{ old('role','@$user->role') == 'admin' ? 'selected' :'' }}>Admin</option>
					<option value="kasir" {{ old('role','@$user->role') == 'kasir' ? 'selected' :'' }}>Kasir</option>
					<option value="owner" {{ old('role','@$user->role') == 'owner' ? 'selected' :'' }}>Owner</option>
				</select></td>
			</tr>
		</table>
		<button type="submit" value="simpan" class="btn btn-success">Simpan</button>
	</form>
	
</body>
</html>