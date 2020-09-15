@if(isset($errors) && $errors->any())
        @foreach($errors->all() as $error)
            <script type="text/javascript">
                iziToast.error({
                    message: "{{ $error }}",
                    position: 'topRight'
                });
            </script>
        @endforeach
@endif
@if(session()->get('flash_success'))
    <script type="text/javascript">
        iziToast.success({
            message: "{{ session()->get('flash_success') }}",
            position: 'topRight'
        });
    </script>
@endif

@if(session()->get('flash_warning'))
    <script type="text/javascript">
        iziToast.warning({
            message: "{{ session()->get('flash_warning') }}",
            position: 'topRight'
        });
    </script>
@endif

@if(session()->get('flash_info') || session()->get('flash_message'))
    <script type="text/javascript">
        iziToast.info({
            message: "{{ session()->get('flash_info') }}",
            position: 'topRight'
        });
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
