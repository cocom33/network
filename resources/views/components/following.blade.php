@foreach ($users as $user)
    <x-card>
        <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="h-10 w-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>
            <div>
                <div class="font-semibold">{{ $user->name }}</div>
                @if (request()->routeIs('explore'))
                    <div class="mt-2">
                        <form action="{{ route('following.store', $user) }}" method="post">
                            @csrf
                            @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                <x-button>Unfollow</x-button>
                            @else
                                <x-button>Follow</x-button>
                            @endif
                        </form>
                    </div>
                @endif
                <div class="text-gray-600 text-sm">
                    @if ($user->pivot)
                        {{ $user->pivot->created_at->diffForHumans() }}
                    @endif
                </div>
            </div>
        </div>
    </x-card>
@endforeach
