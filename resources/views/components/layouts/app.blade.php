<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <livewire:styles />
</head>
<body>

{{ $slot }}

<livewire:scripts />
</body>
</html>

<script>
    // Toggle dropdown visibility for Country
    document.getElementById('countryDropdownBtn').addEventListener('click', function() {
        var dropdownMenu = document.getElementById('countryDropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Toggle dropdown visibility for Language
    document.getElementById('languageDropdownBtn').addEventListener('click', function() {
        var dropdownMenu = document.getElementById('languageDropdownMenu');
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdowns if clicked outside
    document.addEventListener('click', function(e) {
        var countryBtn = document.getElementById('countryDropdownBtn');
        var languageBtn = document.getElementById('languageDropdownBtn');
        var countryMenu = document.getElementById('countryDropdownMenu');
        var languageMenu = document.getElementById('languageDropdownMenu');

        if (!countryBtn.contains(e.target)) {
            countryMenu.classList.add('hidden');
        }

        if (!languageBtn.contains(e.target)) {
            languageMenu.classList.add('hidden');
        }
    });
</script>


