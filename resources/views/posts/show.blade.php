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
                <h3>Post</h3>
                @if($post)
                <span><b>Title : </b>{{$post->title}}</span><br>
                <span><b>Description : </b>{{$post->description}}</span><br>
                <span><b>Publish : </b>{{$post->is_publish == 1 ? 'Yes' : 'No'}}</span><br>
                <span><b>Active : </b>{{$post->is_active == 1 ? 'Yes' : 'No'}}</span><br>
                @endif
            
            </div>
        </div>
    </div>   
 
{{-- bootstrap  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>