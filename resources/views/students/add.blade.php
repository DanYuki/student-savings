<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mr-6 mb-3 mt-3">
                    <form action="{{route('student.store')}}" method="post" class="form">
                        @csrf
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_name">
                                Name
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="student_name" type="text" placeholder="Student Name" name="student_name">
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_class">
                                Class
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="student_class" type="number" name="student_class" placeholder="Student Class">
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_nisn">
                                NISN
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="student_nisn" type="text" placeholder="Student NISN" name="student_nisn">
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">
                                Date of Birth
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_of_birth" type="date" name="date_of_birth">
                        </div>

                        <label for="student_name" class="block text-gray-700 text-sm font-bold mb-2">Student Gender</label>
                        <select name="student_gender" class="form-control mb-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>