<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
   <div class="card">
       <div class="card-body">
            <h4>{{ $post->title }}</h4>
            <span> Author : {{ $post->user->name }} </span>
            |
            <span>Status :
                {{ $post->status? 'Published' : 'Unpublished' }}
            </span>
            <br><br>
            <p> {{ $post->content }} </p>
       </div>
   </div>
</body>
</html>
