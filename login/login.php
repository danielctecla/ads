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
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-primary">
    <section class="md:h-screen w-full bg-primary md:bg-[url('../assets/img/bg-img.png')] md:bg-cover md:bg-center">
      <!-- title -->
    <div class="h-64 flex justify-center items-center flex-col space-y-4">
      <h2 class="text-white md:text-black text-5xl font-bold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">Aldit</h2>
      <!-- <h1 class="text-white text-lg drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">Servicio de plomeria y fontaneria</h1> -->
    </div>

    <!-- contenido -->
    <div
      class="grid grid-cols-1 lg:grid-cols-2 gap-y-14 justify-center items-center h-screen-minus-16"
    >
      <!-- figura y landing page -->
      <div class="flex flex-col justify-center items-center space-y-16">
        <h2 class="mb-6 text-2xl md:text-3xl font-bold text-white md:text-black">
          Bienvenido/a
        </h2>
        <img
          class="w-80"
          src="../assets/img/login.svg"
          alt="persona sosteniendo un celular"
        />
      </div>

      <!-- login -->
      <div class="flex justify-center items-center">
        <div class="bg-gray-200 p-12 rounded-lg mb-16 lg:mb-0">
          <h2 class="mb-6 text-2xl md:text-3xl font-bold">Iniciar sesion</h2>

          <form class="space-y-4 md:space-y-6" action="php/login_bd.php" method="POST">
            <div>
              <label for="correo" class="mb-2 text-sm font-medium text-gray-900"
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
            <div class="flex items-center justify-between space-x-8">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    id="recordar"
                    aria-describedby="recordar"
                    type="checkbox"
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                  />
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500">Recordar</label>
                </div>
              </div>
              <a
                href="#"
                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500"
                >¿Olvidaste tu contraseña?</a
              >
            </div>
            <div class="flex justify-center">
              <button
                class="bg-secundary w-4/6 text-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              >
                Iniciar sesion
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </section>
  
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
          © 2024 <a href="#" class="hover:underline">Aldit™</a>. Todos los derechos reservados.
        </p>
      </div>
    </footer>
  </body>
</html>
