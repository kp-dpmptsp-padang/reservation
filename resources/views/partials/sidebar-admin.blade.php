<!-- Sidebar -->
<aside
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidenav"
  id="drawer-navigation"
>
  <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
    <ul class="space-y-2">
      <li>
        <a
          href="{{ route('dashboard') }}"
          class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
          <svg
            aria-hidden="true"
            class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
          </svg>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>
      <li>
        <a
          href="{{ route('visits.index') }}"
          class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
          <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M12 4a4 4 0 100 8 4 4 0 000-8zM6 8a6 6 0 1112 0A6 6 0 016 8zm-2 8a2 2 0 00-2 2c0 1.7.75 3.2 2 4.2 1.25 1 3 1.8 5 2.2 2 .4 4.15.4 6.15 0 2-.4 3.75-1.2 5-2.2 1.25-1 2-2.5 2-4.2a2 2 0 00-2-2H4z"/>
          </svg>
          <span class="flex-1 ml-3 whitespace-nowrap">Kunjungan</span>
          @php
              $pendingCount = \App\Models\Visit::where('status', \App\VisitStatusEnum::PENDING)->count();
          @endphp
          <span
            class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800"
          >
            {{ $pendingCount }}
          </span>
        </a>
      </li>
      <li>
        <a
          href="{{ route('visits.recap') }}"
          class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group"
        >
          <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4a2 2 0 012-2h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V4zm2 0h14v16H5V4z"/>
            <path d="M15 8H9a1 1 0 000 2h6a1 1 0 100-2zM15 12H9a1 1 0 000 2h6a1 1 0 100-2zM11 16H9a1 1 0 000 2h2a1 1 0 100-2z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 16a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zM19 14a1 1 0 011 1v4a1 1 0 11-2 0v-4a1 1 0 011-1zM13 15a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1z"/>
          </svg>
          <span class="ml-3">Rekap</span>
        </a>
      </li>
    </ul>
    @can('is-superadmin')
    <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
      <li>
        <a
          href="{{ route('users.index') }}"
          class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group"
        >
          <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M9 12a4 4 0 100-8 4 4 0 000 8zm0-6a2 2 0 110 4 2 2 0 010-4z"/>
            <path d="M17 8a3 3 0 100-6 3 3 0 000 6zm0-4a1 1 0 110 2 1 1 0 010-2z"/>
            <path d="M15 14a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            <path d="M1 18a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H3a2 2 0 01-2-2v-2z"/>
          </svg>
          <span class="ml-3">Manajemen Admin</span>
        </a>
      </li>
    </ul>
    @endcan
  </div>
</aside>