@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @php
        session()->forget('success');
    @endphp
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @php
        session()->forget('error');
    @endphp
@endif
