@extends('layouts.app')

@section('chart')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Statistiche ordini
                    </h1>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-end">
                    <a href="{{ route('admin.home') }}" class="btn btn-primary col-12 mb-2">
                        Torna alla home
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary col-12">
                        Torna agli ordini
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-5">
        <canvas style="max-width: 100%" id="myChart"></canvas>
    </div>
@endsection

@push('script-cdn')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('script-js')
    <script>
        var chartdata = {
            type: 'line',
            data: {
                labels: <?php echo json_encode($date); ?>,
                // labels: month,
                datasets: [{
                    label: 'Ordini giornalieri',
                    backgroundColor: 'yellow',
                    borderWidth: 3,
                    borderColor: 'red',
                    tension: 0.1,
                    data: <?php echo json_encode($orders); ?>
                }]
            },
        }
        var ctx = document.getElementById('myChart');
        new Chart(ctx, chartdata);
    </script>
@endsection
