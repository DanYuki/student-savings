<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-solid">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! This is from blade") }}
                </div>
                <div class="ml-6 mr-6 mb-3">
                    <a href="{{route('student.add')}}" rel="noopener noreferrer" class="btn btn-primary">Add Student</a>
                    <a href="{{route('transaction.add')}}" rel="noopener noreferrer" class="btn btn-primary">Transactions</a>
                    <a href="{{route('student.index')}}" rel="noopener noreferrer" class="btn btn-primary">Show All Students</a>
                    <a href="{{route('student.import')}}" rel="noopener noreferrer" class="btn btn-primary">Import Student Data</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>