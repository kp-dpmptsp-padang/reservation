@props(['title', 'description', 'headings', 'rows', 'actions'])

<div>
<!-- Table Section -->
<div class="max-w-[85rem] px-2 py-5 sm:px-3 lg:px-4 lg:py-3 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
            <div>
              <h2 class="text-xl font-semibold text-gray-800">
                {{ $title }}
              </h2>
              <p class="text-sm text-gray-600">
                {{ $description }}
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                {{ $actions }}
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                {{ $headings }}
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              {{ $rows }}
            </tbody>
          </table>
          <!-- End Table -->

          <!-- Footer -->
          <div class="px-4 py-2 border-t border-gray-200">
            {{ $footer }}
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->
</div>