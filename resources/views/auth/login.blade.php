
<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Log In</button>
        </form>

        <!-- <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ route('login') }}">Sign up</a></p>
        </div> -->
    </div>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .login-container {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #fafafa;
    }

    .login-box {
        width: 300px;
        padding: 30px;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-box h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #0095f6;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0077cc;
    }
</style>