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
    <nav
      class="bg-primary border-b-2 border-white/[.3] h-14 flex items-center justify-center md:justify-between"
    >
      <div class="mx-12 hidden md:block">
        <a class="text-white" href="#">NOMBRE</a>
      </div>

      <div class="md:mx-12">
        <div>
          <a
            class="text-white hover:text-secundary text-sm px-3 py-2 mx-2 transition-colors duration-300"
            href="#"
            >Home</a
          >
          <a
            class="text-secundary hover:text-secundary text-sm px-3 py-2 mx-2 transition-colors duration-300"
            href="#"
            >Solicitud</a
          >
          <a
            class="text-white hover:text-secundary text-sm px-3 py-2 mx-2 transition-colors duration-300"
            href="#"
            >Notificaciones</a
          >
        </div>
      </div>
    </nav>

    <!-- contenido -->
    <div
      class="grid grid-cols-1 lg:grid-cols-2 gap-y-14 justify-center items-center md:h-screen-minus-3.5"
    >
      <!-- Datos -->
      <div class="flex justify-center items-center lg:mr-16">
        <div class="w-5/6 bg-gray-100 p-6 rounded-xl lg:mb-0">
          <h2 class="mb-6 text-2xl md:text-3xl font-bold">Datos del contribuyente</h2>

          <form
            class="space-y-2 md:space-y-4"
            action="php/register_bd.php"
            method="POST"
          >
              <!-- Nombre/Denominación/Razon Social -->
            <div>
              <label
                for="Nombre/Denominacion/RazonSocial"
                class="mb-2 text-sm font-medium text-gray-900"
                >Nombre/Denominación/Razón Social</label
              >
              <input
                type="text"
                name="Nombre/Denominacion/RazonSocial"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="Nombre/Denominación/Razón Social"
                required=""
              />
            </div> 
            <div class="grid grid-cols-2 gap-x-2 md:gap-x-6">
              
              <!-- Domicilio -->
              <div>
                <label
                  for="domicilio"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >Domicilio</label
                >
                <input
                  type="text"
                  name="domicilio"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="Domicilio"
                  required=""
                />
              </div>
              <!-- ID -->
              <div>
                <label
                  for="id"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >ID</label
                >
                <input
                  type="text"
                  name="id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="ID"
                  required=""
                />
              </div>
            </div>
            <div class="grid grid-cols-2 gap-x-2 md:gap-x-6">
              
              <!-- RFC -->
              <div>
                <label
                  for="rfc"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >RFC</label
                >
                <input
                  type="text"
                  name="rfc"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="RFC"
                  required=""
                />
              </div>
              <!-- ACUSE ELECTRONICO -->
              <div>
                <label
                  for="acuseElec"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >ACUSE ELECTRONICO</label
                >
                <input
                  type="text"
                  name="acuseElec"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="ACUSE ELECTRONICO"
                  required=""
                />
              </div>
            </div>
              
              <!-- CURPS -->
            <div>
              <label
                for="curp"
                class="mb-2 text-sm font-medium text-gray-900"
                >CURP</label
              >
              <input
                type="text"
                name="curp"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="CURP"
                required=""
              />
            </div> 
            <div class="grid grid-cols-2 gap-x-2 md:gap-x-6">
            

            <div class="flex justify-center">
              <button
                class="bg-secundary w-4/6 text-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-gray-100 hover:text-secundary transition-colors duration-300 ease-in-out mt-6"
              >
                Solicitar servicio
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
