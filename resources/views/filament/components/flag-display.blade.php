@if($getRecord() && $getRecord()->country)
    <img src="{{ asset('storage/' . $getRecord()->country->flag) }}" alt="Flag" style="max-width: 50%; height: auto;">
@endif
