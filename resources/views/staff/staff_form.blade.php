<div class="form-group form-row">
    <label class="col-form-label" for="assigned_id">Assigned Staff ID:</label>
    <div class="col-2 mr-3">
        <input class="form-control" id="assigned_id" type="text" name="assigned_id"
               value="{{ old('assigned_id') ?? $staff->assigned_id }}" readonly>
    </div>
</div>
<div class="form-group form-row">
    <div class="col-2 mr-3">
        <label class="col-form-label" for="student_status">Staff Status:</label>
        <select id="staff_status" name="staff_status" class="form-control @error('staff_status') is-invalid @enderror">
            <option value>Select...</option>
            @foreach($statuses as $key)
                <option value="{{$key}}"
                    {{ ($key === old('staff_status') || $key === $staff->staff_status ? 'selected' : '')  }}
                >{{$key}}</option>
            @endforeach
        </select>
        @error('staff_status')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-2">
        <label class="col-form-label" for="dormancy_reason">Dormancy Reason</label>
        <select id="dormancy_reason" name="dormancy_reason"
                class="form-control @error('dormancy_reason') is-invalid @enderror">
            <option value>Select...</option>
            @foreach($dormancies as $key)
                <option value="{{$key}}"
                    {{ ($key === old('dormancy_reason') || $key === $staff->dormancy_reason ? 'selected' : '')  }}
                >{{$key}}</option>
            @endforeach
        </select>
        @error('dormancy_reason')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
<hr>
<!-- First Name, Middle Name-->
<div class="form-group form-row">
    <div class="col-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Title</div>
            </div>

            <select id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                <option value>Select...</option>
                @foreach($titles as $key)
                    <option value="{{$key}}"
                        {{ ($key === old('title') || $key === $staff->title ? 'selected' : '')  }}
                    >{{$key}}</option>
                @endforeach
            </select>
            @error('title')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>
</div>
<div class="form-group form-row">
    <div class="col-3 mr-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">FirstName</div>
            </div>
            <input id="firstname" class="form-control @error('firstname') is-invalid @enderror" type="text"
                   name="firstname"
                   value="{{ old('firstname') ?? $staff->firstname}}" placeholder="First Name"/>
        </div>
        @error('firstname')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Middle Name(s)</div>
            </div>
            <input id="middlenames" class="form-control @error('middlenames') is-invalid @enderror" type="text"
                   name="middlenames"
                   value="{{ old('middlenames') ?? $staff->middlenames}}" placeholder="Middle Name(s)"/>
        </div>
        @error('middlenames')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

</div>
<!-- Last name-->
<div class="form-group form-row mb-5">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Surname</div>
            </div>
            <input id="surname" class="form-control @error('surname') is-invalid @enderror" type="text" name="surname"
                   value="{{ old('surname') ?? $staff->surname}}" placeholder="Surname">
        </div>
        @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<!-- Address -->
<div class="form-group form-row mb-5">
    <div class="col-3 mr-4">
        <label class="form-check-label">Address</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Street</div>
            </div>
            <input type="text" id="address_street" class="form-control @error('address_street') is-invalid @enderror"
                   name="address_street"
                   placeholder="Street" value="{{ old('address_street') ?? $staff->address_street }}"/>
        </div>
        @error('address_street')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Town/City</div>
            </div>
            <input type="text" id="address_city" class="form-control @error('address_city') is-invalid @enderror"
                   name="address_city"
                   placeholder="City" value="{{ old('address_city') ?? $staff->address_city }}"/>
        </div>
        @error('address_city')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">PostCode</div>
            </div>
            <input type="text" id="address_postcode"
                   class="form-control @error('address_postcode') is-invalid @enderror" name="address_postcode"
                   placeholder="Post Code" value="{{ old('address_postcode') ?? $staff->address_postcode }}"/>
        </div>
        @error('address_postcode')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
<!-- Contact -->
<div class="form-group form-row">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Contact Number</div>
            </div>
            <input id="contact_no" class="form-control @error('contact_no') is-invalid @enderror" type="text"
                   name="contact_no"
                   value="{{ old('contact_no') ?? $staff->contact_no}}" placeholder="Phone Number">
        </div>
        @error('contact_no')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Email</div>
            </div>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                   value="{{ old('email') ?? $staff->email }}" placeholder="Email">
        </div>
        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<hr>


<div class="form-group form-row">
    <div id="rowcontrol" class="col-5">
        <label>Specialist Subjects</label>
        @php $i = 0 @endphp

        @forelse($staff->specialist_subjects as $subject)
            @php $i = $i+1 @endphp
            <div id="row{{$i}}" class="input-group specialist-subject-row my-1">
                <div class="input-group-prepend">
                    <div class="input-group-text">Subject</div>
                </div>
                <input class="form-control" type="text" name="specialist_subjects[]" value="{{ $subject }}">
                <div class="input-group-append">
                    <button type="button"
                            @if($loop->first) id="row-number" class="btn btn-danger delete-row d-none"
                            @else id="row-number{{$i}}" class="btn btn-danger delete-row"
                        @endif
                    >&times;
                    </button>
                </div>
            </div>
        @empty
            @if(old('specialist_subjects'))
                @for($j=0;$j<count(old('specialist_subjects'));$j++)
                    <div id="row{{$j}}" class="input-group specialist-subject-row my-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Subject</div>
                        </div>
                        <input class="form-control" type="text" name="specialist_subjects[]"
                               value="{{ old('specialist_subjects.'.$j) }}">
                        <div class="input-group-append">
                            <button type="button"
                                    @if($j==0) id="row-number" class="btn btn-danger delete-row d-none"
                                    @else id="row-number{{$j}}" class="btn btn-danger delete-row"
                                @endif
                            >&times;
                            </button>
                        </div>
                    </div>
                @endfor
            @else
                <div id="row1" class="input-group specialist-subject-row my-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Subject</div>
                    </div>
                    <input class="form-control" type="text" name="specialist_subjects[]" value="">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger delete-row d-none" id="row-number">&times;</button>
                    </div>
                </div>
            @endif
        @endforelse

        <button id="add-row" class="btn btn-info mt-2" type="button" name="add-row">Add Another Subject</button>
    </div>

</div>

<hr>
