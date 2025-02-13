<div>
    <div class="mb-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold mb-4">Kunjungan per Bulan ({{ Carbon\Carbon::now()->year }})</h3>
            <div class="relative h-[400px]">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold mb-8 text-center">Kunjungan Berdasarkan Provinsi</h3>
            <div class="relative h-[300px]">
                <canvas id="provinceChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-lg font-semibold mb-8 text-center">Kunjungan Berdasarkan Kota</h3>
            <div class="relative h-[300px]">
                <canvas id="cityChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('monthlyChart'), {
        type: 'line',  
        data: {
            labels: @json(array_map(function($month) use ($monthNames) {
                return $monthNames[$month];
            }, array_keys($monthlyVisits))),
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: @json(array_values($monthlyVisits)),
                backgroundColor: 'rgba(0, 213, 190, 0.1)',
                borderColor: '#00D5BE',
                borderWidth: 2,               
                tension: 0.3,                 
                fill: true,                  
                pointBackgroundColor: '#00D5BE', 
                pointBorderColor: '#00D5BE',     
                pointBorderWidth: 2,          
                pointRadius: 5,               
                pointHoverRadius: 7           
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            interaction: {
                intersect: false,             
                mode: 'index'
            }
        }
    });

    new Chart(document.getElementById('provinceChart'), {
        type: 'doughnut',
        data: {
            labels: @json(array_keys($provinceVisits)),
            datasets: [{
                data: @json(array_values($provinceVisits)),
                backgroundColor: [
                    '#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#6366F1',
                    '#8B5CF6', '#EC4899', '#14B8A6', '#F97316', '#84CC16'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });

    new Chart(document.getElementById('cityChart'), {
        type: 'doughnut',
        data: {
            labels: @json(array_keys($cityVisits)),
            datasets: [{
                data: @json(array_values($cityVisits)),
                backgroundColor: [
                    '#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#6366F1',
                    '#8B5CF6', '#EC4899', '#14B8A6', '#F97316', '#84CC16'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>
@endpush