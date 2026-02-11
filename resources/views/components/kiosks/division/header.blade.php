{{-- Head --}}
<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    {{-- Button Presensi --}}
    <!-- Check in modal -->
    <div
        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <form action="{{ route('kiosk.division.store') }}" method="POST">
            @csrf

            <div class="flex items-center justify-start space-x-2">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama divisi" class="h-10 rounded-lg border border-gray-300 px-3 text-sm
                   focus:outline-none focus:ring-2 focus:ring-brand-500
                   dark:bg-gray-900 dark:border-gray-700 dark:text-white">

                <button type="submit" class="h-10 rounded-lg bg-brand-600 px-4 text-sm font-medium text-white
                   hover:bg-brand-700 focus:ring-4 focus:ring-brand-300
                   dark:bg-brand-600 dark:hover:bg-brand-700">
                    Tambah
                </button>
            </div>

            @error('name')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </form>
        <!-- End Check in modal -->
    </div>

    <div></div>
</div>
{{-- End Head --}}

@push('scripts')
@endpush