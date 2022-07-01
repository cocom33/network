@foreach ($statuses as $status)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img class="h-10 w-10 rounded-full" src="{{ $status->user->gravatar() }}"
                    alt="{{ $status->user->name }}">
            </div>
            <div>
                <div class="font-semibold">{{ $status->user->name }}</div>

                <div class="leading-relaxed">
                    {{ $status->body }}
                </div>

                <div class="text-gray-600 text-sm">
                    {{ $status->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </x-card>
@endforeach
