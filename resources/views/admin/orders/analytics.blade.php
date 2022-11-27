@extends('layouts.app')

@section('chart')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-start">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Statistiche ordini
                    </h1>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-end">
                    <a href="{{ route('admin.orders.index') }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
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
                    data: <?php echo json_encode($orders); ?>,
                    borderWidth: 3,
                    tension: 0.2,
                    borderColor: '#4C5355',
                    backgroundColor: '#C44B4F',
                    pointStyle: 'circle',
                    pointRadius: 3,
                    pointHoverRadius: 10,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        min: 0,
                        max: 10,
                    },
                },
            },
        }
        var ctx = document.getElementById('myChart');
        new Chart(ctx, chartdata);
    </script>
@endsection
