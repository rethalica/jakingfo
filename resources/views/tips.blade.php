@extends('includes.homepage.header')

@section('content')
    <!-- tips -->
    <div class="bgim">
        <div class="overlay">
            <div class="container mt-3 p-4 text-white">
                <h2 class="text-white fw-bold mt-5">Tips Perjalanan</h2>
                <br />
                <div class="row bg-light p-4 tips-row">
                    <div class="col-sm-12 col-md-6 p-3 text-dark d-flex flex-column align-items-center">
                        <img src="{{ asset('assets/img/tips/publik.png') }}" class="img-thumbnail rounded" width="55%"
                            alt="Transportasi Publik" />
                        <div class="mt-3">
                            <h3>Gunakan Transportasi Publik</h3>
                        </div>
                        <br />
                        <p>
                            Memanfaatkan transportasi publik adalah salah satu cara paling
                            efisien untuk berkeliling kota Jakarta. Sebagai kota metropolis
                            dengan tingkat kemacetan yang tinggi, Jakarta telah
                            mengembangkan berbagai moda transportasi publik yang dapat
                            diandalkan. Menurut laporan TomTom Traffic Index 2023, Jakarta masuk ke daftar 10 kota paling
                            macet di Asia pada 2023. <br> <br> Riset ini dilakukan terhadap 387 kota dari 55 negara dan 6
                            benua. Kemacetan diukur berdasarkan rata-rata waktu tempuh berkendara sejauh 10 kilometer (km),
                            biaya bahan bakar, hingga emisi CO2 yang dihasilkan.

                            Hasilnya, pengendara di Ibu Kota membutuhkan waktu rata-rata 23 menit dan 20 detik per 10 km.
                            Ini menempatkan Indonesia sebagai kota paling macet ke-9 di Asia dan ke-30 secara global.

                        </p>
                        <div class="container mt-5">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 p-3 text-dark">
                        <img src="{{ asset('assets/img/tips/ojek.png') }}" class="img-thumbnail" width="55%"
                            alt="Ojek Online" />
                        <div class="mt-3">
                            <h3>Manfaatkan Ojek Online</h3>
                        </div>
                        <br />
                        <p>
                            Ojek online telah menjadi salah satu strategi cerdas dalam
                            berkeliling kota Jakarta. Layanan ojek online menawarkan
                            fleksibilitas yang tidak terkalahkan untuk mencapai
                            tempat-tempat yang mungkin kurang terjangkau oleh transportasi
                            umum.
                        </p>
                    </div>
                </div>
                <div class="row bg-light p-4 tips-row">
                    <div class="col-sm-12 col-md-6 p-3 text-dark">
                        <img src="{{ asset('assets/img/tips/barang.png') }}" class="img-thumbnail" width="55%"
                            alt="Barang Berharga" />
                        <div class="mt-3">
                            <h3>Waspada Barang Bawaan</h3>
                        </div>
                        <br />
                        <p>
                            Berhati-hati dengan barang bawaan Anda merupakan nasihat yang
                            sangat penting saat berkeliling kota Jakarta. Seperti halnya di
                            kota besar lainnya di dunia, Jakarta pun memiliki risiko
                            kehilangan barang akibat pencurian atau kelalaian. Oleh karena
                            itu, sangatlah bijaksana untuk selalu waspada terhadap barang
                            bawaan Anda.
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 p-3 text-dark">
                        <img src="{{ asset('assets/img/tips/waktu.png') }}" class="img-thumbnail" width="55%"
                            alt="Waktu Sibuk" />
                        <div class="mt-3">
                            <h3>Pilih Waktu yang Tepat</h3>
                        </div>
                        <br />
                        <p>
                            Memilih waktu yang tepat untuk berkeliling Jakarta dapat sangat
                            mempengaruhi kenyamanan dan efisiensi perjalanan Anda. Waktu
                            terbaik adalah di luar jam sibuk di pagi hari sekitar pukul
                            06.00-09.00 dan sore hari antara pukul 17.00-20.00 akan
                            menghemat waktu perjalanan Anda secara signifikan.
                        </p>
                    </div>
                </div>
                <script>
                    var ctx = document.getElementById('trafficChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Bengaluru', 'Pune', 'Manila', 'Taichung', 'Sapporo', 'Kaohsiung', 'Nagoya', 'Tokyo',
                                'Jakarta', 'Tainan'
                            ],
                            datasets: [{
                                label: 'Waktu Tempuh Rata-rata per 10 km (menit)',
                                data: [28.17, 27.83, 27.33, 26.83, 26.5, 26, 24.33, 23.33, 23.33, 22.17],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: '10 Kota dengan Tingkat Kemacetan Tertinggi di Asia pada 2023 (databoks.katadata.co.id)'
                                }
                            },
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
    </div>
    <!-- tips -->
@endsection
