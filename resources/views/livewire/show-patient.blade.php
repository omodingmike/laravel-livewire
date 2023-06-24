<div>
    <div>
        <h1 class="display-6 mt-3 mb-3 text-center fw-bold">Edit patient</h1>
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="update-name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="update-name" aria-describedby="emailHelp"
                               wire:model.lazy="name"/>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="update-age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="update-age" wire:model.lazy="age">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="update-location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="update-location" wire:model.lazy="location">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" wire:click.prevent="update">Update</button>
            <button type="submit" class="btn btn-primary" wire:click.prevent="cancel">Cancel</button>
        </form>
    </div>

</div>




