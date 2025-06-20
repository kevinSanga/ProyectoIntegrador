<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 20px;
        }

        .login-container {
            background: #ffffff;
            border-radius: 8px;
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-top: 4px solid #c9a96e;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #c9a96e, #d4af37, #c9a96e);
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 25px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: #1e3c72;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            font-weight: bold;
        }

        h2 {
            color: #1e3c72;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .subtitle {
            color: #666;
            font-size: 14px;
            font-style: italic;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .form-group {
            position: relative;
        }

        .form-label {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px 18px;
            border: 2px solid #e1e5e9;
            border-radius: 6px;
            font-size: 16px;
            font-family: 'Times New Roman', serif;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #c9a96e;
            background: white;
            box-shadow: 0 0 0 3px rgba(201, 169, 110, 0.1);
        }

        input::placeholder {
            color: #999;
            font-style: italic;
        }

        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Times New Roman', serif;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .footer-info {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
            color: #666;
            font-size: 12px;
            font-style: italic;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 40px 25px;
            }
            
            h2 {
                font-size: 22px;
            }
            
            .logo {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header-section">
            <div class="logo">⚖</div>
            <h2>Iniciar Sesión</h2>
            <p class="subtitle">Sistema Notarial</p>
        </div>
        
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Usuario</label>
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            
            <button type="submit">Ingresar</button>
        </form>
        
        <div class="footer-info">
            Acceso exclusivo para personal autorizado
        </div>
    </div>
</body>
</html>
