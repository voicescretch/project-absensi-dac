<!-- Main modal -->
<div id="check-in-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Check In
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="check-in-modal">
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
            <ul id="checkin-list" class="my-4 max-h-60 overflow-y-auto"></ul>

            <!-- End Newly arrived employee -->


            <!-- Input Mode -->
            <div id="checkInTextModeSection">
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

                            <input type="text" id="idNumberIn"
                                class="rounded-none rounded-e-base block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm"
                                placeholder="Masukkan ID Number ...">
                        </div>
                    </div>

                </div>
            </div>
            <div id="checkInCameraModeSection" class="w-full hidden">
                <!-- Camera Mode (hidden by default) -->
                <div class="flex flex-col items-center space-y-4 py-3 md:py-5">
                    <p class="leading-relaxed text-body">
                        Arahkan QR Code Anda ke kamera untuk melakukan check in.
                    </p>
                    <div id="qr-reader-in" class="w-full max-w-md"></div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="row items-center border-t border-default space-y-2 pt-3 md:pt-4">
                <div class="flex justify-items-start items-center space-x-2">
                    <span class="leading-relaxed text-body">
                        Jika tidak ada scanner. Beralih ke camera mode?
                    </span>
                    <div class="items-center space-x-4">
                        <button id="switchCheckinMode" type="button"
                            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-2 py-2 focus:outline-none">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path fill="currentColor"
                                    d="M534.6 182.6C547.1 170.1 547.1 149.8 534.6 137.3L470.6 73.3C461.4 64.1 447.7 61.4 435.7 66.4C423.7 71.4 416 83.1 416 96L416 128L256 128C150 128 64 214 64 320C64 337.7 78.3 352 96 352C113.7 352 128 337.7 128 320C128 249.3 185.3 192 256 192L416 192L416 224C416 236.9 423.8 248.6 435.8 253.6C447.8 258.6 461.5 255.8 470.7 246.7L534.7 182.7zM105.4 457.4C92.9 469.9 92.9 490.2 105.4 502.7L169.4 566.7C178.6 575.9 192.3 578.6 204.3 573.6C216.3 568.6 224 556.9 224 544L224 512L384 512C490 512 576 426 576 320C576 302.3 561.7 288 544 288C526.3 288 512 302.3 512 320C512 390.7 454.7 448 384 448L224 448L224 416C224 403.1 216.2 391.4 204.2 386.4C192.2 381.4 178.5 384.2 169.3 393.3L105.3 457.3z" />
                            </svg></button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button data-modal-hide="check-in-modal" type="button"
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
    document.getElementById('switchCheckinMode').addEventListener('click', function() {
        const checkInTextModeSection = document.getElementById('checkInTextModeSection');
        const checkInCameraModeSection = document.getElementById('checkInCameraModeSection');

        if (checkInTextModeSection.classList.contains('hidden') && checkInCameraModeSection.classList
            .contains(
                'hidden') ===
            false) {
            // Switch to Text Mode
            checkInTextModeSection.classList.remove('hidden');
            checkInCameraModeSection.classList.add('hidden');
            // Stop Camera (if needed)
            stopCameraCheckin();
        } else {
            // Switch to Camera Mode
            checkInTextModeSection.classList.add('hidden');
            checkInCameraModeSection.classList.remove('hidden');
            // Start Camera (if needed)
            startCameraForCheckin();
        }
    });

    function playSound(id) {
        const sound = document.getElementById(id);
        if (sound) {
            sound.currentTime = 0;
            sound.play().catch(() => {});
        }
    }

    // Load Today's Check-ins
    function loadTodayCheckins() {
        fetch('/kiosk/attendance/today')
            .then(res => {
                if (!res.ok) throw new Error('Failed load');
                return res.json();
            })
            .then(data => {
                const list = document.getElementById('checkin-list');
                list.innerHTML = '';

                if (data.length === 0) {
                    list.innerHTML = `<li class="text-sm text-gray-500">Belum ada check-in hari ini</li>`;
                    return;
                }

                data.forEach(item => {
                    list.appendChild(renderItem(item));
                });
            })
            .catch(err => console.error(err));
    }

    // Load Today Check-ins
    loadTodayCheckins();

    // Render Check-in Item
    function renderItem(item) {
        const li = document.createElement('li');
        li.className = 'pb-3';

        li.innerHTML = `
        <div class="flex items-center justify-between">
            <input readonly value="${item.name}"
                class="w-full bg-neutral-secondary-medium rounded-base px-3 py-2 text-sm"/>
            <button class="remove-btn ml-2">🗑</button>
        </div>
    `;

        li.querySelector('.remove-btn').onclick = () => {
            fetch(`/kiosk/attendance/${item.id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                }
            }).then(() => loadTodayCheckins());
        };

        return li;
    }

    // Submit Check-in
    function submitCheckin(id_number) {
        if (!id_number) return;

        fetch('/kiosk/attendance/check-in', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({
                    id_number
                })
            })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) throw new Error(data.message);
                return data;
            })
            .then(() => {
                playSound('user-found-sound');
                loadTodayCheckins();
            })
            .catch(err => alert(err.message));
    }

    // Klik Enter di input ID Number
    document.getElementById('idNumberIn').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            playSound('scan-success-sound');
            submitCheckin(this.value.trim());
            this.value = '';
        }
    });

    // Start and Stop Camera
    function startCameraForCheckin() {
        if (qrScanner) return;

        qrScanner = new Html5Qrcode("qr-reader-in");

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
                playSound('scan-success-sound');
                await handleQrResult(decodedText);
            }
        );
    }

    function stopCameraCheckin() {
        if (qrScanner) {
            return qrScanner.stop().then(() => {
                qrScanner.clear();
                qrScanner = null;
            });
        }
    }

    // QR Code Result Handler
    async function handleQrResult(value) {
        if (scanCooldown) return;
        scanCooldown = true;

        submitCheckin(value);

        setTimeout(() => scanCooldown = false, 1500);
    }
});
</script>
@endpush