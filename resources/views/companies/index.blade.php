<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end pb-4">
                <a href="{{ route('companies.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded">New Company</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="companies" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td><img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/default_logo.png') }}" alt="Company Logo" width="50" height="50"></td>
                                    <td>
                                        <div class="flex space-x-4">
                                            <a href="{{ route('companies.show', $company->id) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">View</a>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-medium py-1 px-3 rounded">Edit</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-1 px-3 rounded">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#companies').DataTable();
            } );
        </script>
    @endsection
</x-app-layout>
