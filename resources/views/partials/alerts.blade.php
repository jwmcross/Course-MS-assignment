@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle fa-1x"></i>
         {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle fa-1x"></i>
         {{ session('warning') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle fa-1x"></i>
         {{ session('error') }}
    </div>
@endif
