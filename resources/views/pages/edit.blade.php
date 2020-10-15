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
            <form role="form" action="{{ route('blog.update', ['blog' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')
                <h3>Edit post</h3>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Insert title">
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea type="text" class="form-control" id="content" name="content" placeholder="Insert Content">{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Status</label>
                        <select name="status" class="form-control" placeholder="Choose status">
                            @if ($post->status == 0)
                                <option value="0" selected>Unpublished</option>
                                <option value="1">Published</option>
                            @else
                                <option value="0">Unpublished</option>
                                <option value="1" selected>Published</option>
                            @endif

                        </select>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
            </form>
       </div>
   </div>
</body>
</html>
