<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5">
                <h3>Post Table </h3>
                @if(count($posts) > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Active</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ( $posts as $post )
                      <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->is_publish}}</td>
                        <td>{{$post->is_active}}</td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <h3 class ="text-center">Not found</h3>
                  @endif
            </div>
        </div>
    </div>   
 
{{-- bootstrap  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>