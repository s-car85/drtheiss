@if($testimonial->avatar != null)
<img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="profile-user-img img-responsive img-circle" width="60">
@endif