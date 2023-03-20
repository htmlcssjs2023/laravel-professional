<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
           
            <div class="col-md-6 mt-5 offset-3 ">
                <h2 class="text-center">Create Post</h2>
                <form style="margin-top: 30px" method="POST" action="{{ route('posts.store')}}">
                  @csrf
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Title here" required>
                    </div>
                    <div class="mb-3">
                      <label for="title" class="form-label">Description</label>
                      <textarea class="form-control" placeholder="Write your message here" name="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Publish</label>
                        <select class="form-select" name="is_publish" required>
                            <option value="" selected disabled>Choose Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                      </div>

                      <div class="mb-3">
                        <label>Active</label>
                        <select class="form-select" name="is_active" value=" " required>
                            <option value="" selected disabled>Choose Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                      </div>
                   
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
       
        {{-- <a href="/test-02" class="btn btn-danger">Go</a> --}}
        {{-- <a href="{{ url('/test-01') }}" class="btn btn-danger">Go</a> --}}

        {{-- <a href="{{ route('test.1') }}" class="btn btn-danger">Go</a> --}}
    </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>