<button type="submit" class="btn btn-success rounded-pill my-2"
@if (isset($confirm))
    onclick="return confirm('{{$confirm}}')"
@endif
><i class="far fa-paper-plane me-2"></i>{{__('Send')}}</button>