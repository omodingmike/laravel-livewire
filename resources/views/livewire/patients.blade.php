<div>
    <h1 class="display-6 mt-3 mb-3 text-center fw-bold">Patients Crud</h1>
    <div>
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               wire:model.lazy="name"/>
                        @error('name') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" wire:model.lazy="age">
                        @error('age') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Location</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" wire:model.lazy="location">
                        @error('location') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Location</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $key => $patient)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{($patient)->name}}</td>
                <td>{{$patient->age}}</td>
                <td>{{$patient->location}}</td>
                <td><a href="#"><i class="fa-solid fa-pen-to-square me-2"></i></a> <a href="#"><i
                            class="fa-solid fa-trash"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
