@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Contact Submissions</h1>
                <p class="text-gray-600 mt-2">Manage and view all contact form submissions</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                ← Back to Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Submissions Table -->
        @if($submissions->count())
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Subject</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Phone</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($submissions as $submission)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <span class="font-medium">{{ $submission->first_name }} {{ $submission->last_name }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <a href="mailto:{{ $submission->email }}" class="text-emerald-600 hover:text-emerald-700">
                                            {{ $submission->email }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $submission->subject }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        @if($submission->phone)
                                            <a href="tel:{{ $submission->phone }}" class="text-emerald-600 hover:text-emerald-700">
                                                {{ $submission->phone }}
                                            </a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $submission->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.contact-submissions.show', $submission) }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                                                View
                                            </a>
                                            <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-6 py-4 border-t border-gray-200">
                    {{ $submissions->links() }}
                </div>
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <div class="text-gray-400 text-6xl mb-4">📭</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Submissions Yet</h3>
                <p class="text-gray-600">There are no contact submissions to display.</p>
            </div>
        @endif
    </div>
</div>
@endsection
