@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow ">
        <form action="{{ route('course.structure_course', $course) }}" method="POST">
            @csrf
            <div class="card-header">
                <legend>Structure Course</legend>
            </div>
            <fieldset class="form-group mb-5">
                <div class="card-body">
                    <!-- Module Code, Module Level-->
                    <div class="row mb-2">
                        <div class="col-2">
                            <h2 class="card-title text-gray-800"><u>Course Title</u></h2>
                        </div>
                        <div class="col-auto">
                            <h2 class="card-title">{{ $course->course_title }}</h2>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-2">
                            <h5 class="card-title text-gray-800"><u>Course Code</u></h5>
                        </div>
                        <div class="col-auto">
                            <h5 class="card-title">{{ $course->course_code }}</h5>
                        </div>
                    </div>

                    <!-- Modules -->
                    <div class="card mb-4">
                        <div class="card-header mb-2">
                            <div class="text-lg">Course Modules</div>
                        </div>
                        <div class="card-body">
                            <!-- Year 1 Modules -->
                            <div class="card-header mb-2">
                                <div class="text-lg text-gray-800">Year 1 Modules</div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 1</div>
                                        </div>
                                        <select id="year1_module_one" name="year1_module_one" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_one') || $module->id == $course->year1_module_one ? 'selected' : ''}}
                                                >
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_one')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 2</div>
                                        </div>
                                        <select id="year1_module_two" name="year1_module_two" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_two') || $module->id == $course->year1_module_two ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_two')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 3</div>
                                        </div>
                                        <select id="year1_module_three" name="year1_module_three" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_three') || $module->id == $course->year1_module_three ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_three')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 4</div>
                                        </div>
                                        <select id="year1_module_four" name="year1_module_four" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_four') || $module->id == $course->year1_module_four ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_four')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 5</div>
                                        </div>
                                        <select id="year1_module_five" name="year1_module_five" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_five') || $module->id == $course->year1_module_five ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_five')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 6</div>
                                        </div>
                                        <select id="year1_module_six" name="year1_module_six" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($firstyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year1_module_six') || $module->id == $course->year1_module_six ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year1_module_six')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>


                            <!-- YEAR TWO MODULES-->
                            <!-- Modules -->
                            <div class="card-header mt-5 mb-2 text-gray-800">
                                <div class="text-lg">Year 2 Modules</div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 1</div>
                                        </div>
                                        <select id="year2_module_one" name="year2_module_one" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_one') || $module->id == $course->year2_module_one ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_one')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 2</div>
                                        </div>
                                        <select id="year2_module_two" name="year2_module_two" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_two') || $module->id == $course->year2_module_two ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_two')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 3</div>
                                        </div>
                                        <select id="year2_module_three" name="year2_module_three" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_three') || $module->id == $course->year2_module_three ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_three')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 4</div>
                                        </div>
                                        <select id="year2_module_four" name="year2_module_four" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_four') || $module->id == $course->year2_module_four ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_four')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 5</div>
                                        </div>
                                        <select id="year2_module_five" name="year2_module_five" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_five') || $module->id == $course->year2_module_five ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_five')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 6</div>
                                        </div>
                                        <select id="year2_module_six" name="year2_module_six" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($secondyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year2_module_six') || $module->id == $course->year2_module_six ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year2_module_six')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <!-- YEAR THREE MODULES-->
                            <!-- Modules -->
                            <div class="card-header mb-2 mt-5 text-gray-800">
                                <div class="text-lg">Year 3 Modules</div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 1</div>
                                        </div>
                                        <select id="year3_module_one" name="year3_module_one" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($thirdyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year3_module_one') || $module->id == $course->year3_module_one ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year3_module_one')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 2</div>
                                        </div>
                                        <select id="year3_module_two" name="year3_module_two" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($thirdyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year3_module_two') || $module->id == $course->year3_module_two ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year3_module_two')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 3</div>
                                        </div>
                                        <select id="year3_module_three" name="year3_module_three" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($thirdyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year3_module_three') || $module->id == $course->year3_module_three ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year3_module_three')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 4</div>
                                        </div>
                                        <select id="year3_module_four" name="year3_module_four" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($thirdyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year3_module_four') || $module->id == $course->year3_module_four ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year3_module_four')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 mr-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Module 5</div>
                                        </div>
                                        <select id="year3_module_five" name="year3_module_five" class="form-control">
                                            <option value>Select...</option>
                                            @foreach($thirdyear_modules as $module)
                                                <option
                                                    value="{{$module->id}}"
                                                    {{ $module->id == old('year3_module_five') || $module->id == $course->year3_module_five ? 'selected' : ''}}>
                                                    {{$module->module_code}}
                                                    - {{$module->module_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('year3_module_five')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <!-- Submit -->
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-auto ">
                            <button class="btn btn-primary btn-lg" type="submit" >
                                Save Course Structure
                            </button>
                        </div>
                    </div>

                </div>
            </fieldset>

        </form>
    </div>
</div>

@endsection
