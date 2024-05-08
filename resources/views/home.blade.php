<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Successfully Registered</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <div>
            <h2>Create New Post</h2>
            <form action="/create-post" method='POST'>
                @csrf
                <input name="title" type="text" placeholder="title">
                <textarea name="body" placeholder="body"></textarea>
                <button>Create Post</button>
            </form>
        </div>
        <div>
            <h2>All Posts</h2>
                @foreach($posts as $post)
                    <div>{{$post['title']}} by {{$post->userName->name}}</div>
                    {{$post['body']}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                @endforeach
        </div>
    @else
    <div>
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
    <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth
    
</body>
</html>