<div>
    <div>
        <form wire:submit.prevent="store">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                               wire:model.lazy="name"/>
                        @error('name') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" wire:model.lazy="age">
                        @error('age') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" wire:model.lazy="location">
                        @error('location') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <button type="submit" class="btn btn-primary" wire:click.prevent="cancel">Cancel</button>
    </div>
</div>

