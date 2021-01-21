<div>
    <div class="flex justify-center  pb-4 border-gray-500 ">
        <h3 class="text-2xl mt-2">Add Steps for task</h3>
        <span wire:click="increment" class="cursor-pointer py-4 ml-3 fas fa-plus hover:text-blue-400"></span>
    </div>
    @foreach ($steps as $step)
    <div class="flex justify-center py-2" wire:key={{$step}}>
        <input name="step[]" class="py-1 px-2 rounded border" placeholder="{{'Describe step ' .($step +1)}}" />
        <span class="fas fa-times text-red-400 p-2" wire:click="remove({{$step}})" />
    </div>
    @endforeach
</div>