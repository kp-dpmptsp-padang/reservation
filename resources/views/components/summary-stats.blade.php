<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        @foreach($stats as $stat)
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="p-3 rounded-full {{ $stat['color'] }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                        </svg>
                    </span>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">{{ $stat['title'] }}</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>