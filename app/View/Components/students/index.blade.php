<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Student Management</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Bootstrap 5 CDN -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <!-- Add Student Form -->
                <form action="{{ route('students.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col"><input type="text" name="name" class="form-control bg-dark text-white border-secondary" placeholder="Student Name" required></div>
                        <div class="col"><input type="text" name="enrollment_no" class="form-control bg-dark text-white border-secondary" placeholder="Enrollment No" required></div>
                        <div class="col"><input type="text" name="branch" class="form-control bg-dark text-white border-secondary" placeholder="Branch" required></div>
                        <div class="col"><button type="submit" class="btn btn-primary w-100">Add Student</button></div>
                    </div>
                </form>

                <!-- Students Table -->
                <table class="table table-dark table-striped table-bordered mt-4">
                    <thead>
                        <tr><th>ID</th><th>Name</th><th>Enrollment No</th><th>Branch</th></tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->enrollment_no }}</td>
                            <td>{{ $student->branch }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>