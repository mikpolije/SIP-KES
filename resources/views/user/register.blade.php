<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8fafc;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            padding: 30px 0;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .register-container form input,
        .register-container form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .register-container form button {
            width: 100%;
            padding: 10px;
            background-color: #38c172;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .register-container form button:hover {
            background-color: #2d995b;
        }
        .alert {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>

        @if (session('success'))
            <div class="alert" style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.users') }}">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <input type="text" name="nik" placeholder="NIK" value="{{ old('nik') }}" required>
            <input type="text" name="profesi" placeholder="Profesi" value="{{ old('profesi') }}" required>
            <input type="text" name="no_telepon" placeholder="Nomor Telepon" value="{{ old('no_telepon') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <textarea name="alamat" rows="3" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
