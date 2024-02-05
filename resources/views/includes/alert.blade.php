@if ($alert1 = session()->pull('alert1'))
    <div class="alert alert-success mb-0 rounded-0 text-center py-2 small">
        {{$alert1}}
    </div>
@endif