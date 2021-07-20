@foreach ($options as $option)
  <div class="form-check">
    <input class="form-check-input" type="radio" name="{{$identifier}}" id="{{$identifier}}2" checked>
    <label class="form-check-label" for="{{$identifier}}2">
      Default checked radio
    </label>
  </div>
  @endforeach
