<x-MasterStore::layout.login>
    <x-MasterStore::auth.authconteiner title="Password Reset" >
        <x-slot name="form">
            <x-MasterStore::form.form action="{{ route('password-reset') }}" >
                <div class="px-5 py-7">
                    <x-MasterStore::form.email name="email" label="Email" />
                    <x-MasterStore::form.submit name="Reset" />
                </div>
            </x-MasterStore::form.form>
        </x-slot>

        <x-slot name="links">
            <div class="px-5 py-7">
                <div class="grid grid-cols-1 gap-3">
                    <x-MasterStore::form.link route="{{ route('login') }}" name="Login" />
                </div>
            </div>
        </x-slot>
    </x-MasterStore::auth.authconteiner>
</x-MasterStore::layout.login>
