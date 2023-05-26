<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">

        <a href="{{route('posts.create')}}" class="btn btn-success mb5">Cadastrar novo artigos</a>
        <a href="{{route('posts.index')}}" class="btn btn-success mb5">Ver Todos</a>
        

        <?php 
            if(!empty($posts)){       
        ?>
        <section class="articles_list">

            <?php 
                foreach($posts as $post){                    
            ?>

            <article class="mb-5">
            <h1>{{$post->title}}</h1>
            <h2>{{$post->subtitle}}</h2>
            <p>{{$post->description}}</p>
            <small>Criado em: {{ date('d/m/y', strtotime($post->update_at))}} - Editado em: </small>
           <form action="{{ route('posts.forceDelete', $post->id)}}" method="POST" class="mt-3">
            @csrf
            @method ('DELETE')
            <a href="{{ route('posts.restore', $post->id )}}" class="btn btn-primary">Restaurar</a>
            <button type="submit" class="btn btn-danger">Excluir</button>
           </form>
            </article>
            <hr>
            <?php 
            }
            ?>            
        </section>
        <?php 
            }
        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>