<div class="mb-4">
    <form action="/user/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" value="{{$user->name}}" name = "name" id="name">

        <button id="sendform" class="hidden" type="submit">send</button>
    </form>
</div>
