<form action="/register-travel" method="POST">
    @csrf
    <label for="name">Nama Travel</label>
    <input type="text" name="name" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="domain">Subdomain (tanpa .ummro.com)</label>
    <input type="text" name="domain" required>

    <button type="submit">Daftar Travel</button>
</form>
