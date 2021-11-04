<!-- Module Code, Module Level-->
<div class="form-group form-row my-3">
    <div class="col-3 mr-3">
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Course Dept.</div>
            </div>
            <select name="course_dept" id="courseCode" class="form-control @error('course_dept') is-invalid @enderror">
                <option value>Select Course Dept...</option>
                @foreach($course_codes as $code => $dept)
                    <option value="{{ $code }}" @if($module->course_dept == $code) selected @endif>{{ $dept }}</option>
                @endforeach
            </select>
        </div>
        @error('course_dept')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-3">
        Module Code
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Module Code</div>
            </div>
            <input id="module_code" class="form-control @error('module_code') is-invalid @enderror" type="text" name="module_code" readonly
                   value="{{ old('module_code') ?? $module->module_code }}" placeholder="Module Code"/>
        </div>
        @error('module_code')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<div class="form-group form-row my-3">
    <div class="col-3 mr-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text @error('level') is-invalid @enderror">Module Level</div>
            </div>
            <select id="level" name="level" class="form-control">
                <option value>Select...</option>
                <option value="1" {{ old('level')==1 || $module->level == 1 ? 'selected' : '' }}>Level 1</option>
                <option value="3" {{ old('level')==2 || $module->level == 2 ? 'selected' : '' }}>Level 2</option>
                <option value="2" {{ old('level')==3 || $module->level == 3 ? 'selected' : '' }}>Level 3</option>
                <option value="4" {{ old('level')==4 || $module->level == 4 ? 'selected' : '' }}>Level 4</option>
            </select>
        </div>
        @error('level')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Module points</div>
            </div>
            <input id="points" class="form-control @error('points') is-invalid @enderror" type="text" name="points"
                   value="{{ old('points') ?? $module->points}}" placeholder="Module Points"/>
        </div>
        @error('points')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>


<!-- Module Title -->
<div class="form-group form-row my-5">
    <div class="col-5">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Module Title</div>
            </div>
            <input id="module_title" class="form-control @error('module_title') is-invalid @enderror" type="text" name="module_title"
                   value="{{ old('module_title') ?? $module->module_title}}" placeholder="Module Title">
        </div>
        @error('module_title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<!-- Assignment Weights -->
<div class="form-group form-row mb-2">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Assessment One Weight</div>
            </div>
            <input id="assessment1_weight" class="form-control @error('assessment1_weight') is-invalid @enderror" type="number" name="assessment1_weight" max="100"
                   value="{{ old('assessment1_weight') ?? $module->assessment1_weight}}">
            <div class="input-group-append">
                <div class="input-group-text">%</div>
            </div>
        </div>
        @error('assessment1_weight')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<div class="form-group form-row mb-2">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Assessment Two Weight</div>
            </div>
            <input id="assessment2_weight" class="form-control @error('assessment2_weight') is-invalid @enderror" type="number" name="assessment2_weight" max="100"
                   value="{{ old('assessment2_weight') ?? $module->assessment2_weight}}">
            <div class="input-group-append">
                <div class="input-group-text">%</div>
            </div>
        </div>
        @error('assessment2_weight')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>

<div class="form-group form-row mb-2">
    <div class="col-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Exam Assessment Weight</div>
            </div>
            <input id="exam_weight" class="form-control @error('exam_weight') is-invalid @enderror" type="number" name="exam_weight" max="100"
                   value="{{ old('exam_weight') ?? $module->exam_weight}}">
            <div class="input-group-append">
                <div class="input-group-text">%</div>
            </div>
        </div>
        @error('exam_weight')<small class="text-danger">{{ $message }}</small>@enderror
    </div>
</div>


<hr>


<script>
    let select = document.getElementById('courseCode');
    let code = select.option[select.selectedIndex].value;

    let moduleInput = document.getElementById('module_code');
    let val = moduleInput.value;
    moduleInput.value = code+'-'+val;

    //document.addEventListener($select)

</script>
