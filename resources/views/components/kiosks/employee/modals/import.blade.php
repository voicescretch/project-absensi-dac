<!-- Import modal -->
<div id="import-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Import Data
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="import-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex items-center justify-center w-full py-4">
                <form class="flex flex-col items-center justify-center w-full"
                    action="{{ route('kiosk.employee.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 bg-neutral-secondary-medium border border-dashed border-default-strong rounded-base cursor-pointer hover:bg-neutral-tertiary-medium">
                        <div class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021
                       C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                            </svg>
                            <p id="clickUpload" class="mb-2 text-sm">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p id="formatDokumen" class="text-xs">CSV or Excel (.csv, .xlsx)</p>
                            <p id="file-name" class="mt-2 text-sm text-body"></p>
                        </div>

                        <input id="dropzone-file" name="file" type="file" accept=".csv,.xlsx" class="hidden" />
                    </label>
                    <button type="submit" id="submit-btn" disabled
                        class="disabled:opacity-50 disabled:cursor-not-allowed mt-4 px-4 py-2 bg-success-600 text-white rounded-base hover:bg-success-700">
                        Import Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('dropzone-file');
    const btn = document.getElementById('submit-btn');
    const fileName = document.getElementById('file-name');
    const clickUpload = document.getElementById('clickUpload');
    const formatDokumen = document.getElementById('formatDokumen');

    input.addEventListener('change', function() {
        if (!this.files.length) {
            btn.disabled = true;
            return;
        }

        fileName.innerText = this.files[0].name;
        clickUpload.classList.add('hidden');
        formatDokumen.classList.add('hidden');
        btn.disabled = false;
    });
});
</script>
@endpush