<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if(isset($header))
                    <div class="card-header">
                        <h2 class="card-title">{{ $header }}</h2>
                    </div>
                @endif

                <div class="card-body">
                    @yield('content')
                </div>

                @if(isset($footer))
                    <div class="card-footer">
                        {{ $footer }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
