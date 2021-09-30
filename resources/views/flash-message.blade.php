<!-- Alert -->

{{-- @php dd(session('messages')) --}}
    
{{-- @endphp --}}
@if ($messages = Session::has('messages'))
    <div class="alert alert-dismissible alert-success mt-4" role="alert">
        <button role="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @if (is_array($messages))
            @foreach ($messages as $message)
                {!! $message !!}<br/>
            @endforeach
        @else
            {!! $messages !!}<br/>
        @endif
    </div>
@endif