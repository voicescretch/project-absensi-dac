<!-- Main modal -->
<div id="qr-generate-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    QR Generate
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="qr-generate-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <!-- Tabs -->
            <div class="border-b border-default">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-body">
                    <li class="me-2">
                        <a href="#" id="tabEmployee"
                            class="inline-flex items-center justify-center p-4 border-b text-fg-brand border-brand rounded-t-base active group">
                            <svg id="iconEmployee" class="w-4 h-4 me-2 text-fg-brand" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Karyawan
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#" id="tabDivision"
                            class="inline-flex items-center justify-center p-4 border-b border-transparant rounded-t-base group"
                            aria-current="page">
                            <svg id="iconDivision" class="w-4 h-4 me-2 text-body group-hover:text-fg-brand"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                            </svg>
                            Divisi
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Tabs -->

            <form class="mx-auto space-y-2" method="POST" action="{{ route('qr.generate') }}" id="qr-generate-form">
                @csrf
                <input type="hidden" name="mode" id="qrMode" value="employee">
                <div id="selectSection" class="py-2 md:py-4">
                    <!-- Select Employee -->
                    <div id="employeeSection" class="w-full">
                        <ul id="employeeList"
                            class="block shadow-lg border-gray-300 bg-white p-4 dark:border-gray-800 dark:bg-white/3 py-2 px-2 min-w-full w-max rounded-sm h-96 overflow-auto">
                            <li class="mb-2">
                                <input placeholder="Search..." id="searchEmployee"
                                    class="px-4 py-2 w-full rounded-sm text-slate-900 dark:text-slate-200 text-sm font-medium border border-gray-200 dark:border-gray-200/3 outline-0 bg-gray-50 dark:bg-gray-50/3 focus:bg-transparent focus:border-gray-900 dark:focus:border-gray-500" />
                            </li>
                            @if ($employees->isNotEmpty())
                            @foreach ($employees as $employee)
                            @php $cbId = 'emp_cb_' . $employee->id; @endphp
                            <li
                                class="employee-item dropdown-item py-2.5 px-4 hover:bg-slate-100 dark:hover:bg-slate-100/3 rounded-sm text-slate-600 text-sm font-medium cursor-pointer">
                                <div class="flex items-center text-slate-900 dark:text-slate-400">
                                    <input id="{{ $cbId }}" type="checkbox" name="employees[]"
                                        value="{{ $employee->id }}" class="hidden peer" />
                                    <label for="{{ $cbId }}"
                                        class="relative mr-3 flex items-center justify-center p-1 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-600 border border-gray-300 dark:border-gray-300/3 rounded-sm overflow-hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white"
                                            viewBox="0 0 520 520">
                                            <path
                                                d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                                data-name="7-Check" data-original="#000000" />
                                        </svg>
                                    </label>
                                    {{ $employee->name }}
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- End of Select Employee -->

                    <!-- Select Division -->
                    <div id="divisionSection" class="w-full hidden">
                        <ul id="divisionList"
                            class="block shadow-lg border-gray-300 bg-white p-4 dark:border-gray-800 dark:bg-white/3 py-2 px-2 min-w-full w-max rounded-sm h-96 overflow-auto">
                            <li class="mb-2">
                                <input placeholder="Search..." id="searchDivision"
                                    class="px-4 py-2 w-full rounded-sm text-slate-900 dark:text-slate-200 text-sm font-medium border border-gray-200 dark:border-gray-200/3 outline-0 bg-gray-50 dark:bg-gray-50/3 focus:bg-transparent focus:border-gray-900 dark:focus:border-gray-500" />
                            </li>
                            @foreach ($divisions as $division)
                            <li
                                class="employee-item dropdown-item py-2.5 px-4 hover:bg-slate-100 dark:hover:bg-slate-100/3 rounded-sm text-slate-600 text-sm font-medium cursor-pointer">
                                <div class="flex items-center">
                                    <input id="division-{{ $division->id }}" type="checkbox" name="divisions[]"
                                        value="{{ $division->id }}" class="hidden peer" />
                                    <label for="division-{{ $division->id }}"
                                        class="relative mr-3 flex items-center justify-center p-1 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-600 border border-gray-300 dark:border-gray-300/3 rounded-sm overflow-hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white"
                                            viewBox="0 0 520 520">
                                            <path
                                                d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                                data-name="7-Check" data-original="#000000" />
                                        </svg>
                                    </label>
                                    {{ $division->name }}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End of Select Division -->
                </div>

                <!-- Modal footer -->
                <div class="row items-center border-t border-default space-y-2 pt-3 md:pt-4 justify-between flex">
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 focus:outline-none">Generate</button>
                        <button data-modal-hide="qr-generate-modal" type="button"
                            class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 focus:outline-none">Tutup</button>
                    </div>
                    <a href="{{ route('qr.generate.all') }}"
                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 focus:outline-none"
                        target="_blank">Generate Semua QR</a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<!-- Search -->
<script>
function setupSearch(inputId, listSelector) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.addEventListener('keyup', function() {
        const keyword = this.value.toLowerCase();

        document.querySelectorAll(listSelector).forEach(item => {
            item.style.display = item.innerText
                .toLowerCase()
                .includes(keyword) ? '' : 'none';
        });
    });
}

// pakai untuk keduanya
setupSearch('searchEmployee', '#employeeList .employee-item');
setupSearch('searchDivision', '#divisionList .division-item');
</script>

<!-- Switch Tab -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modeInput = document.getElementById('qrMode');

    const tabEmployee = document.getElementById('tabEmployee');
    const tabDivision = document.getElementById('tabDivision');

    const employeeSection = document.getElementById('employeeSection');
    const divisionSection = document.getElementById('divisionSection');

    const iconEmployee = document.getElementById('iconEmployee');
    const iconDivision = document.getElementById('iconDivision');

    function enableSection(section, name) {
        section.classList.remove('hidden');
        section.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.disabled = false;
        });
    }

    function disableSection(section) {
        section.classList.add('hidden');
        section.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
            cb.disabled = false;
        });
    }

    // Default: Employee aktif
    enableSection(employeeSection);
    disableSection(divisionSection);


    function showEmployeeUI() {
        tabEmployee.classList.add('text-fg-brand', 'border-brand', 'active');
        tabEmployee.classList.remove('border-transparant', 'hover:text-fg-brand', 'hover:border-brand');

        tabDivision.classList.remove('text-fg-brand', 'border-brand', 'active');
        tabDivision.classList.add('border-transparant', 'hover:text-fg-brand', 'hover:border-brand');

        iconEmployee.classList.add('text-fg-brand');
        iconEmployee.classList.remove('text-body');
        iconDivision.classList.remove('text-fg-brand');
        iconDivision.classList.add('text-body');
    }

    function showDivisionUI() {
        tabDivision.classList.add('text-fg-brand', 'border-brand', 'active');
        tabDivision.classList.remove('border-transparant', 'hover:text-fg-brand', 'hover:border-brand');

        tabEmployee.classList.remove('text-fg-brand', 'border-brand', 'active');
        tabEmployee.classList.add('border-transparant', 'hover:text-fg-brand', 'hover:border-brand');

        iconDivision.classList.add('text-fg-brand');
        iconDivision.classList.remove('text-body');
        iconEmployee.classList.remove('text-fg-brand');
        iconEmployee.classList.add('text-body');
    }

    tabEmployee.addEventListener('click', e => {
        e.preventDefault();
        modeInput.value = 'employee';
        enableSection(employeeSection);
        disableSection(divisionSection);
        showEmployeeUI();
    });

    tabDivision.addEventListener('click', e => {
        e.preventDefault();
        modeInput.value = 'division';
        enableSection(divisionSection);
        disableSection(employeeSection);
        showDivisionUI();
    });

});
</script>

<!-- Form Validation -->
<script>
document.getElementById('qr-generate-form').addEventListener('submit', e => {
    const empChecked = document.querySelectorAll('#employeeSection input[type="checkbox"]:checked').length;
    const divChecked = document.querySelectorAll('#divisionSection input[type="checkbox"]:checked').length;

    if (empChecked === 0 && divChecked === 0) {
        e.preventDefault();
        alert('Pilih minimal 1 karyawan atau 1 divisi');
    }
});
</script>
@endpush