<div class="card my-3">
        <ul class="list-group list-group-flush">
            @if($users)
                @foreach($users as $key => $value)
                    <li class="list-group-item">
                        {{$value['fullname']}}
                        <span class="float-end">
                            <a type="button" class="btn btn-outline-info" href="/app/users">Info</a>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
