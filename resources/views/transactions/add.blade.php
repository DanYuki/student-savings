<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! This is from blade") }}

                    <form class="w-full max-w-lg mt-3" action="{{route('transaction.store')}}" method="post">
                        @csrf

                        <label for="student_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Student Name</label>
                        <select name="student_id" id="student_id" class="form-control mb-3">
                            @foreach ($students as $student)
                            <option value="{{$student->student_id}}">{{$student->student_name}}</option>

                            @endforeach
                        </select>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                    Type
                                </label>
                                <select name="transaction_type" id="transaction_type" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="Deposit">Deposit</option>
                                    <option value="Withdraw">Withdraw</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                    Amount
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="transaction_amount" name="transaction_amount" type="number" placeholder="Rp. xxxx">
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-1000 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>