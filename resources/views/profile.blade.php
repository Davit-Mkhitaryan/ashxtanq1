<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name='csrf-token' content="{{csrf_token()}}"> 

	<style type="text/css">
		body{
			margin: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 1000px;

		}
		.container{
			width: 500px;
			height: 700px;
			/*background-color: gray;*/
			overflow-y: auto;
			    background-color: #421b1b;
		}

		.me{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			border:2px solid white;
		}

		.header{
			text-align: center;
		}
		.users{
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border:2px solid white;
		}

		.blocks{
			display: inline-block;
			    margin: 25px;
			text-align: center;
		}

		.logins{
			font-size: 20px;
    font-weight: 900;
    color: #53b83c; font-size: 18px;
        margin: 5px 0px;
		}


		.points{
			    /*background: #76ff00;*/
			    background-color: green;
			width: 100px;
			padding: 10px;
			border-radius: 10px;
			display: inline-block;
			    margin-top: 5px;
			    cursor: pointer;
		}


.points:hover{

   background: #76ff00;
}

.receivePs {
    color: lime;
    font-size: 28px;
    position: relative;
    width: 400px;
    /* height: 80px; */
    padding: 15px;
    border-radius: 48px;
    background-color: darkgreen;
    margin: auto;
    margin-top: 25px;
    text-align: center;
}
.close {
    position: absolute;
    width: 30px;
    height: 30px;
    right: 0px;
    top: 0px;
    color: white;
    background-color: red;
    border-radius: 50%;
    text-align: center;
    cursor: pointer;
    display: inline-block;
}


	</style>
	
</head>
<body>


<div class="container">
	@if(Session::has('birthday'))
	<p class="receivePs">{{Session::get('birthday')}}
		<span class="close">X</span>
	</p>
	@endif
	@if(Session::has('Points'))
	<p class="receivePs">{{Session::get('Points')}}
		<span class="close">X</span>
	</p>
	@endif
	<h1 align="center" style="color: blanchedalmond;    margin-bottom: 5px;">
	Me
</h1>
	<div class="header">
	<p class="points">
		My Points: <span class="myvalue">{{$me->points}}</span>
	</p><br>	
	<img src="{{URL::asset('img/user.png')}}" class="me"><br>
	<p class="logins">
	{{$me->login}}
		
	</p>

	</div>


<h1 align="center" style="color: blanchedalmond">
	Users
</h1>
	<div style="text-align: center;">
@foreach($users as $user)
		
	<div class="blocks">
		
	<img src="{{URL::asset('img/user.png')}}" class="users">

<p class="logins">{{$user->login}}</p>
<p class="points sendP" data-id='{{$user->id}}'>
		User's Points: <span class="uservalue">{{$user->points}}</span>
	</p>
	</div>

@endforeach
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/ajax.js')}}"></script>
</body>
</html>

