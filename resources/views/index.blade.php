<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Simple crud</h2>
</div>
</div>
</div>
<div class="row" align ="left">
<div class="pull-right">
<a class="btn btn-success" href="{{ route('user.create') }}">New User</a>
  </div>
  </div>

  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{ $message}}</p>
   </div>
@endif

<table class="table table-striped">
<tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th width="280px">Action</th>
</tr>

@foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <a class="btn btn-primary" href="user/edit/{{$user->id}}">Edit</a>
            <a class="btn btn-primary" href="user/delete/{{$user->id}}">Delete</a></td>
   </tr>
   @endforeach 

</table>
</body>
</html>