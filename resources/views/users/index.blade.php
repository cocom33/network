<x-app-layout>
    @slot('header')
        Explore Users
    @endslot

    <x-container>
        <div class="grid grid-cols-4 gap-5 mt-4">
            <x-following :users="$users"></x-following>
        </div>
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </x-container>
</x-app-layout>
