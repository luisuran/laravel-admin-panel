<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <form method="POST" action="{{ route('companies.store') }}" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-col pb-3">
                            <label for="name" class="mb-2">Company Name</label>
                            <input type="text" name="name" id="name" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <small class="text-red-500">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="email" class="mb-2">Company Email</label>
                            <input type="text" name="email" id="email" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <small class="text-red-500">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="website" class="mb-2">Company Website</label>
                            <input type="text" name="website" id="website" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('website') }}">
                            @if ($errors->has('website'))
                                <small class="text-red-500">{{ $errors->first('website') }}</small>
                            @endif
                        </div>
                        <div class="flex flex-col pb-3">
                            <label for="logo" class="mb-2">Company Logo</label>
                            <input type="file" name="logo" id="logo" class="border-2 border-gray-300 p-2 rounded-lg" value="{{ old('logo') }}">
                            @if ($errors->has('logo'))
                                <small class="text-red-500">{{ $errors->first('logo') }}</small>
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
