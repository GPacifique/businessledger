{{-- Finance Tracking System Navbar Component --}}

<header
    x-data="{
        mobileMenuOpen:false,
        scrolled:false
    }"

    x-init="
        window.addEventListener('scroll',()=>{
            scrolled = window.scrollY > 50
        })
    "

    :class="scrolled 
    ? 'bg-white/95 backdrop-blur-lg shadow-lg' 
    : 'bg-transparent'"

    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>


<nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


<div class="flex items-center justify-between h-20">


<!-- LOGO -->

<a href="{{url('/')}}" class="flex items-center space-x-3">


<img 
src="{{asset('images/logo.png')}}"
class="w-12 h-12 rounded-xl object-cover"
>


<div>

<span 
:class="scrolled?'text-gray-900':'text-white'"
class="text-xl font-bold">

FinTrack

</span>


<p
:class="scrolled?'text-emerald-600':'text-emerald-200'"
class="text-xs">

Finance Management System

</p>


</div>


</a>




<!-- DESKTOP MENU -->


<div class="hidden lg:flex items-center space-x-2">


@php

$navLinks=[

[
'href'=>route('home'),
'label'=>'Home'
],

[
'href'=>route('dashboard'),
'label'=>'Dashboard'
],

[
'href'=>route('transactions.index'),
'label'=>'Transactions'
],

[
'href'=>route('income.index'),
'label'=>'Income'
],

[
'href'=>route('expenses.index'),
'label'=>'Expenses'
],


[
'href'=>route('reports.index'),
'label'=>'Reports'
],

[
'href'=>route('contact'),
'label'=>'Contact'
],

];

@endphp



@foreach($navLinks as $link)


<a

href="{{$link['href']}}"

:class="scrolled 
?'text-gray-700 hover:text-emerald-600'
:'text-white hover:text-white'"

class="px-4 py-2 rounded-lg text-sm font-medium transition">


{{$link['label']}}


</a>


@endforeach



</div>





<!-- BUTTONS -->


<div class="hidden lg:flex items-center space-x-3">


@if(Route::has('login'))


@auth


<a

href="/dashboard"

class="px-5 py-2.5 rounded-xl
bg-emerald-600
text-white
font-semibold
hover:bg-emerald-700">


Open Dashboard


</a>



@else


<a

href="{{route('login')}}"

class="font-semibold">


Login


</a>



<a

href="{{route('register')}}"

class="px-5 py-2.5 rounded-xl
bg-emerald-600
text-white
font-semibold">

Start Free

</a>



@endauth


@endif



</div>





<!-- MOBILE BUTTON -->


<button

@click="mobileMenuOpen=!mobileMenuOpen"

class="lg:hidden text-white">


<svg class="w-7 h-7"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4 6h16M4 12h16M4 18h16"/>

</svg>


</button>



</div>





<!-- MOBILE MENU -->


<div

x-show="mobileMenuOpen"

x-cloak

class="lg:hidden bg-white shadow-xl rounded-xl mt-2 p-5">


@foreach($navLinks as $link)


<a

href="{{$link['href']}}"

class="block py-3 text-gray-700 hover:text-emerald-600">

{{$link['label']}}

</a>


@endforeach



<a

href="{{route('register')}}"

class="block text-center mt-4 bg-emerald-600 text-white py-3 rounded-xl">


Create Account


</a>



</div>



</nav>


</header>