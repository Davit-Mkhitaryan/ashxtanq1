<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		body{
			margin:0;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.login{
			width: 300px;
			height: 300px;
			background-color: gray;
			margin: 80px;
			text-align: center;
			border: 10px solid #aed1ae;
    background-color: #421b1b;

		}

		.reg{
			width: 300px;
			min-height: 350px;
			background-color: gray;
			margin: 80px;
			text-align: center;
			border: 10px solid #aed1ae;
    background-color: #421b1b;

		}

		input{

			    padding: 15px;
				margin-bottom: 10px;
		}

		select{
			padding: 10px;
		}
		button{
		    padding: 10px 40px;
		    cursor: pointer;
		}
		.error{
		    color: #ff8181;
    font-weight: bold;
		}
		.success{
		    color: #92ff81;
    font-weight: bold;
		}


	</style>

</head>
<body>

<div class="login">
		<h1 style="color: white;">Login</h1>
		<form action="/login" method="post">
		{{@csrf_field() }}
			
		<input type="text" name="login" placeholder="login" maxlength="12"><br>
		<input type="password" name="password" placeholder="password" maxlength="12"><br>
		<button>Login</button>

		@if(Session::get('error'))
		<p class="error">
			
		{{Session::get('error')}}

		</p>
		@endif

		</form>

</div>

<div class="reg">
		<h1 style="color: white;">Register</h1>
		<form action="/reg" method="post"> 
			{{@csrf_field()}}
			
		<input type="text" name="login" placeholder="login" maxlength="12"><br>
		<input type="password" name="password" placeholder="password" maxlength="12"><br>
		<select name='day'>
			@for($i=1;$i<=31;$i++)
			<option>{{$i}}</option>
			@endfor
		</select><select name='month'>
			<option value="01">Jan</option>
			<option value="02">Feb</option>
			<option value="03">Mar</option>
			<option value="04">Apr</option>
			<option value="05">May</option>
			<option value="06">Jun</option>
			<option value="07">Jul</option>
			<option value="08">Aug</option>
			<option value="09">Sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
		</select><select name='year'>
			@for($i=2021;$i>=1970;$i--)
			<option>{{$i}}</option>
			@endfor
		</select><br><br>
		<button>Register</button>
		@if($errors->has('login'))
		<p class="error">{{$errors->first('login')}}</p>
		@endif
		@if($errors->has('password'))
		<p class="error">{{$errors->first('password')}}</p>
		@endif
		@if(Session::has('success'))
		<p class="success">{{Session::get('success')}}</p>
		@endif
		</form>

</div>

</body>
</html>