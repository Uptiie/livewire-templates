<div>
    <h1 class="font-bold">Counter</h1>
     <span>{{ $count }}</span>
    <button wire:click="decrement" class="bg-gray-50 hover:bg-gray-300 active:bg-gray-400 transform px-3">-</button>
    <button wire:click="increment" class="bg-gray-50 hover:bg-gray-300 active:bg-gray-400 transform px-3">+</button>
</div>
