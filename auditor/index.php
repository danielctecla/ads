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
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }

        body{
          font-family: "Times New Roman";
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
              "screen-minus-68": "calc(100vh - 68px)",
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-gray-100">
  <nav class="shadow bg-gray-100">
      <div
        class="relative flex flex-col px-4 py-4 md:mx-auto md:flex-row md:items-center"
      >
        <a
          href=""
          class="md:ml-12 flex items-center whitespace-nowrap text-2xl font-black"
        >
          Nombre
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
            <li class="text-primary md:mr-8 font-semibold hover:text-primary">
              <a href="">Inicio</a>
            </li>
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./menu.php">Menú</a>
            </li>
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./status.php">Status Auditorias</a>
            </li>
            <li class="text-gray-500 md:mr-8 hover:text-secundary">
              <button
                onclick = "window.location = '../login/php/logout_bd.php'"
                class="rounded-md border-2 border-primary px-6 py-1 font-medium text-primary transition-colors hover:bg-primary hover:text-white"
              >
                Cerrar Sesión
              </button>  
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="h-screen-minus-68 w-full">
        <div class="w-full h-full flex flex-col items-center justify-center gap-20">
            <h2 class="text-primary mb-16 md:text-7xl text-5xl font-serif font-bold">Bienvenido</h2>
            <div class="text-primary text-xl md:text-4xl font-light text-center max-md:px-5">
                <p>Hola 
                <?php echo $_SESSION['nombre']; ?>    
                hoy es 
                <?php 
                setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain.1252');
                echo strftime("%d de %B de %Y");
                ?>.</p>
            </div>
            <a href="./menu.php" class="py-2.5 px-14 bg-primary text-white text-semibold rounded-lg text-base font-medium">Iniciar</a>
        </div>
    </main>
    <!-- footer -->
    <footer class="bg-white border-t-2 border-gray-100">
      <div class="relative mx-auto max-w-screen-xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-end lg:justify-between">
          <div>
            <div class="flex justify-center text-teal-600 lg:justify-start">
              <img src="../assets/img/footer-logo.svg" alt="Logo de tuPlomeroMx" class="h-8" />
            </div>
            <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">
              Soluciones eficientes y confiables para todas tus necesidades de plomería.
            </p>
          </div>

          <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
            <li>
              <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Nosotros </a>
            </li>
            <li>
              <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Políticas de Privacidad </a>
            </li>
            <li>
              <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Contacto </a>
            </li>
          </ul>
        </div>

        <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
          © 2024 <a href="#" class="hover:underline">TuPlomeroMx™</a>. Todos los derechos reservados.
        </p>
      </div>
    </footer>
  </body>
</html>
