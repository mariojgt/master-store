<x-MasterStore::layout.login>
    <x-MasterStore::auth.authconteiner title="Login">
        <x-slot name="form">
            <x-MasterStore::form.form action="{{ route('login.user') }}">
                <div class="px-5 py-7">
                    <x-MasterStore::form.email name="email" label="Email" />
                    <x-MasterStore::form.password name="password" label="Password" />
                    <x-MasterStore::form.submit />
                </div>
            </x-MasterStore::form.form>
        </x-slot>

        <x-slot name="links">
            <div class="grid grid-cols-2 gap-1">
                <div class="text-center sm:text-center whitespace-nowrap">
                    <x-MasterStore::form.link route="{{ route('forgot-password') }}" name="Forgot Password" />
                </div>
                <div class="text-center sm:text-center whitespace-nowrap">
                    <x-MasterStore::form.link route="{{ route('register') }}" name="Register" />
                </div>
            </div>
        </x-slot>
    </x-MasterStore::auth.authconteiner>

</x-MasterStore::layout.login>
