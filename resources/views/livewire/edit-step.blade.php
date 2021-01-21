<div>
    <div class="flex justify-center  pb-4 border-gray-500 ">
        <h3 class="text-2xl mt-2">Add Steps for task</h3>
        <span wire:click="increment" class="cursor-pointer py-4 ml-3 fas fa-plus"></span>
    </div>
    @foreach ($steps as $step)
    <div class="flex justify-center py-2" wire:key="{{$loop->index}}">
        <input name="stepName[]" class="py-1 px-2 rounded border" value="{{$step['name']}}" placeholder="{{'Describe step ' .($loop->index +1)}}" />

        <input type="hidden" name="stepId[]" value="{{$step['id']}}" />

        <span class="fas fa-times text-red-400 p-2" wire:click="remove({{$loop->index}})" />
    </div>
    @endforeach
</div>