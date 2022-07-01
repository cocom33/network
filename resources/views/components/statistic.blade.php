<div class="border-b mb-3">
    <x-container>
        <div class="flex items-center justify-between">
            <div class="flex">
                <a href="{{ route('profile', $user->username) }}" class="px-10 py-3 text-center border-r border-1">
                    <div class="text-2xl font-semibold mb-1">{{ $user->statuses->count() }}</div>
                    <div class="uppercase text-xs text-gray-500">Status</div>
                </a>
                <a href="{{ route('following.index', [$user->username, 'following']) }}"
                    class="px-10 py-3 text-center border-r border-1">
                    <div class="text-2xl font-semibold mb-1">{{ $user->follows->count() }}</div>
                    <div class="uppercase text-xs text-gray-500">Following</div>
                </a>
                <a href="{{ route('following.index', [$user->username, 'follower']) }}"
                    class="px-10 py-3 text-center border-r border-1">
                    <div class="text-2xl font-semibold mb-1">{{ $user->followers->count() }}</div>
                    <div class="uppercase text-xs text-gray-500">Follower</div>
                </a>
            </div>
            @if (Auth::user()->isNot($user))
                <div>
                    <form action="{{ route('following.store', $user) }}" method="post">
                        @csrf
                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                            <x-button>Unfollow</x-button>
                        @else
                            <x-button>Follow</x-button>
                        @endif
                    </form>
                </div>
            @else
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="">Edit Profile</a>
            @endif
        </div>
    </x-container>
</div>
