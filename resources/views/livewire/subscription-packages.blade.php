<div>
    <h1>Paket Subscription</h1>

    @if($packages->isEmpty())
        <div class="alert alert-warning">Tidak ada paket subscription tersedia.</div>
    @else
        <div class="row">
            @foreach($packages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header text-center">
                            <h5 class="card-title">{{ $package->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $package->description }}</p>
                            <p class="card-text"><strong>Durasi:</strong> {{ $package->duration }} hari</p>
                            <p class="card-text"><strong>Harga:</strong>
                                @foreach ($package->prices as $price)
                                    {{ $price->price }} {{ $price->currency_code ?? 'Currency' }}<br>
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Berlangganan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


{{--<div>--}}
{{--    <h1>Hello World!</h1>--}}
{{--</div>--}}

{{--<script>--}}
{{--    var country = @json($country);--}}
{{--    function changeLanguage(language) {--}}
{{--        window.location.href = `/${country.country_code}/${language}`;--}}
{{--    }--}}
{{--</script>--}}
