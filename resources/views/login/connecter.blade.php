<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Gestion Coopératives | Login</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .split-container {
      display: flex;
      height: 12cm;
      width: 30cm;
      position: absolute; left: 10%;top: 18%;/* 100% de la hauteur de la fenêtre */
    }

    .left-panel {
      flex: 1;
      background-color: #aab9b8;
      border-radius: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-size: 2rem;
      font-weight: bold;
    }
    .left-panel img {
      background-color: transparent;
    }

    .right-panel {
      flex: 1;
      border-radius: 50px;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: -200px;
    }

    form {
      background-color: #e6e6e6;
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .custom-input {
      border: solid black 1px;
      height: 35px;
      border-radius: 1rem;
      width: 100%;
      padding-left: 15px;
      background: transparent;
      margin-top: 5px;
      margin-bottom: 10px;
    }

    button {
      border-radius: 10px;
      height: 45px;
      width: 100%;
      margin-top: 20px;
      font-weight: 600;
      font-size: 17px;
      color: #00ff7f;
    }

    label {
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="split-container">
    <div class="left-panel">
        <img src="{{ asset('images/conseil.png') }}" alt="" style="max-width: 80%; height: auto; margin-right: 150px;">
      </div>
      
    <div class="right-panel">
      <form action="{{ route('login.verification') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="Log">Login</label>
          <input type="text" name="Log" id="Log" class="form-control custom-input" required>
        </div>
        <div class="form-group">
          <label for="Pass">Mot de passe</label>
          <input type="password" name="Pass" id="Pass" class="form-control custom-input" required>
          @error('Log')
          <div class="text-danger" style="margin-left: 55px;">{{$message}}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">Se connecter</button>
      </form>
    </div>
  </div>

</body>
</html>
