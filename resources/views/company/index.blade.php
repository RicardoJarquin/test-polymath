<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
        <br>
        <a href=" {{ route('companies.create') }}">
            <h2 class="badge">
                {{ __('Create company') }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!empty($companies))
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('Name') }}</th>
                                <th class="text-center">{{ __('Email') }}</th>
                                <th class="text-center">{{ __('Website') }}</th>
                                <th class="text-center">{{ __('Detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="text-center">{{ $company->name }}</td>
                                    <td class="text-center">{{ $company->email }}</td>
                                    <td class="text-center">{{ $company->website }}</td>
                                    <td class="text-center"><a href="{{ route('companies.show', [$company->id]) }}" target="_blank"> {{ __('Go to detail') }} </a></td>
                                </tr>
                            @endforeach
                            @if($companies->toArray()['last_page'] != 1)
                                <tr>
                                    <td colspan="4">
                                        {{ $companies->links() }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @else
                    <h2>
                        ('Without copanies registered')
                    </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
