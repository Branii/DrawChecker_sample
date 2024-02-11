<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- displays site properly based on user's device -->

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="clean.css">
  <title>Settings</title>

  <style>
    .attribution {
      font-size: 11px;
      text-align: center;
    }

    .attribution a {
      color: hsl(228, 45%, 44%);
    }
  </style>
</head>

<body>
  <div class="container">

    <div class="app">
      <div class="header">
        <h2><span class="title">Checker Settings</span></h2>
        <p>Enzerhub Devs.TM</p>
      </div>
      <div class="body">
        <div class="notification unreaded">
          <div class="avatar"><i class='bx bx-reset' style='color:#1c1e1f;font-size:30px;' ></i></div>
          <div class="text">
          <div class="text-topv" style="display: flex; justify-content: space-between;">
              <p><span class="profil-name">Restart all services</span></p>
              <label class="cl-switch ios">
                  <input type="checkbox" disabled>
                  <span class="switcher"></span>
              </label>
          </div>
          </div>
        </div>
        <div class="notification unreaded">
          <div class="avatar"><i class='bx bx-cog' style='color:#1c1e1f;font-size:30px;' ></i></div>
          <div class="text">
          <div class="text-topv" style="display: flex; justify-content: space-between;">
              <p><span class="profil-name">Start Checkers</span></p>
              <label class="cl-switch ios">
                  <input type="checkbox" id="checker">
                  <span class="switcher"></span>
              </label>
          </div>
          </div>
        </div>
        <div class="notification unreaded">
          <div class="avatar"><i class='bx bx-cog' style='color:#1c1e1f;font-size:30px;' ></i></div>
          <div class="text">
          <div class="text-topv" style="display: flex; justify-content: space-between;">
              <p><span class="profil-name">Start Workers</span></p>
              <label class="cl-switch ios">
                  <input type="checkbox" id="worker">
                  <span class="switcher"></span>
              </label>
          </div>
          </div>
        </div>
        <div class="notification unreaded">
          <div class="avatar"><i class='bx bx-stop-circle' style='color:#1c1e1f;font-size:30px;' ></i></div>
          <div class="text">
          <div class="text-topv" style="display: flex; justify-content: space-between;">
              <p><span class="profil-name">Stop All Services</span></p>
              <button class="cl-switch ios" style='background-color:#eee;border:solid 1px #ccc;padding:3px;border-radius:5px;font-size:16px;cursor:pointer;'>Stop
              </button>
          </div>
          </div>
        </div>
        <div class="notification readed private-message">
          <div class="avatar"><i class='bx bx-info-circle' style='color:#1c1e1f;font-size:30px;'></i></div>
          <div class="text">
            <div class="text-top">
              <p><span class="profil-name">Attention</span></p>
            </div>
            <div class="text-bottom text-gray"> 
              <p> The above controls are very sensitive and should not be tempered with, if you dont know what you are doing !!</p>
            </div>
          </div>
        </div>
       
      </div>
    </div>

    <div class="attribution">
      @2024 | Enzerhub Coding Group.
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="script.js"></script>
</body>

</html>