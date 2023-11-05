@extends('components.dashboard')

@section('content')
    <div class="relative p-2 sm:w-sm md:w-xl md:m-auto">
        @if (session()->has('update_bio'))
        <p class="absolute t-0 right-0 font-semibold text-primary px-3 py-1">{{ session('update_bio') }}</p>
        @endif
        @if (session()->has('update_success'))
            <p class="absolute t-0 right-0 font-semibold text-primary px-3 py-1">{{ session('update_success') }}</p>
        @endif
        @if (session()->has('update_failed'))
        <p class="absolute t-0 right-0 font-semibold text-danger px-3 py-1">{{ session('update_failed') }}</p>
        @endif
        <h3 class="mb-4 text-xl font-bold">Update Profile</h3>
        <form action="{{ route('user.update.profile', auth()->user()) }}" method="POST" class="grid grid-cols-1 gap-2">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-2">
                <input type="text" name="name" placeholder="Enter New Name" value="{{auth()->user()->name}}" class="p-2 rounded-md"> 
                @error('name')
                   <p> {{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 gap-2">
                <input type="text" name="username" placeholder="Enter New Username" value="{{auth()->user()->username}}" class="p-2 rounded-md"> 
                @error('username')
                   <p> {{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 gap-2">
                <input type="text" name="avatar" placeholder="Enter Image URL" value="{{auth()->user()->avatar}}" class="p-2 rounded-md"> 
                @error('avatar')
                   <p> {{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="p-2 bg-primary text-white font-bold mt-2 rounded-md">Update Bio</button>
        </form>
        <br />
        <br />
        <h3 class="mb-4 text-xl font-bold">Update Password</h3>
        <form action="{{ route('user.update.password', auth()->user())}}" method="POST" class="grid grid-cols-1 gap-2">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 gap-2">
                <input type="password" name="old_password" id="old_password" placeholder="Enter Old Password" value="{{ old('old_password') }}" class="p-2 rounded-md"/>
                @error('old_password')
                    <p class="text-danger font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 gap-2">
                <input type="password" name="new_password" id="new_password" placeholder="Enter New Password" value="{{ old('new_password') }}" class="p-2 rounded-md"/>
                @error('new_password')
                    <p class="text-danger font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 gap-2">
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Re-Type Password" value="{{ old('new_password_confirmation')}}" class="p-2 rounded-md"/>
                @error('new_password_confirmation')
                    <p class="text-danger font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="p-2 bg-primary text-white font-bold mt-2">Update Password</button>
        </form>

        <div class="border-danger rounded-md border mt-[4em] p-3">
            <h1 class="text-danger text-2xl font-semibold p-2">Delete Account</h1>
            <p class="p-2 text-danger">Are You sure you want to Delete your Account?<br /> Deleting your Account will Remove your data from Our Database</p>
            <form action="#" method="post" class="p-2">
                <button type="submit" class="bg-danger text-white py-2 px-3 font-semibold rounded-md">Delete Account</button>
            </form>
        </div>
    </div>
@endsection