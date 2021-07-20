<form action="{{$route}}" method="post">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-link" onclick="confirm('Are you sure?')"><i class="far fa-trash-alt text-danger"></i></button>
</form>
