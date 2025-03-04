<!-- login.html -->
<style>
  html,
  body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
    padding: 20px;
  }

  .form-signin {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .form-signin img {
    width: 80px;
    height: 60px;
    margin-bottom: 20px;
  }

  .form-signin h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
  }

  .form-floating {
    margin-bottom: 15px;
  }

  .form-floating input {
    border-radius: 5px;
    padding: 12px 15px;
    font-size: 16px;
    width: 100%;
    border: 1px solid #ccc;
  }

  .form-floating label {
    font-size: 14px;
    color: #555;
  }

  .form-signin button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
  }

  .form-signin button:hover {
    background-color: #0056b3;
  }

  .checkbox {
    margin-bottom: 20px;
    font-size: 14px;
    color: #555;
  }

  .checkbox input {
    margin-right: 5px;
  }
</style>

<form class="form-signin" method="POST" action="login.php">
  <img src="images/joyland_logo.png" alt="Joyland Church">
  <h1>Please sign in</h1>

  <div class="form-floating">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required> 
  </div>

  <div class="form-floating">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>

  <button class="btn btn-primary" type="submit">Log in</button>
</form>
