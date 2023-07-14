@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-exclamation-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
