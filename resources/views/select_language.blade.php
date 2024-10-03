<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Negara dan Bahasa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Pilih Negara dan Bahasa</h1>

    <form action="{{ route('set.country.language') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="country">Pilih Negara:</label>
            <select name="country_code" id="country" class="form-control" required>
                @foreach ($countries as $country)
                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="language">Pilih Bahasa:</label>
            <select name="language" id="language" class="form-control" required>
                <option value="id">Bahasa Indonesia</option>
                <option value="en">English</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>
</div>
</body>
</html>
