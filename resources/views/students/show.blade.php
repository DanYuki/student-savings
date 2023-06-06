<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($student->student_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-solid">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mr-6 mb-3">
                    <table class="table table-dark">
                        <thead>
                            <th>No.</th>
                            <th>Transaction Type</th>
                            <th>Transaction Amount</th>
                            <th>Transaction Date</th>
                        </thead>
                        <tbody>
                            @foreach ($transaction_lists as $transaction)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaction->transaction_type}}</td>
                                <td>@convertRp($transaction->transaction_amount)</td>
                                <td>{{$transaction->transaction_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>