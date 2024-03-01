<!-- resources/views/auth/verify-otp.blade.php -->
<x-guest-layout>
    @if ($errors->any())
        <script>
            var errorMessages = [];

            @foreach ($errors->all() as $error)
                errorMessages.push("{{ $error }}");
            @endforeach

            // Check if there are error messages before showing the alert
            if (errorMessages.length > 0) {
                swal({
                    title: "Error!",
                    text: errorMessages.join('\n'), // Join error messages with line breaks
                    type: "error",
                    confirmButtonText: "Cool"
                });
            }
        </script>
    @endif

    @if (session('account_added'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "You successfully created an account!",
                    "Press 'OK' to exit!",
                    "success"
                )
            });
        </script>
    @endif

    @if (session('otp_error_flag'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: "Error!",
                    text: 'Incorrect OTP verification code. Please, try again!', 
                    type: "error",
                    confirmButtonText: "Ok"
                });
            });
        </script>
    @endif
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
            <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
                <div class="card">
                    <div class="flex flex-col items-center justify-center text-center space-y-2">
                        <div class="font-semibold text-3xl">
                          <p>OTP Verification</p>
                        </div>
                        <div class="flex flex-row text-sm font-medium text-gray-400">
                            <p>We have sent a code to your phone number</p>
                        </div>
                    </div>
                    

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

                            <div class="form-group row my-16">
                                <label for="otp" class="col-md-4 col-form-label text-md-right"></label>

                                <div class="flex flex-col space-y-16">
                                    <div class="flex flex-row items-center justify-between mx-auto w-full gap-2">
                                        @for ($i = 1; $i <= 6; $i++)
                                            <div class="w-16 h-16">
                                                <input id="otp{{ $i }}" type="number" oninput="handleInput(event, '{{ $i }}')" maxlength="1" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none text-center outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700 text-center p-1 w-16 h-16 form-control otp-box @error('otp'.$i) is-invalid @enderror" name="otp{{ $i }}" required autofocus>
                                            </div>
                                            @error('otp'.$i)
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col space-y-5">
                                <div>
                                  <button type="submit" class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                                    {{ __('Verify Account') }}
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
<script>
    function handleInput(event, currentInput) {
        let input = event.target;
        let value = input.value;
        
        if (value.length > 1) {
            input.value = value.slice(0, 1);
        }
        
        if (value.length === 1 && currentInput < 6) {
            const nextInput = document.getElementById(`otp${parseInt(currentInput) + 1}`);
            if (nextInput) {
                nextInput.focus();
            }
        }
    }
</script>


