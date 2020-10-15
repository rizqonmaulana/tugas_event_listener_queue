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
            <form role="form" action="{{ route('blog.store') }}" method="post">
                @csrf
                <h3>Create new post</h3>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title', '') }}" placeholder="Insert title">
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea type="text" class="form-control" id="content" name="content" placeholder="Insert Content">{{ old('content', '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Status</label>
                        <select name="status" class="form-control" placeholder="Choose status">
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
       </div>
   </div>
</body>
</html>
