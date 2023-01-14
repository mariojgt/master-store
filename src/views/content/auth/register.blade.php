<x-MasterStore::layout.login>
    <x-MasterStore::auth.authconteiner title="Register">
        <x-slot name="form">
            <x-MasterStore::form.form action="{{ route('register.user') }}">
                <div class="px-5 py-7">
                    <x-MasterStore::form.text name="name" label="Name" />
                    <x-MasterStore::form.email name="email" label="Email" />
                    <x-MasterStore::form.password name="password" label="Password" />
                    <x-MasterStore::form.password name="password_confirmation" label="Password Confirm" />
                    <x-MasterStore::form.submit name="Register" />
                </div>
            </x-MasterStore::form.form>
        </x-slot>

        <x-slot name="links">
            <x-MasterStore::form.link route="{{ route('login') }}" name="Login" />
        </x-slot>
    </x-MasterStore::auth.authconteiner>
</x-MasterStore::layout.login>
