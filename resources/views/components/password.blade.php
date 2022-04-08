<div class="relative">
    <x-input tabindex="0" placeholder="{{ __('Password') }}" type="password" id="password" name="password" required autocomplete="new-password" />
    <i class="fa fa-eye-slash"></i>
    {{-- <div class="absolute top-2 right-2">
        <i class="fa fa-eye-slash" aria-hidden="true" onclick="togglePassword(this, 'password')" role="button"></i>
    </div>
    <div class="text-red-500">
        {{ $errors->first('password') }}
    </div> --}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function togglePassword(eye, input) {
        let $input = document.getElementById(input);
        if ($input.type === 'password') {
            $input.type = "text";
            eye.classList = "fa fa-eye-slash";
        } else {
            $input.type = "password";
            eye.classList = "fa fa-eye";
        }
    }
</script>
