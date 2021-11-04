<div class="form-group form-row">
    <label class="col-form-label" for="assigned_id">Generated Student ID:</label>
    <div class="col-2 mr-3">
        <input class="form-control" id="assigned_id" type="text" name="assigned_id"
               value="{{ old('assigned_id') ?? $student->assigned_id }}" readonly>
    </div>
</div>
<div class="form-group form-row">
    <div class="col-2">
        <label class="col-form-label" for="student_status">Student Status:</label>
        <select id="student_status" name="student_status" class="form-control @error('student_status') is-invalid @enderror">
            <option value>Select...</option>
            @foreach($statuses as $key)
                <option value="{{$key}}"
                    {{ ($key === old('student_status') || $key === $student->student_status ? 'selected' : '')  }}
                >{{$key}}</option>
            @endforeach
        </select>
        @error('student_status')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-2">
        <label class="col-form-label" for="dormancy_reason">Dormancy Reason</label>
        <select id="dormancy_reason" name="dormancy_reason" class="form-control @error('dormancy_reason') is-invalid @enderror">
            <option value>Select...</option>
            @foreach($dormancies as $key)
                <option value="{{$key}}"
                    {{ ($key === old('dormancy_reason') || $key === $student->dormancy_reason ? 'selected' : '')  }}
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
                        {{ ($key === old('title') || $key === $student->title ? 'selected' : '')  }}
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
            <input id="firstname" class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname"
                   value="{{ old('firstname') ?? $student->firstname}}"
                   placeholder="First Name">
        </div>
        @error('firstname')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Middle Name(s)</div>
            </div>
            <input id="middlenames" class="form-control @error('middlenames') is-invalid @enderror" type="text" name="middlenames"
                   value="{{ old('middlenames') ?? $student->middlenames}}"
                   placeholder="Middle Name(s)">
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
                   value="{{ old('surname') ?? $student->surname}}"
                   placeholder="Surname">
        </div>
        @error('surname')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<!-- Date Birth-->
<div class="form-group form-row mb-5">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Date of Birth</div>
            </div>
            <input id="date_of_birth" class="form-control datetimepicker @error('dateofbirth') is-invalid @enderror" type="date" name="date_of_birth"
                   value="{{ old('dateofbirth') ?? $student->date_of_birth }}">
        </div>
        @error('date_of_birth')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<!-- Term Address -->
<div class="form-group form-row mb-5">
    <div class="col-3 mr-4">
        <label class="form-check-label">Term Address</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Street</div>
            </div>
            <input type="text" id="term_address_street" class="form-control @error('term_address_street') is-invalid @enderror" name="term_address_street"
                   placeholder="Street" value="{{ old('term_address_street') ?? $student->term_address_street }}"/>
        </div>
        @error('term_address_street')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend ">
                <div class="input-group-text text-center">Town/City</div>
            </div>
            <input type="text" id="term_address_city" class="form-control @error('term_address_city') is-invalid @enderror" name="term_address_city"
                   placeholder="City" value="{{ old('term_address_city') ?? $student->term_address_city }}"/>
        </div>
        @error('term_address_city')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group w-100">
            <div class="input-group-prepend ">
                <div class="input-group-text">PostCode</div>
            </div>
            <input type="text" id="term_address_postcode" class="form-control @error('term_address_postcode') is-invalid @enderror" name="term_address_postcode"
                   placeholder="Post Code" value="{{ old('term_address_postcode') ?? $student->term_address_postcode }}"/>
        </div>
        @error('term_address_postcode')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Country</div>
            </div>

            <select id="term_address_country" name="term_address_country" class="form-control @error('term_address_country') is-invalid @enderror">
                <option value>Select...</option>
                @foreach($countries as $key)
                    <option value="{{ $key }}"
                        {{ ($key === old('term_address_country') || $key === $student->term_address_country ? 'selected' : '')  }}
                    >{{$key}}</option>
                @endforeach
            </select>
        </div>
        @error('term_address_country')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <!-- Home Address -->
    <div class="col-3 mr-4">
        <label class="form-check-label">Home Address</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Street</div>
            </div>
            <input type="text" id="home_address_street" class="form-control @error('home_address_street') is-invalid @enderror" name="home_address_street"
                   placeholder="Street" value="{{ old('home_address_street') ?? $student->home_address_street }}"/>
        </div>
        @error('home_address_street')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Town/City</div>
            </div>
            <input type="text" id="home_address_city" class="form-control @error('home_address_city') is-invalid @enderror" name="home_address_city"
                   placeholder="City" value="{{ old('home_address_city') ?? $student->home_address_city }}"/>
        </div>
        @error('home_address_city')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">PostCode</div>
            </div>
            <input type="text" id="home_address_postcode" class="form-control @error('home_address_postcode') is-invalid @enderror" name="home_address_postcode"
                   placeholder="Post Code" value="{{ old('home_address_postcode') ?? $student->home_address_postcode }}"/>
        </div>
        @error('home_address_postcode')<small class="text-danger">{{ $message }}</small>@enderror
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Country</div>
            </div>

            <select id="home_address_country" name="home_address_country" class="form-control @error('home_address_country') is-invalid @enderror">
                <option value>Select...</option>
                @foreach($countries as $key)
                    <option value="{{$key}}"
                        {{ ($key === old('home_address_country') || $key === $student->home_address_country ? 'selected' : '')  }}
                    >{{$key}}</option>
                @endforeach
            </select>
        </div>
        @error('home_address_country')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>
<!-- Contact -->
<div class="form-group form-row">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Contact Number</div>
            </div>
            <input id="contact_no" class="form-control @error('contact_no') is-invalid @enderror" type="text" name="contact_no"
                   value="{{ old('contact_no') ?? $student->contact_no}}"
                   placeholder="Phone Number">
        </div>
        @error('contact_no')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Email</div>
            </div>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                   value="{{ old('email') ?? $student->email}}"
                   placeholder="Email">
        </div>
        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<hr>
<!-- Course Code, Qualifications-->
<div class="form-group form-row mt-3">
    <div class="col-5 mr-5">
        <label for="course_code">Student Course Selection</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Course Code</div>
            </div>
            <select id="course_id" name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                <option value>Select...</option>
                @foreach($courses as $course)
                    <option value="{{$course->id}}"
                        {{ ($course === old('course_id') || $course->id === $student->course_id ? 'selected' : '')  }}
                    >({{$course->course_code }}) - {{$course->course_title}}</option>
                @endforeach
            </select>
        </div>
        @error('course_id')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>



<div class="form-group form-row">
    <div id="rowcontrol" class="col-5">
        <label>Qualifications</label>
        @php $i = 0 @endphp
        @forelse($student->qualifications as $subject)
            @php $i = $i+1 @endphp
            <div id="row{{$i}}" class="input-group qualification-row my-1">
                <div class="input-group-prepend">
                    <div class="input-group-text">Qualification</div>
                </div>
                <input class="form-control" type="text" name="qualifications[]" value="{{ $subject }}">
                <div class="input-group-append">
                    <button type="button"
                            @if($loop->first) id="row-number" class="btn btn-danger delete-row d-none"
                            @else id="row-number{{$i}}" class="btn btn-danger delete-row"
                        @endif
                    >&times;</button>
                </div>
            </div>
        @empty
            @if(old('qualifications'))
                @for($j=0;$j<count(old('qualifications'));$j++)
                    <div id="row{{$j+1}}" class="input-group qualification-row my-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Qualification</div>
                        </div>
                        <input class="form-control" type="text" name="qualifications[]" value="{{ old('qualifications.'.$j) }}">
                        <div class="input-group-append">
                            <button type="button"
                                    @if($j==0) id="row-number" class="btn btn-danger delete-row d-none"
                                    @else id="row-number{{$j}}" class="btn btn-danger delete-row"
                                @endif
                            >&times;</button>
                        </div>
                    </div>
                @endfor
            @else
                <div id="row1" class="input-group qualification-row my-1">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Subject</div>
                    </div>
                    <input class="form-control" type="text" name="qualifications[]" value="">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger delete-row d-none" id="row-number">&times;</button>
                    </div>
                </div>
            @endif
        @endforelse

        <button id="add-row" class="btn btn-info mt-2" type="button" name="add-row">Add Another Qualification</button>
    </div>
</div>

<hr>
