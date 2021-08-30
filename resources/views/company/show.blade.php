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
                    <div>
                        <img src="{{ asset( "storage/logos/$company->logo" ) }}" alt="logo">
                    </div>
                    <div>{{ __('Name') }}: {{ $company->name }}</div>
                    <div>{{ __('Email') }}: {{ $company->email }}</div>
                    <div>{{ __('Website') }}: {{ $company->website }}</div>
                    <br>
                    <a href=" {{ route('companies.edit', $company->id) }}">
                        <button class="badge">{{ __('Edit') }}</button>
                    </a>
                    <br>
                    <form action=" {{ route('companies.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
