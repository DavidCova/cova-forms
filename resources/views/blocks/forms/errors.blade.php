@if ( count( $errors ) > 0 )
<ul class="list-group list-group-flush">
    @foreach ($errors->all() as $error)
    <li class="list-group-item alert alert-danger" role="alert">{{ $error }}</li>
    @endforeach
</ul>
@endif