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
                            {{ __('Bookmarks List') }}
                        </h2>
                    </header>

                    <div class="flex items-center gap-4, mt-6 space-y-6">
                        <x-primary-button  onclick="window.location='{{ route('bookmarks.create') }}'">{{ __('Add new Bookmark') }}</x-primary-button>
                    </div>

                    @if(session('success'))
                        <div class="mt-1 text-sm" style="color: green;">{{ session('success') }}</div>
                    @endif

                    <div class="mt-6 space-y-6">
                        <table class="bookmark-table w-full border-collapse text-center">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border">ID</th>
                                    <th class="py-2 px-4 border">Title</th>
                                    <th class="py-2 px-4 border">URL</th>
                                    <th class="py-2 px-4 border">User</th>
                                    <th class="py-2 px-4 border">Created At</th>
                                    <th class="py-2 px-4 border">Updated At</th>
                                    <th class="py-2 px-4 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookmarks as $bookmark)
                                    <tr>
                                        <td class="py-2 px-4 border">{{ $bookmark->id }}</td>
                                        <td class="py-2 px-4 border">{{ $bookmark->title }}</td>
                                        <td class="py-2 px-4 border"><a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a></td>
                                        <td class="py-2 px-4 border">{{ $bookmark->user->name }}</td>
                                        <td class="py-2 px-4 border">{{ $bookmark->created_at->format('d-m-Y H:i:s') }}</td>
                                        <td class="py-2 px-4 border">{{ $bookmark->updated_at->format('d-m-Y H:i:s') }}</td>
                                        <td class="py-2 px-4 border">
                                            <x-secondary-button  onclick="window.location='{{ route('bookmarks.edit', $bookmark->id) }}'">Edit</x-secondary-button>
                                            <x-danger-button  onclick="window.location='{{ route('bookmarks.delete.confirmation', $bookmark->id) }}'">Delete</x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
