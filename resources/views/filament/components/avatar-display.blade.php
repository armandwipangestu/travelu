@if($getRecord() && $getRecord()->user)
    <img src="{{ asset('storage/' . $getRecord()->user->avatar) }}" alt="Avatar" style="max-width: 50%; height: auto;">
@endif
