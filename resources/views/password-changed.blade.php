@extends('layouts.master')

@section('title', 'Tenants Management')

@section('content')
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
}

.logo {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    align-items: center;
}

.logo img {
    height: 30px;
    margin-right: 8px;
}

.illustration {
    margin-bottom: 20px;
}

.illustration img {
    width: auto;
}

h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 8px;
}

p {
    font-size: 14px;
    color: #666;
    margin-bottom: 25px;
}

.btn {
    background-color: #151926;
    color: white;
    padding: 12px 28px;
    font-size: 14px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #151926;
}

.footer {
    position: absolute;
    bottom: 20px;
    left: 20px;
    font-size: 12px;
    color: #999;
}

.footer a {
    color: #999;
    text-decoration: none;
    margin-left: 10px;
}

@media (max-width: 600px) {
    h2 {
        font-size: 20px;
    }

    .btn {
        padding: 10px 22px;
        font-size: 13px;
    }
}
</style>
<div class="illustration">
    <img src="assets/img/logo/change.gif" alt="Key Icon" />
</div>

<h2>Password changed!</h2>
<p>You’ve Successfully Completed Your Password Reset!</p>

<button class="btn" onclick="window.location.href='login.php'">Log in Now</button>



@endsection