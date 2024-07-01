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
    <title>AIdit™</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }

        .min-h-screen-minus-68 {
          min-height: calc(100vh - 68px); /* Ajusta 3.5rem al valor que necesitas restar */
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
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./menu.php">Menú</a>
            </li>
            <li class="text-text-primary md:mr-8 font-semibold hover:text-primary">
              <a href="">Status Auditorias</a>
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
    <main class="min-h-screen-minus-68 w-full flex flex-col">
      <h2 class="text-primary text-center py-7 text-2xl font-bold">
                Citas programadas
      </h2>    
      <div class="flex flex-col">
          
          <table class="mx-auto w-full md:w-3/4 overflow-x-auto">
          <?php 
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            include './php/conexion_bd.php';

            $query = "SELECT * FROM cita WHERE fecha_cita >= CURDATE()";
            $result = mysqli_query($conexion, $query);
            
            if(mysqli_num_rows($result) == 0){
              echo '<h2 class="text-primary text-center py-7 text-2xl font-bold">No hay citas</h2>';
            }else{
              echo '
                <thead class="bg-primary text-white">
                  <tr>
                    <th class="py-2 border-r rounded-tl-lg">Folio informe</th>
                    <th class="py-2 border-r ">Fecha</th>
                    <th class="py-2 border-r ">Hora</th>
                    <th class="py-2 border-r hidden md:table-cell">Lugar</th>
                    <th class="py-2 border-r rounded-tr-lg">Acciones</th> <!-- Añadido border-r para consistencia -->
                  </tr>
                </thead>
                ';
              echo '<tbody>';
              while($row = mysqli_fetch_array($result)){
                
                echo '
                  <tr class="bg-white">
                    <td class="py-2 px-1 border-r text-center font-semibold">'.$row['folio_informe'].'</td>
                    <td class="py-2 px-1 border-r text-center font-semibold">'.$row['fecha_cita'].'</td>
                    <td class="py-2 px-1 border-r text-center font-semibold">'.$row['hora_cita'].'</td>
                    <td class="py-2 px-1 border-r text-center font-semibold hidden md:table-cell">'.$row['lugar_cita'].'</td>
                    
                ';
                  echo '
                    <td class="py-2 flex justify-center gap-1">
                      <a href="./modificar-cita.php?id-cita='.$row['id_cita'].'" class="text-white bg-primary rounded-xl px-2 py-1 ">modificar</a>
                      <a href="./php/borrar-cita.php?id-cita='.$row['id_cita'].'" class="text-white bg-primary rounded-xl px-2 py-1 ">cancelar</a>
                      <a href="./ver-informe.php?folio-informe='.$row['folio_informe'].'" class="text-white bg-primary rounded-xl px-2 py-1 ">informe</a>
                    </td>
                  ';

                echo '</tr>';
                
              }
              echo '</tbody>';
            }
          ?>
          </table>
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
