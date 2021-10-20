<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<div class="container" style="padding-top: 5%;">
    <div class="card-body col-md-12">

<div class="row">
 <form action="{{ route('user.update',$user->id) }}" method="POST">
 @csrf 
   <div class="col-md-12"> 

   <div class="form-group">
    <label for="formGroup">Name </label>
      <<input type="text" class="form-control" name="name" value= "{{ $user->name }}" placeholder="Name">
      </div>

      <div class="form-group">
    <label for="formGroup">Email </label>
      <input type="text" class="form-control" name="email" value= "{{ $user->email }}" placeholder="Email">
      </div>
       <br>
      <div class="left">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </div>

      </form>
      </div>

</body>
</html>