<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Old Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($audit->old_data) as $key => $value)
                @if($value == "" || $value == null || $value == 0)
                    @continue
                @endif
                @if(!is_array($value))
                <tr>
                        <td>{{$key ." = ".$value }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Updated Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach (json_decode($audit->new_data) as $key => $value)
                @if($value == "" || $value == null || $value == 0)
                    @continue
                @endif
                @if(!is_array($value))
                <tr>
                        <td>{{$key ." = ".$value }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>