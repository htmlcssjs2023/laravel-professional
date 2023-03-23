<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
             #outer
              {
                  width:100%;
                  display: flex;
                  justify-content: center;
              }
              .inner
              {
                  display: inline-block;
                  margin: 1px;
                  
              }
              /* button{
                background: orangered;
                border: 1px solid transparent;
                border-radius: 6px !important;
                color: #fff;
                padding: 0.375rem 0.75rem;
               
              } */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-3 mt-5">
                <h3>Post Table </h3>
             @if(count($posts) > 0)
                     <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Publish</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ( $posts as $post )
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{Str::limit($post->description, '10', '...')}}</td>
                                <td>{{$post->is_publish == 1 ? 'Yes' : 'No'}}</td>
                                <td>{{$post->is_active == 1 ? 'Yes' : 'No'}}</td>
                                <td id="outer">
                                  <a href="{{ route('posts.show',$post->id)}}" class="btn btn-primary inner"> <i class="fa fa-eye"></i> </a>
                                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary inner"><i class="fa fa-edit"></i></a>
                                    <form class="inner" action="#" >
                                      @csrf
                                      <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                            
                                 </td>
                             </tr>
                            </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <h3 class ="text-center">Not found</h3>
             @endif

             {{-- pagination  --}}

             {{-- {{ $posts->render()}} --}}
             {{ $posts->links()}}
            </div>
        </div>
    </div>   
 
{{-- bootstrap  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>