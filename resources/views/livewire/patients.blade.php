<div>
    <div>
        <div>
            <h1 class="display-6 mt-3 mb-3 text-center fw-bold">Patients Crud</h1>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif

        @if($createPatient)
            <div>
                <livewire:add-patient/>
                {{--                @include('livewire.add-patients')--}}
            </div>
        @endif
        @if($updatePatient)
            <div>
                <livewire:show-patient/>
                {{--                @include('livewire.show-patient')--}}
            </div>
        @endif
    </div>
    @livewire('table',['patients'=>$patients])
    {{--    @if($showAll)--}}

    {{--    @endif--}}
</div>
<script>
    function deletePatient(id) {
        if (confirm("Are you sure to delete this Patient?"))
            window.livewire.emit('deletePatientListener', id);
    }

</script>
