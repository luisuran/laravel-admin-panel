<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-6">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold">{{ $company->name }}</h2>
                            <p class="text-gray-800 font-medium mt-2">Email:</p>
                            <p class="text-gray-600">{{ $company->email }}</p>
                            <p class="text-gray-800 font-medium mt-2">Website:</p>
                            <p class="text-gray-600">{{ $company->website }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <img class="w-32 h-32 object-cover" src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/default_logo.png') }}" alt="Company Logo">
                        </div>
                    </div>
                </div>
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
