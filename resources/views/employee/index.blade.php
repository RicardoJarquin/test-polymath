<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
        <br>
        <a href=" {{ route('employees.create') }}">
            <h2 class="badge">
                {{ __('Create employee') }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!empty($employees))
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('First Name') }}</th>
                                <th class="text-center">{{ __('Last Name') }}</th>
                                <th class="text-center">{{ __('Company') }}</th>
                                <th class="text-center">{{ __('Detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="text-center">{{ $employee->first_name }}</td>
                                    <td class="text-center">{{ $employee->last_name }}</td>
                                    <td class="text-center">{{ $employee->company->name }}</td>
                                    <td class="text-center"><a href="{{ route('employees.show', [$employee->id]) }}" target="_blank"> {{ __('Go to detail') }} </a></td>
                                </tr>
                            @endforeach
                            @if($employees->toArray()['last_page'] != 1)
                                <tr>
                                    <td colspan="4">
                                        {{ $employees->links() }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @else
                    <h2>
                        {{ __('Without employees registered') }}
                    </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
