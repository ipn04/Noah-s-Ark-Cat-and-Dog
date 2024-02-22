<!-- resources/views/auth/verify-otp.blade.php -->
<x-guest-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="row justify-content-center bg-gray-100 p-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify OTP') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verifies-otp') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('OTP Code') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autofocus>

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary bg-blue-300 p-4 my-2">
                                        {{ __('Verify OTP') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

