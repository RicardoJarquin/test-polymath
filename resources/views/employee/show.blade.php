<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>{{ __('Name') }}: {{ $employee->first_name }}</div>
                    <div>{{ __('Name') }}: {{ $employee->last_name }}</div>
                    <div>{{ __('Company') }}: {{ $employee->company->name }}</div>
                    <div>{{ __('Email') }}: {{ $employee->email }}</div>
                    <div>{{ __('Phone') }}: {{ $employee->phone }}</div>
                    <br>
                    <a href=" {{ route('employees.edit', $employee->id) }}">
                        <button class="badge">{{ __('Edit') }}</button>
                    </a>
                    <br>
                    <form action=" {{ route('employees.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
