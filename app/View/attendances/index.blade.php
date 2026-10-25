<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Attendance Records</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                
                <!-- Summary Card & Filter Form -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="card bg-success text-white px-4 py-2">
                        <h5 class="mb-0">Total Present: {{ $presentCount }}</h5>
                    </div>
                    
                    <form action="{{ route('attendances.index') }}" method="GET" class="d-flex">
                        <input type="date" name="date" class="form-control bg-dark text-white border-secondary me-2" value="{{ $date }}" required>
                        <button type="submit" class="btn btn-secondary">Filter</button>
                    </form>
                </div>

                <!-- Add Attendance Form -->
                <form action="{{ route('attendances.store') }}" method="POST" class="mb-4 bg-dark p-3 rounded border border-secondary">
                    @csrf
                    <input type="hidden" name="attendance_date" value="{{ $date }}">
                    <div class="row">
                        <div class="col">
                            <select name="student_id" class="form-select bg-dark text-white border-secondary" required>
                                <option value="">Select Student...</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->enrollment_no }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="status" class="form-select bg-dark text-white border-secondary" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Leave">Leave</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-100">Mark Attendance</button>
                        </div>
                    </div>
                </form>

                <!-- Attendance Table -->
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                        <tr><th>Student Name</th><th>Enrollment No</th><th>Status</th><th>Date</th></tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $record)
                        <tr>
                            <td>{{ $record->student->name }}</td>
                            <td>{{ $record->student->enrollment_no }}</td>
                            <td>
                                <span class="badge {{ $record->status == 'Present' ? 'bg-success' : ($record->status == 'Absent' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                    {{ $record->status }}
                                </span>
                            </td>
                            <td>{{ $record->attendance_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>