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
                    <form action=" {{ route('employees.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">{{ __('First Name') }}</label>
                        <input type="text" name="first_name" required>
                        <br>
                        <label for="name">{{ __('Last Name') }}</label>
                        <input type="text" name="last_name" required>
                        <br>
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email">
                        <br>
                        <label for="phone">{{ __('Phone') }}</label>
                        <input type="text" name="phone">
                        <br>
                        <label for="companies_id">{{ __('Website') }}</label>
                        <select name="companies_id" id="companies_id">
                            @foreach($companies as $company)
                                <option value=" {{$company->id}} "> {{ $company->name }} </option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="badge">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
