<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{{ URL::asset('http://code.jquery.com/jquery-3.1.1.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('https://unpkg.com/react@16/umd/react.production.min.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('https://unpkg.com/react-dom@16/umd/react-dom.production.min.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('https://unpkg.com/babel-standalone@6.15.0/babel.min.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('js/forms.js') }}" type="text/javascript" ></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<span class="nav-css"onclick="openNav()">&#9776; Menu</span>
<div class="header">
<h1 id="heading1">Furniture Store</h1>
<p id="heading1Para">This is a Furniture Store @if(auth()->check()) || Welcome:  {{ auth()->user()->name }} @endif</p>
</div>

{{-- logout display for while the user is logged in --}}

@if(auth()->check()) 
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="padding: 2px 0px 0px 0px; background-color: #3D0814;">&#9776;</a>
  <hr><a href="/">Home</a>
  <a href="/logout">Logout</a>
</div>
@endif

{{-- display for when the user isn't logged in --}}

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="padding: 2px 0px 0px 0px; background-color: #3D0814;">&#9776;</a>
    <hr><a href="/">Home</a>
    <a href="#" onClick='openForm()'>Signup</a>
    <a href="#" onClick='openForm2()'>Login</a>

    {{-- This is the signup form // displays within the nav bar reactForm.js is the react form --}}

    <div id="root"></div>
    <button type="button" class="btn cancel" id="hidebutton" onclick="closeForm()">Close</button>
    <script src="{{ URL::asset('js/reactForm.js') }}" type="text/babel" ></script>
    {{-- this is the login form// also displays within the nav bar --}}
    
      <div id="loginFormRoot">
      <form action="{{ url('/login') }}" class="form-container" method="post">
              {{ csrf_field() }}
              <div class="phone-container">
            <label for="email"> Email:</label>
            <input type="text" name="email" class="signInput" placeholder="Enter Email">
          </div>
          <div class="password-container">
            <label for="password"> Password:</label>
            <input type="password" name="password" class="signInput" placeholder="Enter Password">
          </div>
            <button type="button" class="btn cancel" id="hidebutton2" onclick="closeForm2()">Close</button>
            <input type="submit" class="signinbtn" name="login" value="LOGIN"> <br>
          </form>
      </div>
  </div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px"; //displays the navigation bar when the button is pressed
  document.getElementById("mySidenav").style.borderRight = "solid white"; //gives the navigation bar a white border on the right
//  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  document.getElementById("heading1").style.color = "rgba(0,0,0,0.4)";
  document.getElementById("heading1Para").style.color = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0"; //hides the navigation bar when the button is clicked
  document.getElementById("mySidenav").style.borderRight = "none"; //removes the border when closing the bar so that it isn't displayed when the nav bar isn't being viewed.
//  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#D3D3D3";
  document.getElementById("heading1").style.color = "#DDD1C7";
  document.getElementById("heading1Para").style.color = "#DDD1C7";
}

</script>

</body>
</html>
