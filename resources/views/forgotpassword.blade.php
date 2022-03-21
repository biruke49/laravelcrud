@extends('adminlte')
 @section('content')
    <div style="margin-top:-300px">
    <x-guest-layout >
    <x-jet-authentication-card>
        <x-slot name="logo">
          
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
           
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />
    
        <form action="{{ route('mail', [$admin->id]) }}" method="POST">
       
            @csrf
            
            @if(session('error'))
                <div>
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div>
                {{ session('success') }}
                </div>
            @endif

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$admin->Email}}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

    </div>
    @endsection
    