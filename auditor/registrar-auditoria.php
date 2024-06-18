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
            <li class="text-gray-500 md:mr-8 font-semibold hover:text-primary">
              <a href="./menu.php">Menú</a>
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
    <main class="md:h-screen-minus-68 w-full flex flex-col">
        <h2 class="text-primary px-6 pt-6 pb-6 md:pb-0 text-2xl md:text-3xl text-center font-bold">Registro de Auditoría</h2>
        <form action="php/registrar-auditoria.php" method="POST" enctype="multipart/form-data" class="md:flex-1 flex flex-col max-md:mb-10 gap-3 justify-center">            
            <div class="flex md:flex-row flex-col w-full md:gap-0 gap-10">
                <div class="md:w-1/2 md:p-4 flex flex-col gap-5 justify-center">
                    <div class="flex flex-col bg-primary w-full px-7 pt-3 pb-5 rounded-lg gap-2">                        
                      <h3 class="text-white text-center text-lg font-bold">
                          Datos del Contribuyente
                      </h3>
                      <div class="flex flex-col md:flex-row gap-2 mb-2">
                          <div class="flex-1 md:w-1/2">
                              <label for="rfc" class="font-medium text-white text-sm truncate">RFC</label>
                              <input
                                  type="text"
                                  name="rfc"
                                  class="bg-white sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                  placeholder="RFC"
                                  required=""
                              />
                          </div>
                      </div>
                        
                    </div>
                    <div class="bg-primary rounded-xl px-7 pt-3 pb-5">
                      <h3 class="text-white text-center text-lg py-1 font-bold">
                        Documentación a presentar
                      </h3>
                      <div class="flex flex-row justify-center gap-5 mb-2">
                        <div>
                            <input
                                type="checkbox"
                                name="opcion1"
                                value="factura"
                                class="mr-2"
                            />
                            <label for="opcion1" class="font-medium text-white text-sm">Factura</label>
                        </div>
                        <div>
                            <input
                                type="checkbox"
                                name="opcion2"
                                value="libro contable"
                                class="mr-2"
                            />
                            <label for="opcion2" class="font-medium text-white text-sm">Libro contable</label>
                        </div>
                        <div>
                            <input
                                type="checkbox"
                                name="opcion3"
                                value="balance general"
                                class="mr-2"
                            />
                            <label for="opcion3" class="font-medium text-white text-sm">Balance General</label>
                        </div>
                        
                      </div>
                      <div>
                            <label for="otros" class="font-medium text-white text-sm truncate">Otros</label>
                            <input
                                    type="text"
                                    name="otros"
                                    class="bg-white sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                    placeholder="Otros documentos a presentar"
                                />
                        </div>
                    </div>
                    
                </div>
                <div class="md:w-1/2 md:p-4 flex flex-col gap-5">
                    
                    <div class="flex flex-col bg-white w-full px-7 pt-3 pb-5 rounded-lg gap-2">
                        <h3 class="text-center text-lg font-bold">
                            Datos del Documento
                        </h3>
                        <div class="flex flex-col md:flex-row gap-2 mb-2">
                            <div class="flex-1 md:w-1/3">
                                <label for="folio" class="font-medium text-gray-900 text-sm truncate">Folio</label>
                                <input
                                    type="text"
                                    name="folio"
                                    class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                    placeholder="folio"
                                    required=""
                                />
                            </div>
                            <div class="flex-1 md:w-1/3">
                                <label for="ano-fiscal" class="font-medium text-gray-900 text-sm truncate">Año Fiscal</label>
                                <input
                                    type="number"
                                    name="ano-fiscal"
                                    class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                    placeholder="clave aduanera"
                                    required=""
                                />
                            </div>
                            <div class="flex-1 md:w-1/3">
                                <label for="titulo" class="font-medium text-gray-900 text-sm truncate">Título</label>
                                <input
                                    type="text"
                                    name="titulo"
                                    class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                    placeholder="Título"
                                    required=""
                                />
                            </div>
                        </div>
                        
                        <div>
                            <label for="lugar de revision" class="font-medium text-gray-900 text-sm truncate">Lugar de Revisión</label>
                            <input
                                type="text"
                                name="lugar-revision"
                                class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                placeholder="lugar de revisión"
                                required=""
                            />
                        </div>
                        <div class="flex flex-col md:flex-row gap-2 mb-2">
                            <div class="flex-1 md:w-1/2">
                                <div for="auditor" class="font-medium text-gray-900 text-sm truncate">Auditor</div>
                                <div
                                    class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold truncate"
                                ><?php echo $_SESSION['nombre']; ?></div>
                            </div>
                            <div class="flex-1 md:w-1/2">
                            <div for="auditor" class="font-medium text-gray-900 text-sm truncate">ID Auditor</div>
                                <div
                                    class="bg-[#D9D9D9] sm:text-sm rounded-lg block w-full p-2.5 font-semibold"
                                ><?php echo $_SESSION['id_auditor']; ?></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="bg-white rounded-xl px-7 pt-3 pb-5">
                      <h3 class=" text-center text-lg font-bold">
                        Archivos
                      </h3>
                      <div class="flex flex-row justify-center gap-5 mb-2">
                        <div>
                          <label for="archivo1" class="block mb-2 text-sm font-medium text-gray-900">Auditoria</label>
                          <input type="file" name="file_auditoria" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        
                        <div>
                          <label for="archivo2" class="block mb-2 text-sm font-medium text-gray-900">Anexos</label>
                          <input type="file" name="file_anexos" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                      </div>      
                    </div>
                </div>
            </div>
            <div class="flex justify-center w-full">
                <button class="bg-black text-white px-8 py-4 rounded-lg">Registrar Datos</button>
            </div>
        </form>
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
