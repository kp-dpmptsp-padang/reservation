@props(['route'])
<x-modal id="export-visits-modal" title="Ekspor Data Kunjungan">
    <div class="p-6">
        <form action="{{ $route }}" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Tipe Ekspor -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Tipe Ekspor
                    </label>
                    <select name="export_type" id="exportType" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md" required> 
                        <option value="">Pilih tipe ekspor</option>
                        <option value="monthly">Bulanan</option>
                        <option value="yearly">Tahunan</option>
                        <option value="custom">Rentang Tanggal</option>
                    </select>
                </div>

                <!-- Filter Bulanan -->
                <div id="monthlyFilter" class="hidden">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Bulan
                            </label>
                            <select name="month" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md">
                              @php
                                  $bulan = [
                                      '01' => 'Januari',
                                      '02' => 'Februari',
                                      '03' => 'Maret',
                                      '04' => 'April',
                                      '05' => 'Mei',
                                      '06' => 'Juni',
                                      '07' => 'Juli',
                                      '08' => 'Agustus',
                                      '09' => 'September',
                                      '10' => 'Oktober',
                                      '11' => 'November',
                                      '12' => 'Desember'
                                  ];
                              @endphp
                              
                              @foreach($bulan as $value => $nama)
                                  <option value="{{ $value }}">{{ $nama }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tahun
                            </label>
                            <select name="monthly_year" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md">
                                @foreach(range(date('Y'), 2020) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Filter Tahunan -->
                <div id="yearlyFilter" class="hidden">
                    <label class="block text-sm font-medium text-gray-700">
                        Tahun
                    </label>
                    <select name="year" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md">
                        @foreach(range(date('Y'), 2020) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Custom -->
                <div id="customFilter" class="hidden">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tanggal Mulai
                            </label>
                            <input type="date" name="start_date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tanggal Akhir
                            </label>
                            <input type="date" name="end_date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#00D5BE] focus:border-[#00D5BE] sm:text-sm rounded-md">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6 flex justify-end">
                <button type="button" class="mr-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50" onclick="closeModal('export-visits-modal')">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#00D5BE] border border-transparent rounded-md shadow-sm">
                    Ekspor PDF
                </button>
            </div>
        </form>
    </div>
</x-modal>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const exportType = document.getElementById('exportType');
    const monthlyFilter = document.getElementById('monthlyFilter');
    const yearlyFilter = document.getElementById('yearlyFilter');
    const customFilter = document.getElementById('customFilter');

    exportType.addEventListener('change', function() {
        // Sembunyikan semua filter
        monthlyFilter.classList.add('hidden');
        yearlyFilter.classList.add('hidden');
        customFilter.classList.add('hidden');

        // Tampilkan filter yang dipilih
        switch(this.value) {
            case 'monthly':
                monthlyFilter.classList.remove('hidden');
                break;
            case 'yearly':
                yearlyFilter.classList.remove('hidden');
                break;
            case 'custom':
                customFilter.classList.remove('hidden');
                break;
        }
    });
});
</script>