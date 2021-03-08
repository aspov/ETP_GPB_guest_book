<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div id="app">        
        <div class="container"> 
            <form action="{{ route('store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="email">{{ __('email') }}</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value = "{{ $request->email ?? '' }}">
                </div>
                
                <div class="form-group">
                    <label for="message">{{ __('Message')}}</label>
                    <textarea class="form-control" id="message" name="text" rows="3" value = "{{ $request->text ?? '' }}" ></textarea>
                </div>
                    <button type="submit" class="btn btn-primary mb-2">{{ __('Отправить') }}</button>
            </form>
            @foreach ($messages->sortByDesc('created_at')->all() as $message)                
                <div class="card-group pt-2">
                    <div class="card" style="max-width: 18rem;">                            
                        <div class="card-body" >                                
                            <p class="card-text">{{ $message->email }}</p>      
                        </div>
                    </div>
                    <div class="card">                                
                        <div class="card-body">                        
                            <p class="card-text">{{ $message->text }}</p>
                            <p class="card-text"><small class="text-muted">{{ $message->created_at }}</small></p>
                        </div>
                    </div> 
                </div>
            @endforeach 
        </div> 
        <div class="container pt-2">
        {{ $messages->links() }}
        </div>
    </div>            
</body>
</html>
