<!-- Module Code, Module Level-->
<div class="form-group form-row">
    <div class="col-3 mr-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Course Code</div>
            </div>
            <input id="course_code" class="form-control @error('course_code') is-invalid @enderror" type="text" name="course_code"
                   value="{{ old('course_code') ?? $course->course_code}}" placeholder="Course Code"/>
        </div>
        @error('course_code')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

</div>

<div class="form-group form-row">
    <div class="col-3 mr-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Award Level</div>
            </div>
            <select id="award_level" name="award_level" class="form-control @error('award_level') is-invalid @enderror">
                <option value>Select...</option>
                <option value="4" @if($course->award_level == 4) selected @endif>4</option>
                <option value="5" @if($course->award_level == 5) selected @endif>5</option>
                <option value="6" @if($course->award_level == 6) selected @endif>6</option>
                <option value="7" @if($course->award_level == 7) selected @endif>7</option>
            </select>
        </div>
        @error('award_level')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
    <div class="col-4 mr-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Award Type</div>
            </div>
            <select class="form-control @error('award_type') is-invalid @enderror" name="award_type">
                <option value>Select...</option>
                @foreach($course->awardTypes() as $code => $type)
                    <option value="{{ $code }}" @if($course->award_type == $code) selected @endif>({{ $code }}) {{ $type }}</option>
                @endforeach
            </select>
        </div>
        @error('award_type')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<div class="form-group form-row mb-4">
    <div class="col-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Course Faculty</div>
            </div>
            <select class="form-control @error('faculty') is-invalid @enderror" name="faculty">
                <option value>Select...</option>
                @foreach($course->faculties() as $code => $faculty)
                    <option value="{{ $code }}" @if($course->faculty == $code) selected @endif>{{ $faculty }}</option>
                @endforeach
            </select>
        </div>
        @error('faculty')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<!-- Course Title-->
<div class="form-group form-row mb-5">
    <div class="col-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Course Title</div>
            </div>
            <input id="title" class="form-control @error('course_title') is-invalid @enderror" type="text" name="course_title"
                   value="{{ old('course_title') ?? $course->course_title}}" placeholder="Course Title">
        </div>
        @error('course_title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>



<hr>
