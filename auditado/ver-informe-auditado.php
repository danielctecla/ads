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
  
  if(!isset($_GET['folio-informe'])){
    header ('Location: informes.php');
    exit;
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include './php/conexion_bd.php';

  $query = "SELECT * FROM informes WHERE folio_informe = '".$_GET['folio-informe']."'";
  $resultado = mysqli_query($conexion, $query);
  
  if(mysqli_num_rows($resultado) == 0){
    header ('Location: informes.php');
    exit;
  }

  $informe = mysqli_fetch_array($resultado);

  $second_query = "SELECT * FROM auditor WHERE rfc_usuarios = '".$_SESSION['rfc']."'";

  $second_result = mysqli_query($conexion, $second_query);
  $auditor = mysqli_fetch_array($second_result);

  $third_query = "SELECT * FROM auditoria WHERE folio = '".$informe['folio_auditoria']."'";
  $third_result = mysqli_query($conexion, $third_query);
  $auditoria = mysqli_fetch_array($third_result);

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

        .min-h-screen-minus-68 {
          min-height: calc(100vh - 68px); /* Ajusta 3.5rem al valor que necesitas restar */
        }
      }

      body{
        font-family: "Times New Roman";
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
    <main class="md:h-screen-minus-68 w-full flex flex-col">
      
      <div class="flex flex-col w-full gap-4">
        <div class="flex justify-center">
            <h2 class="text-primary pt-6 font-bold text-2xl">Informe de Observaciones</h2>
        </div>
        <div class="ml-4 md:ml-8 flex flex-row gap-2">
                <p class="text-primary  font-semibold text-lg items-center">Folio de Informe</p>
                <p class="bg-primary text-white text-lg  px-4 rounded-lg">
                    <?php echo $informe['folio_informe']; ?>
                </p>
        </div>

        <section class="flex flex-col md:flex-row w-full justify-center gap-8" 
            action="<?php
            echo 'php/generar-informe.php?folio='.$auditoria['folio'];
            ?>" method="POST" enctype="multipart/form-data"
        >
            
            <div class="flex flex-col md:w-2/5 lg:w-1/3 ">
                <div class ="flex flex-col border-2 bg-primary rounded-xl pt-4 pb-6 px-8">
                    <h2 class="text-center text-white  text-lg py-1 font-bold">
                        Datos de la auditoria
                    </h2>
                
                    <div class="flex flex-row gap-2 mb-2 w-full">
                        <div class=" w-full">
                            <p class="font-bold text-white mb-2 text-sm">Título</p>
                            <div class="rounded-lg bg-white pl-4 py-2  text-sm font-semibold mb-2">
                            <?php echo $auditoria['titulo'] ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-row gap-2 mb-2 w-full">
                        <div class=" w-2/4">
                            <p class="font-bold text-white mb-2 text-sm">Folio</p>
                            <div class="rounded-lg bg-white pl-4 py-2  text-sm font-semibold mb-2">
                            <?php echo $auditoria['folio'] ?>
                            </div>
                        </div>
                        <div class=" w-2/4">
                            <p class="font-bold text-white mb-2 truncate text-sm">Año Fiscal</p>
                            <div class="rounded-lg bg-white px-4 py-2 text-sm font-semibold truncate">
                            <?php echo $auditoria['ano_fiscal'] ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-row gap-2 mb-2 w-full">
                        <div class=" w-full">
                            <p class="font-bold text-white mb-2 text-sm">RFC Auditado</p>
                            <div class="rounded-lg bg-white pl-4 py-2  text-sm font-semibold mb-2">
                            <?php echo $auditoria['rfc_auditado'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="flex flex-col border-2 bg-primary rounded-xl pt-4 pb-6 px-8">
                    <h2 class="text-center text-white  text-lg py-1 font-bold">
                        Datos del auditor
                    </h2>
                
                    <div class="flex flex-row gap-2 mb-2 w-full">
                        <div class=" w-full">
                            <p class="font-bold text-white mb-2 text-sm">Nombre Completo</p>
                            <div class="rounded-lg bg-white pl-4 py-2  text-sm font-semibold mb-2">
                            <?php echo $_SESSION['nombre'] ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex flex-row gap-2 mb-2 w-full">
                        <div class=" w-2/4">
                            <p class="font-bold text-white mb-2 text-sm">RFC</p>
                            <div class="rounded-lg bg-white pl-4 py-2  text-sm font-semibold mb-2">
                            <?php echo $_SESSION['rfc'] ?>
                            </div>
                        </div>
                        <div class=" w-2/4">
                            <p class="font-bold text-white mb-2 truncate text-sm">ID Auditor</p>
                            <div class="rounded-lg bg-white px-4 py-2 text-sm font-semibold truncate">
                            <?php 
                            echo $auditor['id_auditor'];
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:w-2/5 lg:w-1/3 md:justify-center">
                <div class="flex flex-col mb-4 bg-white px-6 pt-5 pb-8 rounded-lg">
                    
                    <a href="./php/download.php?id=<?php echo $informe['folio_informe']; ?>" class="self-center rounded-lg py-2 text-white font-semibold px-5 bg-primary">
                        <img src="../assets/img/pdf.svg" alt="">    
                        Descargar Archivo
                    </a>
                </div>
                <div class="bg-white mb-4 rounded-lg px-6 pt-5 pb-8 flex gap-4 flex-col">
                    <h3 class="text-center text-primary font-semibold text-lg">Irregularidades Detectadas</h3>
                    <div class="flex flex-col">
                        <label for="irregularidades" class="font-medium text-primary text-sm">Descripción de las irregularidades detectadas</label>
                        <div class="h-32 p-2  bg-gray-100 rounded-md resize-none"  >
                          <?php echo $informe['irregularidades']; ?>
                        </div>
                    </div>
                </div>
                
            </div>
    </section>
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
