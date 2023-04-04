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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    {{-- Notification  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      toastr.options = {
              "closeButton": true,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-bottom-center",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

  </script>
    

  </head>
  <body>
    <div class="container">

        <div class="row">
            <div class="col-md-7 offset-3 mt-5">
                <h3 class="text-center">View Post </h3>
                <a class="btn btn-info mb-3" href="{{ route('posts.create') }}"> Create Post</a>
             @if(count($posts) > 0)
                     <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
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
                              {{-- @dd($post->image); --}}

                                <td><img src="{{ $post->image->name }}" alt="" style="width:50px; height:auto"></td>
                                <td>{{$post->title}}</td>
                                <td>{{Str::limit($post->description, '10', '...')}}</td>
                                <td>{{$post->is_publish == 1 ? 'Yes' : 'No'}}</td>
                                <td>{{$post->is_active == 1 ? 'Yes' : 'No'}}</td>
                                <td id="outer">
                                  <a href="{{ route('posts.show',$post->slug)}}" class="btn btn-primary inner"> <i class="fa fa-eye"></i> </a>
                                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary inner"><i class="fa fa-edit"></i></a>
                                    <form class="inner" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                      
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @if ($post->trashed())
                                      <a href="{{ route('posts.soft-delete', $post->id) }}" class="btn btn-success inner"><i class="fa fa-undo"></i></a>
                                    
                                    @endif
                            
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
     <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

   
     <script>
      @if(Session::has('alert-danger'))
        toastr["warning"]("{{ Session::get('alert-danger') }}");
      @endif

      @if(Session::has('alert-message'))
        toastr["info"]("{{ Session::get('alert-message') }}");
      @endif


     
     
     </script>
  </body>
</html>