<div>
    <h1 class="display-6 mt-3 mb-3 text-center fw-bold">Edit patient</h1>
    {{$patient}}
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Patient Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           wire:model.lazy="name"/>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Age</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" wire:model.lazy="age">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Location</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" wire:model.lazy="location">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




