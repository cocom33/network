<x-app-layout>
    @slot('header')
        Update Your Profile Information
    @endslot

    <x-container>
        <div class="flex">
            <div class="w-50 lg:w-1/2 mt-5">
                
                <x-card>
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-5">
                            <x-label for="name">Name</x-label>
                            <x-input value="{{ old('name', Auth::user()->name) }}" class="mt-1 w-full" id="name"
                                name="name" type="text"></x-input>
                            @error('name')
                                <div class="text-red-300 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="username">Username</x-label>
                            <x-input value="{{ old('username', Auth::user()->username) }}" class="mt-1 w-full"
                                id="username" name="username" type="text"></x-input>
                            @error('username')
                                <div class="text-red-300 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <x-label for="email">Email</x-label>
                            <x-input value="{{ old('email', Auth::user()->email) }}" class="mt-1 w-full"
                                id="email" name="email" type="email"></x-input>
                            @error('email')
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
