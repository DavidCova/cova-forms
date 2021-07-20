<div class="dropdown">
    <a class="btn btn-link p-0" href="#" role="button" id="dropdDownUD" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>                              
    <ul class="dropdown-menu" aria-labelledby="dropdDownUD">
      <li><a class="dropdown-item" href="{{$edit_route}}"><i class="far fa-edit text-success me-2"></i>Edit</a></li>
      <li>
        <form action="{{$destroy_route}}" method="post">
            @csrf
            @method('DELETE')
        <button type="submit" class="dropdown-item" onclick="confirm('Are you sure?')"><i class="far fa-trash-alt text-danger me-2"></i>Delete</button>
        </form>
    </li>
    </ul>
  </div>