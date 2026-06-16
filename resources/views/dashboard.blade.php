@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
</div>

<!-- Statistik (grafik) -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="activity-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Statistik Website</h4>
                <small class="text-muted">Ringkasan</small>
            </div>
            <div style="height:260px;">
                <canvas id="dashboardChart" style="width:100%; height:260px;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities (dynamic) -->
<div class="activity-card">
    <h4 class="mb-4">Aktivitas Terbaru</h4>
    @php
        use App\Models\Informasi;
        use App\Models\Galeri;

        $informasi = Informasi::published()->select(['id','judul','created_at'])->get();
        $galeri = Galeri::published()->select(['id','judul','created_at'])->get();

        // merge and sort by created_at desc, then take first 6
        $items = $informasi->merge($galeri)->sortByDesc('created_at')->values()->take(6);
    @endphp

    @forelse($items as $item)
        @php
            $isInformasi = $informasi->contains('id', $item->id) && $informasi->firstWhere('id', $item->id) !== null;
            $icon = $isInformasi ? 'fa-newspaper' : 'fa-image';
            $title = $item->judul ?? ($item->judul ?? 'Entry');
        @endphp

        <div class="activity-item d-flex align-items-center">
            <i class="fas {{ $icon }}"></i>
            <div>
                <p class="mb-1 fw-semibold">{{ Str::limit($title, 80) }}</p>
                <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada aktivitas terbaru.</p>
    @endforelse
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    (function(){
        const informasiCount = {{ json_encode($totalInformasi ?? \App\Models\Informasi::count()) }};
        const galeriCount = {{ json_encode($totalGaleri ?? \App\Models\Galeri::count()) }};
        const userCount = {{ json_encode(\App\Models\User::count()) }};

        const el = document.getElementById('dashboardChart');
        if(!el) return;

        const ctx = el.getContext('2d');
        // create vertical gradients
        const gradInformasi = ctx.createLinearGradient(0,0,0,250);
        gradInformasi.addColorStop(0, 'rgba(59,130,246,0.95)');
        gradInformasi.addColorStop(1, 'rgba(99,102,241,0.9)');

        const gradGaleri = ctx.createLinearGradient(0,0,0,250);
        gradGaleri.addColorStop(0, 'rgba(16,185,129,0.95)');
        gradGaleri.addColorStop(1, 'rgba(5,150,105,0.9)');

        const gradUsers = ctx.createLinearGradient(0,0,0,250);
        gradUsers.addColorStop(0, 'rgba(245,158,11,0.95)');
        gradUsers.addColorStop(1, 'rgba(217,119,6,0.9)');

        Chart.register(ChartDataLabels);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Informasi','Galeri','Pengunjung Terdaftar'],
                datasets: [{
                    label: 'Jumlah',
                    data: [informasiCount, galeriCount, userCount],
                    backgroundColor: [gradInformasi, gradGaleri, gradUsers],
                    borderRadius: 8,
                    barPercentage: 0.6,
                    categoryPercentage: 0.6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#374151' }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(15,23,42,0.06)' },
                        ticks: {
                            callback: function(value){ return new Intl.NumberFormat('id-ID').format(value); },
                            color: '#6b7280'
                        }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(17,24,39,0.95)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        callbacks: {
                            label: function(context){
                                const v = context.parsed.y ?? context.raw;
                                return 'Jumlah: ' + new Intl.NumberFormat('id-ID').format(v);
                            }
                        }
                    },
                    datalabels: {
                        color: '#0f172a',
                        anchor: 'end',
                        align: 'start',
                        offset: -6,
                        formatter: function(value){ return new Intl.NumberFormat('id-ID').format(value); },
                        font: { weight: '700' }
                    }
                }
            }
        });
    })();
</script>
@endpush
