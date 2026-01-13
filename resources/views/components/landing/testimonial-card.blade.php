{{-- Testimonial Card Component --}}
@props([
    'quote' => '',
    'author' => '',
    'role' => '',
    'company' => '',
    'avatar' => null,
    'rating' => 5,
])

<article {{ $attributes->merge(['class' => 'bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100']) }}>
    {{-- Rating Stars --}}
    <div class="flex items-center space-x-1 mb-6">
        @for($i = 1; $i <= 5; $i++)
            <svg class="w-5 h-5 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
        @endfor
        <span class="sr-only">{{ $rating }} out of 5 stars</span>
    </div>

    {{-- Quote --}}
    <blockquote class="text-gray-700 text-lg leading-relaxed mb-6">
        <svg class="w-8 h-8 text-emerald-200 mb-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
        </svg>
        "{{ $quote }}"
    </blockquote>

    {{-- Author Info --}}
    <div class="flex items-center">
        @if($avatar)
            <img src="{{ $avatar }}" alt="{{ $author }}" class="w-12 h-12 rounded-full object-cover mr-4">
        @else
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center mr-4">
                <span class="text-white font-bold text-lg">{{ strtoupper(substr($author, 0, 1)) }}</span>
            </div>
        @endif
        <div>
            <cite class="text-gray-900 font-semibold not-italic">{{ $author }}</cite>
            <p class="text-gray-500 text-sm">
                {{ $role }}
                @if($company)
                    <span class="text-emerald-600">@ {{ $company }}</span>
                @endif
            </p>
        </div>
    </div>
</article>
