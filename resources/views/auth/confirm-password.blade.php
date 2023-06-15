
@section('content')

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div class="flex justify-end mt-4">
            <button>
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
@endsection
