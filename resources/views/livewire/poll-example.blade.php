<div class="relative bg-white shadow-xl mt-8">
    <div class="p-10">
        <div wire:poll.1s="getRevenue">
            Sales: ${{ $revenue }}
        </div>
    </div>
</div>
