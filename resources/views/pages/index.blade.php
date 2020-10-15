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
        <a href="{{ route('blog.create')}}" class="btn btn-primary mb-3">Create a new post</a>
           <table class="table table-bordered">
               <thead>
                   <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Actions</th>
                   </tr>
               </thead>
           <tbody>
               @forelse ($blog as $key => $post)
                <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->content }} </td>
                    <td> {{ $post->user->name }} </td>
                    <td> @if ( $post->status == 0)
                            Unpublished
                        @else
                            Published
                        @endif
                </td>
                    <td  style="display: flex;">
                        <a href="{{ route('blog.show', ['blog' => $post->id]) }}" class="btn btn-info btn-sm mr-1">show</a>
                        <a href="{{ route('blog.edit', ['blog' => $post->id]) }}" class="btn btn-warning btn-sm mr-1">edit</a>
                        <form action=" {{ route('blog.destroy', ['blog' => $post->id]) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="delete">
                        </form>
                    </td>
                </tr>
               @empty
                <tr>
                    <td colspan="4" align="center"> No Data </td>
                </tr>

               @endforelse
           </tbody>
        </table>
       </div>
   </div>
</body>
</html>
