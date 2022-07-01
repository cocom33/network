<x-app-layout>
    @slot('header')
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Ini Timeline</h1>
    @endslot

    <x-container>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-8">
                <x-card>
                    <form action="{{ route('status.store') }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->gravatar() }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">{{ Auth::user()->name }}</div>

                                <div class="leading-relaxed my-2">
                                    <textarea name="body" id="body" placeholder="What do you think?"
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-300 transition duration-200"></textarea>
                                </div>

                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
                <div class="space-y-6 mt-5">
                    <div class=" space-y-3">
                        <x-statuses :statuses=$statuses></x-statuses>
                    </div>
                </div>
            </div>
            @if (Auth::user()->follows()->count())
                <div class="col-span-4">
                    <x-card>
                        <h1 class="font-semibold mb-5">Recently Follows</h1>
                        <div class="space-y-5">
                            <x-following :users="Auth::user()
                                ->follows()
                                ->limit(5)
                                ->get()"></x-following>
                        </div>
                    </x-card>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
