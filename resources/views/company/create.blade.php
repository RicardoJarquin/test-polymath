<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action=" {{ route('companies.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" required>
                        <br>
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email">
                        <br>
                        <label for="logo">{{ __('Logo') }}</label>
                        <input type="file" name="logo">
                        <br>
                        <label for="website">{{ __('Website') }}</label>
                        <input type="text" name="website">
                        <br>
                        <button type="submit" class="badge">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
