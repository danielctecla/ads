


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>tuPlomeroMx</title>
    <link rel="stylesheet" href="./css/style.css" />
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
              primary: "#0077C2",
              secundary: "#00619A",
            },
            height: {
              "screen-minus-16": "calc(100vh - 16rem)", // 2rem es aproximadamente igual a 32px
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-primary h-screen">

    <!-- contenido -->
    <div
      class="grid grid-cols-1 lg:grid-cols-2 gap-y-14 justify-center items-center h-screen-minus-16"
    >
      <!-- login -->
      <div class="flex justify-center items-center">
        <div class="bg-gray-200 p-6 rounded-xl mb-16 lg:mb-0">
          <h2 class="mb-6 text-2xl md:text-3xl font-bold">Crear una cuenta</h2>

          <form class="space-y-4 md:space-y-6" action="php/register_bd.php" method="POST">
            <div class="grid grid-cols-2 gap-x-6">
              <div>
                <label
                  for="nombre"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >Nombres</label
                >
                <input
                  type="text"
                  name="nombres"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="Nombre"
                  required=""
                />
              </div>

              
            </div>

            <div class="grid grid grid-cols-2 gap-x-6">
              <div>
                <label
                  for="correo"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >Correo</label
                >
                <input
                  type="email"
                  name="correo"
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  placeholder="nombre@ejemplo.com"
                  required=""
                />
              </div>

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
                  placeholder="UHC..."
                  required=""
                />
              </div>
            </div>

            <div>
              <label
                for="contraseña"
                class="mb-2 text-sm font-medium text-gray-900"
                >Contraseña</label
              >
              <input
                type="password"
                name="contrasena"
                placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                required=""
              />
            </div>
            <div>
              <label for="nivel_acceso" class="mb-2 text-sm font-medium text-gray-900">Nivel de Acceso</label>
              <select id="nivel_acceso" name="nivel_accesos" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                <option value="">Seleccione una opción</option>
                <option value="auditor">Auditor</option>
                <option value="auditado">Auditado</option>
              </select>
            </div>
            <div>
              <label
                for="curp"
                class="mb-2 text-sm font-medium text-gray-900"
                >CURP</label
              >
              <input
                type="text"
                name="curp"
                placeholder="UHC..."
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                required=""
              />
            </div>
            <div>
              <label
                for="domicilio"
                class="mb-2 text-sm font-medium text-gray-900"
                >Domicilio</label
              >
              <input
                type="text"
                name="domicilio"
                placeholder=""
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                required=""
              />
            </div>
            <div id="campos_auditor" class="hidden">
              <div>
                <label
                  for="no departamento"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >No. Departamento</label
                >
                <input
                  type="text"
                  name="nodepartamento"
                  placeholder=""
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  
                />
              </div>
              <div>
                <label
                  for="id auditor"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >ID de Auditor</label
                >
                <input
                  type="text"
                  name="idauditor"
                  placeholder=""
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  
                />
              </div>
            </div>

            <!-- Campos adicionales para Auditado -->
            <div id="campos_auditado" class="hidden">
            <div>
                <label
                  for="clave aduana"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >Clave Sección Aduanera</label
                >
                <input
                  type="text"
                  name="claveaduana"
                  placeholder=""
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  
                />
              </div>
              <div>
                <label
                  for="acuse electronico"
                  class="mb-2 text-sm font-medium text-gray-900"
                  >Acuse Electrónico</label
                >
                <input
                  type="text"
                  name="acuseelectronico"
                  placeholder=""
                  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                  
                />
              </div>
            </div>
            <div class="flex justify-center">
              <button
                class="bg-secundary w-4/6 text-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              >
                Crear cuenta
              </button>
            </div>

            <div class="flex justify-center">
              <p class="text-sm font-light text-gray-500">
                ¿Ya tienes una cuenta?
                <a href="./../login/login.php" class="font-medium text-primary-600 hover:underline"
                  >Inicia sesion</a
                >
              </p>
            </div>
          </form>
        </div>
      </div>

      <!-- figura y landing page -->
      <div class="flex flex-col justify-center items-center space-y-16">
        <h2 class="mb-6 text-2xl md:text-3xl font-bold text-white">
          Bienvenido/a
        </h2>
        <img
          class="w-80"
          src="../assets/img/login.svg"
          alt="persona sosteniendo un celular"
        />
      </div>
    </div>
  </body>
</html>


<script>
              document.getElementById('nivel_acceso').addEventListener('change', function() {
                var valor = this.value;
                var camposAuditor = document.getElementById('campos_auditor');
                var camposAuditado = document.getElementById('campos_auditado');

                // Oculta ambos campos inicialmente
                camposAuditor.classList.add('hidden');
                camposAuditado.classList.add('hidden');

                // Muestra los campos basados en la selección
                if (valor === 'auditor') {
                  camposAuditor.classList.remove('hidden');
                } else if (valor === 'auditado') {
                  camposAuditado.classList.remove('hidden');
                }
              });
            </script>