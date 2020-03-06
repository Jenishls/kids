@if(sectionNameToLookups('communication_preference')->count())
    @foreach(sectionNameToLookups('communication_preference') as $key => $preference)
        <label class="kt-checkbox kt-checkbox--solid">
            <input type="checkbox" value="{{$preference->id}}" data-code="{{$preference->code}}" name="comm_pref_id[]"
            @foreach($client->comm_preferences as $key => $clientPref)
                @if($preference->code== $clientPref->code)
                checked="checked"
                @endif
            @endforeach
            >
            {{$preference->value}}
            <span></span>
        </label>
    @endforeach
@endif