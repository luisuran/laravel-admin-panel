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
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $('#companies').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('companies.data-table') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'website', name: 'website' },
                        { data: 'logo', name: 'logo', render: function(data, type, full, meta) {
                            return "<img src='storage/" + data + "' alt=\"No Logo\" width=\"50\" height=\"50\">";
                        }
                        },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            } );
        </script>
    @endsection
</x-app-layout>
