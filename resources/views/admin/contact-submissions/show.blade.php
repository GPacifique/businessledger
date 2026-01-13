@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900">View Submission</h1>
            <a href="{{ route('admin.contact-submissions.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                ← Back to List
            </a>
        </div>

        <!-- Submission Details -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Personal Information -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-emerald-500">Personal Information</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                        <p class="text-lg text-gray-900">{{ $contactSubmission->first_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                        <p class="text-lg text-gray-900">{{ $contactSubmission->last_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <a href="mailto:{{ $contactSubmission->email }}" class="text-lg text-emerald-600 hover:text-emerald-700">
                            {{ $contactSubmission->email }}
                        </a>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        @if($contactSubmission->phone)
                            <a href="tel:{{ $contactSubmission->phone }}" class="text-lg text-emerald-600 hover:text-emerald-700">
                                {{ $contactSubmission->phone }}
                            </a>
                        @else
                            <p class="text-lg text-gray-500">Not provided</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-emerald-500">Message</h2>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                    <p class="text-lg text-gray-900 mb-6">{{ $contactSubmission->subject }}</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Message Content</label>
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <p class="text-gray-900 whitespace-pre-line">{{ $contactSubmission->message }}</p>
                    </div>
                </div>
            </div>

            <!-- Metadata -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-emerald-500">Submission Details</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Submitted On</label>
                        <p class="text-lg text-gray-900">{{ $contactSubmission->created_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Updated</label>
                        <p class="text-lg text-gray-900">{{ $contactSubmission->updated_at->format('F d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-8 border-t border-gray-200">
                <a href="mailto:{{ $contactSubmission->email }}" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700 transition-colors">
                    ✉️ Reply via Email
                </a>
                <form action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors">
                        🗑️ Delete Submission
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
