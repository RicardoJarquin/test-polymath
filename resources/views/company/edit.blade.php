<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    @if(count($errors))
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li class="bg-red-500">{{$error}}</li>
                    <br>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action=" {{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="email">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ $company->name }}">
                        <br>
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email" value="{{ $company->email }}">
                        <br>
                        <label for="email">{{ __('Logo') }}</label>
                        <input type="file" name="logo">
                        <br>
                        <label for="website">{{ __('Website') }}</label>
                        <input type="text" name="website" value="{{ $company->website }}">
                        <br>
                        <button type="submit" class="badge">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
