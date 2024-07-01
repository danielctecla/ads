<?php
  session_start();

  if (!isset($_SESSION['usuario'])) {
    echo '
      <script>
            window.location = "../login/login.php"
        </script>
    ';
    session_destroy();
    die();
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aldit</title>
    <!-- <link rel="stylesheet" href="./css/style.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#13212A",
              secundary: "#0077C2",
            },
            height: {
              "screen-minus-3.5": "calc(100vh - 3.5rem)",
            },
          },
        },
      };
    </script>
  </head>

  <body class="bg-primary">
    <!-- Navbar -->
    <nav class="shadow bg-primary border-white px-6 py-1 ">
      <div
        class="relative flex flex-col px-4 py-4 md:mx-auto md:flex-row md:items-center"
      >
        <a
          href=""
          class="md:ml-12 flex items-center text-white whitespace-nowrap text-2xl font-black"
        >
          ¿Qué quieres hacer?
        </a>
        <input type="checkbox" class="peer hidden" id="navbar-open" />
        <label
          class="absolute top-5 right-7 cursor-pointer md:hidden"
          for="navbar-open"
        >
          <svg
            class="w-6 h-6"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-width="2"
              d="M5 7h14M5 12h14M5 17h14"
            />
          </svg>
        </label>
        <div
          aria-label="Header Navigation"
          class="peer-checked:mt-8 peer-checked:max-h-56 flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all md:ml-24 md:max-h-full md:flex-row md:items-start"
        >
          <ul
            class="flex flex-col items-center space-y-2 md:ml-auto md:flex-row md:space-y-0"
          >
            <li class="text-gray-500 md:mr-8 hover:text-secundary">
              <button
                onclick = "window.location = '../login/php/logout_bd.php'"
                class="rounded-md border-2 border-white px-6 py-1 font-medium text-white transition-colors hover:bg-white hover:text-blue-500"
              >
                Cerrar Sesión
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

            
    <!-- contenido -->
    <div class="flex md:h-full md:flex-row flex-col w-full justify-between">
      <div class="md:w-1/2 flex flex-col py-7 md:p-7 gap-7 justify-center">
          <div class=" max-md:p-6 text-2xl font-bold text-white px-14 ">Hoy es
            <?php 
                setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain.1252');
                echo strftime("%d de %B de %Y");
                ?>.
          </div>

      <!-- Datos -->
        <div class="flex justify-center items-center lg:mr-16">
          <div class="w-5/6 bg-white p-6 rounded-xl lg:mb-0">
            <h2 class="mb-6 text-2xl md:text-3xl font-bold">Datos del contribuyente</h2>
              <p class="font-bold text-black mb-2">Nombre</p>
                <div class="rounded-lg bg-gray-200 pl-4 py-2 font-semibold mb-2">
                  <?php echo $_SESSION['nombre']; ?>
                </div>
                <div class="flex flex-row gap-2 mb-2">
                  <div class="flex-1 w-1/2">
                    <p class="font-bold text-black mb-2 truncate">Domicilio</p>
                    <div class="rounded-lg bg-gray-200 px-4 py-2 font-semibold truncate">
                      <?php echo $_SESSION['domicilio'] ?>   
                    </div>
                  </div>
                  <div class="flex-1 w-1/2">
                    <p class="font-bold mb-2 text-black truncate">CLAVE ADUANERA</p>
                    <div class="rounded-lg bg-gray-200  px-4 py-2 font-semibold truncate">
                      <?php echo $_SESSION['claveaduanera'] ?>   
                    </div>
                  </div>
                </div>
              <div class="flex flex-row gap-2 mb-2">
                <div class="flex-1 w-1/2">
                  <p class="font-bold mb-2 text-black truncate">RFC</p>
                  <div class="rounded-lg bg-gray-200 px-4 py-2 font-semibold truncate">
                  <?php echo $_SESSION['rfc'] ?>   
                  </div>
                </div>
                <div class="flex-1 w-1/2">
                  <p class="font-bold mb-2 text-black truncate">ACUSE ELECTRONICO</p>
                  <div class="rounded-lg bg-gray-200 px-4 py-2 font-semibold truncate">
                  <?php echo $_SESSION['acuse_electronico'] ?>   
                  </div>
                </div>
              </div>
              <p class="font-bold text-black mb-2">CURP</p>
              <div class="rounded-lg bg-gray-200 pl-4 mb-2 py-2 font-semibold">
              <?php echo $_SESSION['curp'] ?>   
              </div>
          </div>
        </div>
      </div>
        <div class="md:w-1/2 max-md:mb-10 flex flex-col md:px-7 justify-center">
            <h2 class="max-md:px-6 text-white text-2xl font-bold mb-2">Actividades</h2>
            <div class="bg-gray-200 border-2 px-8 py-10 flex flex-col md:rounded-lg">
              <div class ="flex flex-row justify-center gap-3 mb-2">
                <a href="../auditado/status.php" class="w-2/4 h-14 flex bg-white py-3 text-center justify-center rounded-lg text-blue-500 items-center font-semibold hover:bg-blue-500 hover:text-white">Status de auditoria</a> 
                <a href="../auditado/buzoncitas.php" class="w-2/4 h-14 flex bg-blue-500 py-3 text-center rounded-lg text-white justify-center items-center font-semibold hover:bg-white hover:text-blue-500">Buzón de Citas</a>
              </div>
            </div>
          </div>


      
      

    
    </div>
  </body>
</html>
