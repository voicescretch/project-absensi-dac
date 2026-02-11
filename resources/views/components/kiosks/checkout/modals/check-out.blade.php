<!-- Main modal -->
<div id="check-out-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Check Out
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="check-out-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <!-- Newly arrived employee -->
            <form method="POST" action="{{ route('kiosk.attendance.check-out') }}" id="checkout-save-form">
                @csrf
                @method('PUT')
                <!-- TEMP LIST -->
                <ul id="checkout-list" class="divide-y divide-default max-h-40 overflow-y-auto"></ul>
                <!-- HIDDEN INPUT CONTAINER -->
                <div id="hidden-inputs"></div>
            </form>

            <template id="checkout-item-template">
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse mt-2">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center space-x-2">

                                <div class="relative flex items-center w-full">
                                    <input type='text' value="Nama Lengkap"
                                        class="rounded-base block w-full pr-4 pl-12 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand placeholder:text-body"
                                        readonly />
                                    <div class="absolute left-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#bbb"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M437.02 74.981C388.667 26.629 324.38 0 256 0S123.333 26.629 74.98 74.981C26.629 123.333 0 187.62 0 256s26.629 132.667 74.98 181.019C123.333 485.371 187.62 512 256 512s132.667-26.629 181.02-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.667-74.98-181.019zM256 482c-66.869 0-127.037-29.202-168.452-75.511C113.223 338.422 178.948 290 256 290c-49.706 0-90-40.294-90-90s40.294-90 90-90 90 40.294 90 90-40.294 90-90 90c77.052 0 142.777 48.422 168.452 116.489C383.037 452.798 322.869 482 256 482z"
                                                data-original="#000000"></path>
                                        </svg>
                                    </div>
                                </div>
                                <button type="button"
                                    class="remove-btn flex items-center justify-center text-gray-700 border border-gray-400 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded text-sm px-4 py-2 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700 focus:outline-none">
                                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                        viewBox="0 0 640 640" fill="#444">
                                        <path
                                            d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </template>
            <!-- End Newly arrived employee -->


            <!-- Input Mode -->
            <div id="checkOutTextModeSection">
                <div class="space-y-4 md:space-y-6 py-3 md:py-5">

                    <label class="block text-sm font-medium text-heading">
                        ID Number
                    </label>

                    <div class="flex items-center space-x-2">
                        <div class="flex shadow-xs rounded-base w-full">
                            <span
                                class="inline-flex items-center px-3 text-sm text-body bg-neutral-tertiary border border-e-0 border-default-medium rounded-s-base">
                                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>

                            <input type="text" id="idNumberOut"
                                class="rounded-none rounded-e-base block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm"
                                placeholder="Masukkan ID Number ...">
                        </div>

                        <button type="button" id="addCheckoutManual"
                            class="text-white bg-brand hover:bg-brand-strong rounded-base px-4 py-2 text-sm">
                            Tambah
                        </button>
                    </div>

                </div>
            </div>
            <div id="checkOutCameraModeSection" class="w-full hidden">
                <!-- Camera Mode (hidden by default) -->
                <div class="flex flex-col items-center space-y-4 py-3 md:py-5">
                    <p class="leading-relaxed text-body">
                        Arahkan QR Code Anda ke kamera untuk melakukan check in.
                    </p>
                    <div id="qr-reader-out" class="w-full max-w-md"></div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="row items-center border-t border-default space-y-2 pt-3 md:pt-4">
                <div class="flex justify-items-start items-center space-x-2">
                    <span class="leading-relaxed text-body">
                        Jika tidak ada scanner. Beralih ke camera mode?
                    </span>
                    <div class="items-center space-x-4">
                        <button id="switchCheckoutMode" type="button"
                            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-2 py-2 focus:outline-none">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path fill="currentColor"
                                    d="M534.6 182.6C547.1 170.1 547.1 149.8 534.6 137.3L470.6 73.3C461.4 64.1 447.7 61.4 435.7 66.4C423.7 71.4 416 83.1 416 96L416 128L256 128C150 128 64 214 64 320C64 337.7 78.3 352 96 352C113.7 352 128 337.7 128 320C128 249.3 185.3 192 256 192L416 192L416 224C416 236.9 423.8 248.6 435.8 253.6C447.8 258.6 461.5 255.8 470.7 246.7L534.7 182.7zM105.4 457.4C92.9 469.9 92.9 490.2 105.4 502.7L169.4 566.7C178.6 575.9 192.3 578.6 204.3 573.6C216.3 568.6 224 556.9 224 544L224 512L384 512C490 512 576 426 576 320C576 302.3 561.7 288 544 288C526.3 288 512 302.3 512 320C512 390.7 454.7 448 384 448L224 448L224 416C224 403.1 216.2 391.4 204.2 386.4C192.2 381.4 178.5 384.2 169.3 393.3L105.3 457.3z" />
                            </svg></button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="save" type="button"
                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 focus:outline-none">Save</button>
                    <button data-modal-hide="check-out-modal" type="button"
                        class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 focus:outline-none">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<audio id="scan-success-sound" src="/sounds/scan-success.mp3" preload="auto"></audio>
<audio id="user-found-sound" src="/sounds/user-found.mp3" preload="auto"></audio>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let qrScanner = null;
    let scanCooldown = false;

    // Ganti Mode Text/Camera
    document.getElementById('switchCheckoutMode').addEventListener('click', function() {
        const checkOutTextModeSection = document.getElementById('checkOutTextModeSection');
        const checkOutCameraModeSection = document.getElementById('checkOutCameraModeSection');

        if (checkOutTextModeSection.classList.contains('hidden') && checkOutCameraModeSection.classList
            .contains(
                'hidden') ===
            false) {
            // Switch to Text Mode
            checkOutTextModeSection.classList.remove('hidden');
            checkOutCameraModeSection.classList.add('hidden');
            // Stop Camera (if needed)
            stopCameraCheckout();
        } else {
            // Switch to Camera Mode
            checkOutTextModeSection.classList.add('hidden');
            checkOutCameraModeSection.classList.remove('hidden');
            // Start Camera (if needed)
            startCameraForCheckout();
        }
    });


    function playSound(id) {
        const sound = document.getElementById(id);
        if (sound) {
            sound.currentTime = 0;
            sound.play().catch(() => {});
        }
    }

    document.getElementById('addCheckoutManual').addEventListener('click', function() {
        const id_number = document.getElementById('idNumberOut').value.trim();
        if (!id_number) return;

        fetch(`/kiosk/employee/by-id-number/${id_number}`)
            .then(res => {
                if (!res.ok) throw new Error('User tidak ditemukan');
                return res.json();
            })
            .then(data => {
                addCheckoutItem(data.id_number, data.name);
                playSound('user-found-sound');
                document.getElementById('idNumberOut').value = '';
            })
            .catch(err => alert(err.message));
    });

    document.getElementById('save').addEventListener('click', function() {
        if (!document.querySelector('input[name="id_numbers[]"]')) {
            alert('Belum ada karyawan');
            return;
        }
        this.disabled = true;
        document.getElementById('checkout-save-form').submit();
    });

    function addCheckoutItem(id_number, name) {
        // Cegah duplikat
        if ([...document.querySelectorAll('input[name="id_numbers[]"]')]
            .some(i => i.value === id_number)) return;

        const template = document.getElementById('checkout-item-template');
        const clone = template.content.cloneNode(true);

        // UI name
        clone.querySelector('input').value = name;

        // Hidden input
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'id_numbers[]';
        hidden.value = id_number;

        document.getElementById('hidden-inputs').appendChild(hidden);

        // Hapus item
        clone.querySelector('.remove-btn').addEventListener('click', function() {
            hidden.remove();
            this.closest('li').remove();
        });

        document.getElementById('checkout-list').appendChild(clone);
    }

    function startCameraForCheckout() {
        if (qrScanner) return;

        qrScanner = new Html5Qrcode("qr-reader-out");

        qrScanner.start({
                facingMode: "environment"
            }, {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            async (decodedText) => {
                await handleQrResult(decodedText);
            }
        );
    }

    function stopCameraCheckout() {
        if (qrScanner) {
            return qrScanner.stop().then(() => {
                qrScanner.clear();
                qrScanner = null;
            });
        }
    }

    async function handleQrResult(value) {
        if (scanCooldown) return;

        scanCooldown = true;
        playSound('scan-success-sound');

        fetch(`/kiosk/employee/by-id-number/${value}`)
            .then(res => {
                if (!res.ok) throw new Error('User tidak ditemukan');
                return res.json();
            })
            .then(data => {
                addCheckoutItem(data.id_number, data.name);
                playSound('user-found-sound');
            })
            .catch(err => {
                alert(err.message);
            }).finally(() => {
                // delay 1.5 detik sebelum bisa scan lagi
                setTimeout(() => {
                    scanCooldown = false;
                }, 1500);
            });
    }
});
</script>
@endpush