{{-- Table --}}
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-4">#</th>
                <th scope="col" class="px-6 py-3">Nama Divisi</th>
                <th scope="col" class="px-4 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisions as $division)
            <tr class="border-b dark:border-gray-700" x-data="{ isEditing: false }">
                <th scope="row"
                    class="px-4 py-3 font-medium text-gray-900 max-w-lg truncate whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $division->name ?? 'Tidak tersedia' }}
                    </div>
                </td>
                <td class="px-4 py-3">
                    <!-- ACTION BUTTON -->
                    <div class="flex gap-2" x-show="!isEditing">
                        <a href="#" @click.prevent="isEditing = true"
                            class="flex items-center gap-2 py-2 px-4 rounded-lg border border-gray-600 hover:bg-gray-100 text-gray-700 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path fill="currentColor"
                                    d="M505 122.9L517.1 135C526.5 144.4 526.5 159.6 517.1 168.9L488 198.1L441.9 152L471 122.9C480.4 113.5 495.6 113.5 504.9 122.9zM273.8 320.2L408 185.9L454.1 232L319.8 366.2C316.9 369.1 313.3 371.2 309.4 372.3L250.9 389L267.6 330.5C268.7 326.6 270.8 323 273.7 320.1zM437.1 89L239.8 286.2C231.1 294.9 224.8 305.6 221.5 317.3L192.9 417.3C190.5 425.7 192.8 434.7 199 440.9C205.2 447.1 214.2 449.4 222.6 447L322.6 418.4C334.4 415 345.1 408.7 353.7 400.1L551 202.9C579.1 174.8 579.1 129.2 551 101.1L538.9 89C510.8 60.9 465.2 60.9 437.1 89zM152 128C103.4 128 64 167.4 64 216L64 488C64 536.6 103.4 576 152 576L424 576C472.6 576 512 536.6 512 488L512 376C512 362.7 501.3 352 488 352C474.7 352 464 362.7 464 376L464 488C464 510.1 446.1 528 424 528L152 528C129.9 528 112 510.1 112 488L112 216C112 193.9 129.9 176 152 176L264 176C277.3 176 288 165.3 288 152C288 138.7 277.3 128 264 128L152 128z" />
                            </svg>
                            <span class="hidden lg:inline">Edit</span>
                        </a>

                        <button data-modal-target="deletedivisionModal-{{ $division->id }}"
                            data-modal-toggle="deletedivisionModal-{{ $division->id }}"
                            class="flex items-center gap-2 py-2 px-4 rounded-lg border border-gray-600 text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path fill="currentColor"
                                    d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z" />
                            </svg>
                            <span class="hidden lg:inline">Hapus</span>
                        </button>
                    </div>

                    <!-- EDIT FORM -->
                    <div x-show="isEditing" x-transition class="max-w-80">
                        <form action="{{ route('kiosk.division.update', $division->id) }}" method="POST"
                            class="flex items-center gap-2">
                            @csrf
                            @method('PUT')

                            <input type="text" name="name" value="{{ $division->name }}"
                                class="w-full rounded-lg border px-3 py-2 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white">

                            <button type="submit" class="px-3 py-2 rounded-lg bg-warning-600 text-white text-sm">
                                Simpan
                            </button>

                            <button type="button" @click="isEditing = false"
                                class="px-3 py-2 rounded-lg border text-sm dark:border-gray-600 dark:text-gray-300">
                                Batal
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <!-- Delete Modal -->
            <div id="deletedivisionModal-{{ $division->id }}"
                class="fixed inset-0 hidden items-center justify-center p-5 overflow-y-auto modal z-999999">
                <div data-modal-target="deletedivisionModal-{{ $division->id }}"
                    data-modal-toggle="deletedivisionModal-{{ $division->id }}"
                    class="modal-close-btn fixed inset-0 h-full w-full bg-gray-300/50 backdrop-blur-[3rem]"></div>
                <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                    <!-- close btn -->
                    <button data-modal-target="deletedivisionModal-{{ $division->id }}"
                        data-modal-toggle="deletedivisionModal-{{ $division->id }}"
                        class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                                fill=""></path>
                        </svg>
                    </button>

                    <div class="text-center">
                        <div class="relative flex items-center justify-center z-1 mb-7">
                            <svg class="fill-warning-50 dark:fill-warning-500/15" width="90" height="90"
                                viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                                    fill="" fill-opacity=""></path>
                            </svg>

                            <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                                <svg class="fill-warning-600 dark:fill-orange-400" width="38" height="38"
                                    viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M32.1445 19.0002C32.1445 26.2604 26.2589 32.146 18.9987 32.146C11.7385 32.146 5.85287 26.2604 5.85287 19.0002C5.85287 11.7399 11.7385 5.85433 18.9987 5.85433C26.2589 5.85433 32.1445 11.7399 32.1445 19.0002ZM18.9987 35.146C27.9158 35.146 35.1445 27.9173 35.1445 19.0002C35.1445 10.0831 27.9158 2.85433 18.9987 2.85433C10.0816 2.85433 2.85287 10.0831 2.85287 19.0002C2.85287 27.9173 10.0816 35.146 18.9987 35.146ZM21.0001 26.0855C21.0001 24.9809 20.1047 24.0855 19.0001 24.0855L18.9985 24.0855C17.894 24.0855 16.9985 24.9809 16.9985 26.0855C16.9985 27.19 17.894 28.0855 18.9985 28.0855L19.0001 28.0855C20.1047 28.0855 21.0001 27.19 21.0001 26.0855ZM18.9986 10.1829C19.827 10.1829 20.4986 10.8545 20.4986 11.6829L20.4986 20.6707C20.4986 21.4992 19.827 22.1707 18.9986 22.1707C18.1701 22.1707 17.4986 21.4992 17.4986 20.6707L17.4986 11.6829C17.4986 10.8545 18.1701 10.1829 18.9986 10.1829Z"
                                        fill=""></path>
                                </svg>
                            </span>
                        </div>

                        <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                            Peringatan!
                        </h4>
                        <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Apakah Anda yakin ingin menghapus data divisi yang satu ini?
                        </p>

                        <div class="flex items-center justify-center w-full gap-3 mt-7">
                            <button data-modal-target="deletedivisionModal-{{ $division->id }}"
                                data-modal-toggle="deletedivisionModal-{{ $division->id }}" type="button"
                                class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                                Cancel
                            </button>
                            <form action="{{ route('kiosk.division.destroy', $division->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-warning-500 shadow-theme-xs hover:bg-warning-600 sm:w-auto">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Delete Modal -->
            @endforeach
        </tbody>
    </table>
</div>
{{-- End Table --}}