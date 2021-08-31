<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
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
                    <form action=" {{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name">{{ __('First Name') }}</label>
                        <input type="text" name="first_name" required value="{{ $employee->first_name }}">
                        <br>
                        <label for="name">{{ __('Last Name') }}</label>
                        <input type="text" name="last_name" required value="{{ $employee->last_name }}">
                        <br>
                        <label for="email">{{ __('Email') }}</label>
                        <input type="text" name="email" value="{{ $employee->email }}">
                        <br>
                        <label for="phone">{{ __('Phone') }}</label>
                        <input type="text" name="phone" value="{{ $employee->phone }}">
                        <br>
                        <label for="companies_id">{{ __('Website') }}</label>
                        <select name="companies_id" id="companies_id">
                            @foreach($companies as $company)
                                <option value=" {{$company->id}} " {{ $company->id == $employee->companies_id ? 'selected' : ''}}> {{ $company->name }} </option>
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
