<form>
    <input type="hidden" wire:model="post_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>