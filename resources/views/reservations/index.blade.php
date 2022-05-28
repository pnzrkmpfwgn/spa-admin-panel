<head>
        <style>
                .container {
                    font-family: arial;
                    font-size: 24px;
                    margin: 25px;
                    width: 600px;
                    height: 200px;
                    /* Setup */
                    position: relative;
            }
                .child {
                    width: 50px;
                    height: 50px;
                    /* Center vertically and horizontally */
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    margin: -25px 0 0 -25px; /* Apply negative top and left margins to truly center the element */
            }
        </style>
 </head>   
    @if(auth()->user())
    <form action="{{route('logout')}}" method="post" class="p-3 inline" >
        @csrf
        <button type="submit">Logout</button>
    </form>
    @else
        
        <form action="/" method="POST">
            @csrf
                <div class="container">
                <div class="child">
                    @if (session('status'))
                    <div>{{session('status')}}</div>
                @endif
                    <h3> Admin Login </h3>      
                <label for="email">Email</label>
                <input required type="email" name="email" placeholder="Email here..." >
                <br>
                <br>
                <label for="password">Password</label>
                <input required type="password" name="password" placeholder="Password here...">
                <br>
                <br>
                <button type="submit" > Login </button>
                </div>
            </div>
        </form>
@endif