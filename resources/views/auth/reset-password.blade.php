
@section('content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

    </form>
@endsection
