<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{'KG Ecommerce'}}</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Inter,Segoe UI,Tahoma,Geneva,Verdana,sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:
                radial-gradient(circle at top,#2b2b2b 0%,#18181b 40%,#09090b 100%);
            color:#fff;
        }

        .card{
            width:460px;
            padding:50px;
            border-radius:22px;
            background:rgba(24,24,27,.92);
            border:1px solid rgba(255,255,255,.08);
            box-shadow:0 20px 60px rgba(0,0,0,.55);
            backdrop-filter:blur(10px);
            text-align:center;
        }

        .logo{
            width:90px;
            height:90px;
            margin:0 auto 25px;
            border-radius:22px;
            background:linear-gradient(145deg,#3f3f46,#18181b);
            border:1px solid #52525b;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:42px;
            box-shadow:0 10px 25px rgba(0,0,0,.35);
        }

        h1{
            font-size:34px;
            font-weight:700;
            margin-bottom:10px;
        }

        p{
            color:#a1a1aa;
            line-height:1.7;
            margin-bottom:35px;
        }

        .btn{
            display:block;
            width:100%;
            padding:15px;
            text-decoration:none;
            border-radius:12px;
            font-weight:600;
            transition:.25s;
            margin-bottom:15px;
        }

        .login{
            background:linear-gradient(180deg,#323232,#181818);
            color:#fff;
            border:1px solid #4b5563;
            box-shadow:0 8px 20px rgba(0,0,0,.35);
        }

        .login:hover{
            background:linear-gradient(180deg,#454545,#242424);
            transform:translateY(-2px);
        }

        .register{
            background:transparent;
            color:#fff;
            border:1px solid #3f3f46;
        }

        .register:hover{
            background:#27272a;
        }

        footer{
            margin-top:25px;
            color:#71717a;
            font-size:13px;
        }
    </style>
</head>

<body>

<div class="card">

    <div class="logo">
        🛒
    </div>

    <h1>{{'KG Ecommerce'}}</h1>

    <p>
        Sistema administrativo do seu e-commerce.<br>
        Gerencie produtos, pedidos, clientes e estoque em um único lugar.
    </p>

    <a href="{{ route('login') }}" class="btn login">
        Entrar
    </a>

    @if(Route::has('register'))
        <a href="{{ route('register') }}" class="btn register">
            Criar Conta
        </a>
    @endif

    <footer>
        © {{ date('Y') }} {{ config('app.name') }}
    </footer>

</div>

</body>
</html>