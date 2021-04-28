@extends('layouts.dashboard')

@section('title', 'Admin | Charts')


@section('content')

<h1>{{$flat->title}}</h1>

<div class="charts">
    
        <canvas id="firstChart"></canvas>
        <canvas id="secondChart"></canvas>

        <script>

            var ctx = document.getElementById('firstChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Views', 'Messages'],
                    datasets: [{
                        label: 'View & Messages',
                        data: [{{$flat->views}}, '{{count($countMessages)}}'],
                        backgroundColor: [
                            'rgba(219, 76, 81, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(219, 76, 81, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx = document.getElementById('secondChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Views', 'Messages'],
                    datasets: [{
                        label: 'View & Messages',
                        data: [{{$flat->views}}, '{{count($countMessages)}}'],
                        backgroundColor: [
                            'rgba(219, 76, 81, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(219, 76, 81, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        </script>

    </div>
    
</div>

@endsection
