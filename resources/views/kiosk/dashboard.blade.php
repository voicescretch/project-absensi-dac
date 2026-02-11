<x-layouts.app :title="$title">
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6 xl:col-span-7">
                <x-kiosks.dashboard.employee-counts :employee_counts="$employee_counts" />
                <x-kiosks.dashboard.avg-monthly-attendance :monthly="$monthlyPresent" />
            </div>
            <div class=" col-span-12 xl:col-span-5">
                <x-kiosks.dashboard.monthly-attendance :monthly_attendances="$monthly_attendances"
                    :attendance="$attendance_percent" />
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-layouts.app>