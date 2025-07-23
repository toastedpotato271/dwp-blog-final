@extends('layouts.auth')
@section('title', 'login')

@section('content')
    <form action="{{route('register')}}" method="POST" class="bg-white rounded-2xl border border-solid border-gray-500 px-10 py-15"> 
        <h1 class="font-semibold text-green-700 text-2xl">Think Finance!</h1>
        <p class="text-lg mb-4 text-gray-400">Register</p>
        @csrf
        <input type="text" id="name" name="name" placeholder="Full Name" class="border border-solid w-full rounded-xl pl-4 p-2 mb-3"></input>
        <input type="email" id="email" name="email" placeholder="Email address" class="border border-solid w-full rounded-xl pl-4 p-2 mb-3"></input>
        <input type="password" id="password" name="passwrord" placeholder="Password" class="border border-solid w-full rounded-xl pl-4 p-2 mb-3"></input>
        <input type="password" id="pass_confirm" name="pass_confirm" placeholder="Confirm Password" class="border border-solid w-full rounded-xl pl-4 p-2 mb-5"></input>
        <button type="submit" class="bg-green-800 p-2 w-full text-white rounded-xl cursor-pointer">Register</button>
        <a class="text-center text-green-800 block mt-10 text-sm cursor-pointer" href={{ route('login')}}>Already have an account? Login</a>
    </form>
@endsection
