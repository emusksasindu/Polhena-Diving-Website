@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">User Profile</h1>
        @if (session('status'))
            <span class="valid-feedback" role="alert">
                <strong>{{ session('status') }}</strong>
            </span>
        @endif
        <form action="{{ route('user.updateInfo') }}" method="POST">
            @csrf
            <h4>Name</h4>
            <input type="text" name="name" value='{{ Auth::user()->name }}' placeholder="enter your name"
                id="" class="field">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <h4>Email</h4>
            <input type="email" name="email" value='{{ Auth::user()->email }}' placeholder="enter your email"
                id="" class="field">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="flex SmallGap">
                <input type="hidden" name="id" value="{{ Auth::id() }}">
                <button type="submit" class="btn">Edit</button>
                <a href='/editpassword' class="btn">Change Password</a>
            </div>

        </form>
    </div>


</section>

@include('layouts.footer')
