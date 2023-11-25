<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bookmarks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Delete Bookmark') }}
                        </h2>
                    </header>

                    <p>Are you sure you want to delete the bookmark "{{ $bookmark->title }}"?</p>
                    <p>Url: <a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a></p>

                    <form method="post" action="{{ route('bookmarks.destroy', $bookmark->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('DELETE')

                        <div class="flex items-center gap-4">
                            <x-danger-button>{{ __('Yes, delete') }}</x-danger-button>
                            <x-secondary-button onclick="window.location='{{ route('bookmarks.index') }}'">{{ __('Cancel') }}</x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
            @if(session('error'))
                <div class="mt-1 text-sm" style="color: red;">{{ session('error') }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
