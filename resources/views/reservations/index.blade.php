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
            
            .grid{
                display: grid;
                grid-template-columns: repeat(6,1fr);
                border-top:1px solid black;
                border-right:1px solid black;
                margin-top:50px;
            }

            .grid > span {
                padding:8px 4px;
                border-left:1px solid black;
                border-bottom:1px solid black;
            }
        </style>
 </head>   
 <div>
     <h1>Bookings</h1>
 </div>

    @if(auth()->user())
    <form action="">
        <input type="text" placeholder="Search" >
    </form>
   <div>
       <div class="grid" >
           <span>
               <strong>Name Surname</strong>
           </span>
           <span>
               <strong>Service</strong>
           </span>
           <span>
               <strong>Persons</strong>
           </span>
           <span>
               <strong>Date</strong>
           </span>
           <span>
               <strong>Period</strong>
           </span>
           <span>
            <strong>Status</strong>
           </span>

       
        @if($reservations->count())
        {{-- {{dd($reservations);}} --}}
            @foreach ($reservations as $reservation)
                <span>{{$reservation->name_surname}}</span>
                <span>{{$reservation->service}}</span>
                <span>{{$reservation->persons}}</span>
                <span>{{$reservation->date}}</span>
                <span>{{$reservation->period}}</span>
                <span>{{$reservation->status}}</span>
            @endforeach
        @else
        <div> There are no bookings </div>
    @endif
</div>
   </div>
    <form action="{{route('logout')}}" method="post" class="p-3 inline" >
        @csrf
        <button style="position: absolute;top:0;right:0;margin:10px" type="submit">Logout</button>
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