{{-- Table --}}
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-4">#</th>
                <th scope="col" class="px-6 py-3">Nama Karyawan</th>
                <th scope="col" class="px-6 py-3">Nama Device</th>
                <th scope="col" class="px-6 py-3">Masuk</th>
                <th scope="col" class="px-6 py-3">Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todaysAttendances as $attendance)
            <tr class="border-b dark:border-gray-700">
                <th scope="row"
                    class="px-4 py-3 font-medium text-gray-900 max-w-lg truncate whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-3">
                    <div class="flex items-center gap-3 mr-3 whitespace-nowrap max-w-xl">
                        <div class="w-10 h-10 overflow-hidden rounded-full">
                            <img src="{{ asset('assets/images/user/user-default.png') }}"
                                alt="{{ $attendance->employee->name }}">
                        </div>
                        <div>
                            <span class="block">
                                {{ $attendance->employee->name }}
                            </span>
                            <span
                                class="inline-flex items-center justify-center gap-1 rounded-full bg-success-50 px-2.5 py-0.5 text-xs text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                Divisi - {{ $attendance->employee->division->name }}
                            </span>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $attendance->user->name ?? 'Tidak tersedia' }}
                    </div>
                </td>
                <td class="px-6 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $attendance->check_in ? \Carbon\Carbon::parse($attendance->check_in)->format('d F Y - H:i:s') : 'Belum checkin' }}
                    </div>
                </td>
                <td class="px-6 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('d F Y - H:i:s') : 'Belum checkout' }}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- End Table --}}