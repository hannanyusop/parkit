@if(isset($errors) && $errors->any())
        @foreach($errors->all() as $error)
            <script type="text/javascript">
                toastr.error("{{ $error }}");
            </script>
        @endforeach
@endif
<script type="text/javascript">
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@if(session()->get('flash_success'))
    <script type="text/javascript">
        toastr.success("{{ session()->get('flash_success') }}");
    </script>
@endif

@if(session()->get('flash_warning'))
    <script type="text/javascript">
        toastr.warning("{{ session()->get('flash_warning') }}");
    </script>
@endif

@if(session()->get('flash_info') || session()->get('flash_message'))
    <script type="text/javascript">
        toastr.info("{{ session()->get('flash_info') }}");
    </script>
@endif

@if(session()->get('flash_danger'))
    <x-utils.alert type="danger" class="header-message">
        {{ session()->get('flash_danger') }}
    </x-utils.alert>
@endif

@if(session()->get('status'))
    <x-utils.alert type="success" class="header-message">
        {{ session()->get('status') }}
    </x-utils.alert>
@endif

@if(session()->get('resent'))
    <x-utils.alert type="success" class="header-message">
        @lang('A fresh verification link has been sent to your email address.')
    </x-utils.alert>
@endif

@if(session()->get('verified'))
    <x-utils.alert type="success" class="header-message">
        @lang('Thank you for verifying your e-mail address.')
    </x-utils.alert>
@endif
