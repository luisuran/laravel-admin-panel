<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <form method="POST" action="{{ route('employees.store') }}" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-col pb-3">
                            <label for="first_name" class="mb-2">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('first_name') }}">
                            @if ($errors->has('first_name'))
                                <small class="text-red-500">{{ $errors->first('first_name') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="last_name" class="mb-2">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <small class="text-red-500">{{ $errors->first('last_name') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="company_id" class="mb-2">Company</label>
                            <select name="company_id" id="company_id" class="border-2 border-gray-300 p-2 rounded-lg">
                                <option value="">Select a company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('company_id'))
                                <small class="text-red-500">{{ $errors->first('company_id') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="email" class="mb-2">Email</label>
                            <input type="text" name="email" id="email" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <small class="text-red-500">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="phone" class="mb-2">Phone</label>
                            <input type="text" name="phone" id="phone" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <small class="text-red-500">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-1 px-3 rounded">Save</button>
                        </div>
                    </div>
                </form>
                <div class="bg-white-50 p-6 border-t border-white-200">
                    <div class="flex items-center space-x-6">
                        <a href="javascript:history.back()" class="inline-block px-4 py-2 font-medium text-sm leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                            Go back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
