@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">Update Password</h1>
        @if (session('status'))
            <span class="valid-feedback" role="alert">
                <strong>{{ session('status') }}</strong>
            </span>
        @endif
        <form action="{{ route('user.updatePwd') }}" method="POST">
            @csrf
            <h4 class="SmallGap">Current Password</h4>
            <input type="password" name="current_password" placeholder="enter your current password" id=""
                class="field">
            @if (session('current_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ session('current_password')}}</strong>
                </span>
            @endif
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <h4 class="SmallGap">New Password</h4>
            <input type="password" name="password" placeholder="enter your new password" id="" class="field">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <h4 class="SmallGap">Confirm Password</h4>
            <input type="password" name="password_confirmation" placeholder="re-enter new password" id=""
                class="field">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="flex SmallGap">
                <input type="hidden" name="id" value="{{Auth::id()}}">
                <button class="btn" type="submit">Update Password</button>
            </div>

        </form>
    </div>


</section>

@include('layouts.footer')
