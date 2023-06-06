<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-solid">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mr-6 mb-3">
                    <table class="table table-dark">
                        <thead>
                            <th>No.</th>
                            <th>Student Name</th>
                            <th>Student Class</th>
                            <th>Student NISN</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Saving Balance</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student->student_name}}</td>
                                <td>{{$student->student_class}}</td>
                                <td>{{$student->student_nisn}}</td>
                                <td>{{$student->date_of_birth}}</td>
                                <td>{{$student->student_gender}}</td>
                                <td>@convertRp($student->saving_balance)</td>
                                <td><a href="{{route('student.show', $student->student_id)}}" class="btn btn-light">Transaction History >></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>