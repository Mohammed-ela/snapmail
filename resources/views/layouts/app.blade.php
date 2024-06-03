@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
