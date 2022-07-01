<x-app-layout>
    @slot('header')
        Update Your Password
    @endslot

    <x-container>
        <div class="flex">
            <div class="w-50 lg:w-1/2 mt-5">
                <x-card>
                    <form action="{{ route('password.edit') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-5">
                            <x-label for="current_password">Current Password</x-label>
                            <x-input vclass="mt-1 w-full" id="current_password" name="current_password" type="password">
                            </x-input>
                            @error('current_password')
                                <div class="text-red-300 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password">New Password</x-label>
                            <x-input class="mt-1 w-full" id="password" name="password" type="password"></x-input>
                            @error('password')
                                <div class="text-red-300 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="password_confirmation">Password Confirmation</x-label>
                            <x-input class="mt-1 w-full" id="password_confirmation" name="password_confirmation"
                                type="password"></x-input>
                            @error('password_confirmation')
                                <div class="text-red-300 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-button>Update</x-button>
                    </form>
                </x-card>
            </div>
        </div>

    </x-container>
</x-app-layout>
