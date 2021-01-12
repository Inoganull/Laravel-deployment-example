<div>
    <div class="flex justify-center pb-4 p-4">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click='increment' class="fas fa-plus-circle p-2 cursor-pointer"/>
    </div>

    @foreach($steps as $step)
    <div class="flex justify-center py-2">
        <input type="text" name="step[]" class="py-1 px-2 border rounded" placeholder="{{'Describe Step ' .$step}}">
        <span class="fas fa-times text-red-400 p-2 cursor-pointer" wire:click="remove({{$loop->index}})" />
    </div>
    @endforeach

</div>
