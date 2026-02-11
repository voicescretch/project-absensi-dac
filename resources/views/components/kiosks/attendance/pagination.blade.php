{{-- Pagination --}}
@if ($attendances->hasPages())
<nav class="space-y-3 lg:space-y-0 px-4 py-6">
    {{ $attendances->onEachSide(0)->links() }}
</nav>
@endif
{{-- End Pagination --}}