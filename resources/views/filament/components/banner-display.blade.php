@if($getRecord() && $getRecord()->holiday_package)
    <img src="{{ asset('storage/' . $getRecord()->holiday_package->banner) }}" alt="Banner" style="max-width: 50%; height: auto;">
@endif
