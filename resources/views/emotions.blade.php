@extends('layouts.main')

@section('container')
    <h2 class="text-center p-3">Pemantauan Emosi {{ auth()->user()->name }}</h2>
    <div class="container mt-3">
        <div class="row bg-sagegrey">
            <div class="col-md-6 border border-secondary rounded">
                <h4 class="mb-4">Monitor Emosi</h4>

                <!-- Form untuk memasukkan data emosi -->
                <div class="mb-4">
                    <form action="{{ route('emotions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="emotion" class="form-label">Emosi:</label>
                            <select class="form-select" name="emotion" id="emotion">
                                <option value="Bahagia">Bahagia</option>
                                <option value="Sedih">Sedih</option>
                                <option value="Marah">Marah</option>
                                <option value="Takut">Takut</option>
                                <option value="Bersemangat">Bersemangat</option>
                                <option value="Terkejut">Terkejut</option>
                                <option value="Kesal">Kesal</option>
                                <option value="Puas">Puas</option>
                                <option value="Cemas">Cemas</option>
                                <option value="Bangga">Bangga</option>
                                <option value="Percaya Diri">Percaya Diri</option>
                                <option value="Terima Kasih">Terima Kasih</option>
                                <option value="Malu">Malu</option>
                                <option value="Iri Hati">Iri Hati</option>
                                <option value="Ragu">Ragu</option>
                                <option value="Kesepian">Kesepian</option>
                                <option value="Penuh Harapan">Penuh Harapan</option>
                                <option value="Gugup">Gugup</option>
                                <option value="Bersalah">Bersalah</option>
                                <option value="Cemburu">Cemburu</option>
                                <option value="Frustasi">Frustasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Apa yang terjadi hari ini?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Rekap</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 border border-secondary rounded">
                <!-- Statistik Emosi -->
                <h4 class="mb-3">Statistik Emosi</h4>
                <canvas id="emotionChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('emotionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Emotion Count',
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: {!! json_encode($chartData['backgroundColor']) !!},
                    borderColor: {!! json_encode($chartData['borderColor']) !!},
                    borderWidth: {!! json_encode($chartData['borderWidth']) !!}
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>

    <div class="container p-3">
         <!-- Daftar emosi yang sudah dimasukkan -->
        <h4 class="my-3 text-center">Catatan Harian {{ auth()->user()->name }}</h4>
        <div class="row border border-secondary rounded p-3">
        @foreach ($emotions as $emotion)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $emotion->emotion }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $emotion->created_at->format('F j, Y - H:i') }}</h6>
                    <p class="card-text">{{ $emotion->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
