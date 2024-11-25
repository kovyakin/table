<div class="mb-6">
    <form action="/user" method="POST">
        @csrf
        @method('POST')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="font-bold text-3xl mb-4">
            Здесь и в контроллере ваша логика работы, валидация и т.п.
        </h2>

        <input type="text" value="" name = "name" id="name" class="rounded bg-amber-50">

        <button id="sendform" class="hidden" type="submit">send</button>
    </form>
</div>

