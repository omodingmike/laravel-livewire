<div>
    {{--    <div>--}}
    {{--        <button class="btn btn-primary mb-2 mt-2" wire:click="create">Add New Patient</button>--}}
    {{--        <button class="btn btn-primary mb-2 mt-2" wire:click="$refresh">Refresh</button>--}}
    {{--    </div>--}}
    <div>
        <div>
            <div class="row">
                <div class="col">
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
                            <div class="col">
                                <div class="mt-4 pt-1">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Add</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                {{--                <div class="col">--}}
                {{--                    <button type="submit" class="btn btn-primary" wire:click.prevent="cancel">Cancel</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
    <div>
        {{--        <div>--}}
        {{--            <h1 class="display-6 text-center">All Patients</h1>--}}
        {{--        </div>--}}
        <table class="table table-bordered table-striped mt-3">
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
            @if (count($patients) > 0)
                @foreach($patients as $key => $patient)
                    <tr wire:key="{{$key}}">
                        <th>{{$key+1}}</th>
                        <td>{{($patient)->name}}</td>
                        <td>{{$patient->age}}</td>
                        <td>{{$patient->location}}</td>
                        <td>
                            <button class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#edit-modal"><i class="fa-solid fa-pen-to-square me-2"
                                                                                                                   wire:click="edit({{$patient->id}})"></i>
                            </button>
                            <button class="btn btn-primary" wire:click="deletePatient({{$patient->id}})"><i class="fa-solid fa-trash"></i></button>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <h1 class="text-center display-6">No patients found</h1>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Patient</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                               wire:model.lazy="updateName"/>
                        @error('name') <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" wire:model.lazy="updateAge">
                            @error('age') <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" wire:model.lazy="updateLocation">
                            @error('location') <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update" data-bs-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>

</div>
