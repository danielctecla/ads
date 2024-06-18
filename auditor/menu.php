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
    <title>tuPlomeroMx</title>
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
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./index.php">Inicio</a>
            </li>
            <li class="text-primary md:mr-8 font-semibold hover:text-primary">
              <a href="">Menú</a>
            </li>
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./status.php">Status Auditorias</a>
            </li>
            <li class="text-gray-500 md:mr-8 hover:text-secundary">
              <button
                class="rounded-md border-2 border-primary px-6 py-1 font-medium text-primary transition-colors hover:bg-primary hover:text-white"
              >
                Cerrar Sesión
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="md:h-screen-minus-68 w-full">
        <div class="flex md:h-full md:flex-row flex-col w-full justify-between">
          
          <div class="md:w-1/2 flex flex-col py-7 md:p-7 gap-7 justify-center">
            <div class=" max-md:p-6 text-2xl font-bold">Hoy es
            <?php 
                setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain.1252');
                echo strftime("%d de %B de %Y");
                ?>.
            </div>
            
            <div class ="flex flex-col border-2 bg-primary rounded-xl pt-4 pb-6 px-8">
              <h2 class="text-center text-white  text-lg py-1 font-bold">
                Datos del Auditor
              </h2>
              <p class="font-bold text-white mb-2">Nombre</p>
              <div class="rounded-lg bg-white pl-4 py-2 font-semibold mb-2">
                <?php echo $_SESSION['nombre']; ?>
              </div>
              <div class="flex flex-row gap-2 mb-2">
                <div class="flex-1 w-1/2">
                  <p class="font-bold text-white mb-2 truncate">Domicilio</p>
                  <div class="rounded-lg bg-white px-4 py-2 font-semibold truncate">
                    <?php echo $_SESSION['domicilio'] ?>   
                  </div>
                </div>
                <div class="flex-1 w-1/2">
                  <p class="font-bold mb-2 text-white truncate">ID</p>
                  <div class="rounded-lg bg-white  px-4 py-2 font-semibold truncate">
                    <?php echo $_SESSION['id_auditor'] ?>   
                  </div>
                </div>
              </div>
              <div class="flex flex-row gap-2 mb-2">
                <div class="flex-1 w-1/2">
                  <p class="font-bold mb-2 text-white truncate">RFC</p>
                  <div class="rounded-lg bg-white px-4 py-2 font-semibold truncate">
                  <?php echo $_SESSION['rfc'] ?>   
                  </div>
                </div>
                <div class="flex-1 w-1/2">
                  <p class="font-bold mb-2 text-white truncate">No. Departamento</p>
                  <div class="rounded-lg bg-white px-4 py-2 font-semibold truncate">
                  <?php echo $_SESSION['nodepartamento'] ?>   
                  </div>
                </div>
              </div>
              <p class="font-bold text-white mb-2">CURP</p>
              <div class="rounded-lg bg-white pl-4 mb-2 py-2 font-semibold">
              <?php echo $_SESSION['curp'] ?>   
              </div>
            </div>

          </div>

          <div class="md:w-1/2 max-md:mb-10 flex flex-col md:px-7 justify-center">
            <h2 class="max-md:px-6 text-2xl font-bold mb-2">Actividades</h2>
            <div class="bg-white border-2 px-8 py-10 flex flex-col md:rounded-lg">
              <div class ="flex flex-row justify-center gap-3 mb-2">
                <a href="" class="w-2/4 h-14 flex bg-[#13212A] py-3 text-center justify-center rounded-lg text-white items-center font-semibold">Status de auditoria</a> 
                <a href="" class="w-2/4 h-14 flex bg-[#13212A] py-3 text-center rounded-lg text-white justify-center items-center font-semibold">Buzón de citas</a>
              </div>
              <div class ="flex flex-row justify-center gap-3">
                <a href="" class="w-2/4 h-14 flex bg-[#13212A] py-3 px-4 text-center rounded-lg text-white items-center justify-center font-semibold">Emitir Informe</a> 
                <a href="./registrar-auditoria.php" class="w-2/4 h-14 flex bg-[#13212A] py-3 px-4 text-center rounded-lg text-white items-center justify-center font-semibold">Registrar Auditoría</a>
              </div>
            </div>
          </div>
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
