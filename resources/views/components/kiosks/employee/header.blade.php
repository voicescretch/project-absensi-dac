{{-- Head --}}
<div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    {{-- Button Presensi --}}
    <!-- Check in modal -->
    <div
        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <a href="{{ route('kiosk.employee.create') }}"
            class="flex items-center justify-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path fill="currentColor"
                    d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z" />
            </svg>Tambah Karyawan</a>
        <!-- End Check in modal -->
    </div>

    {{-- Button Export Data --}}
    <div
        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">

        <!-- Import Button -->
        <button type="button" data-modal-target="import-modal" data-modal-toggle="import-modal"
            class="flex items-center justify-center text-white bg-success-600 hover:bg-success-700 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-success-600 dark:hover:bg-success-700 focus:outline-none dark:focus:ring-success-800">
            <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path fill="currentColor"
                    d="M192 64C156.7 64 128 92.7 128 128L128 368L310.1 368L279.1 337C269.7 327.6 269.7 312.4 279.1 303.1C288.5 293.8 303.7 293.7 313 303.1L385 375.1C394.4 384.5 394.4 399.7 385 409L313 481C303.6 490.4 288.4 490.4 279.1 481C269.8 471.6 269.7 456.4 279.1 447.1L310.1 416.1L128 416.1L128 512.1C128 547.4 156.7 576.1 192 576.1L448 576.1C483.3 576.1 512 547.4 512 512.1L512 234.6C512 217.6 505.3 201.3 493.3 189.3L386.7 82.7C374.7 70.7 358.5 64 341.5 64L192 64zM453.5 240L360 240C346.7 240 336 229.3 336 216L336 122.5L453.5 240z" />
            </svg>
            Import
        </button>

        <!-- Export Button -->
        <!-- data-modal-target="export-modal" data-modal-toggle="export-modal" -->
        <!-- <button type="button"
            class="flex items-center justify-center text-white bg-success-600 hover:bg-success-700 focus:ring-4 focus:ring-success-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-success-600 dark:hover:bg-success-700 focus:outline-none dark:focus:ring-success-800">
            <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path fill="currentColor"
                    d="M128.5 64C93.2 64 64.5 92.7 64.5 128L64.5 512C64.5 547.3 93.2 576 128.5 576L384.5 576C419.8 576 448.5 547.3 448.5 512L448.5 416L526.6 416L495.6 447C486.2 456.4 486.2 471.6 495.6 480.9C505 490.2 520.2 490.3 529.5 480.9L601.5 408.9C610.9 399.5 610.9 384.3 601.5 375L529.5 303C520.1 293.6 504.9 293.6 495.6 303C486.3 312.4 486.2 327.6 495.6 336.9L526.6 367.9L448.5 367.9L448.5 234.4C448.5 217.4 441.8 201.1 429.8 189.1L323.2 82.7C311.2 70.7 295 64 278 64L128.5 64zM390 240L296.5 240C283.2 240 272.5 229.3 272.5 216L272.5 122.5L390 240zM256.5 392C256.5 378.7 267.2 368 280.5 368L384.5 368L384.5 416L280.5 416C267.2 416 256.5 405.3 256.5 392z" />
            </svg>
            Export
        </button> -->
    </div>
    {{-- End Export Add Data --}}
</div>
{{-- End Head --}}

<x-kiosks.employee.modals.import />

@push('scripts')
@endpush