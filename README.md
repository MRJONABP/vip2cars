## Pregunta 1: Modelo de Base de Datos

El modelo de base de datos del sistema de encuestas anónimas se encuentra representado en el siguiente diagrama.

Las imágenes del modelo se encuentran dentro de la carpeta **fotos** del repositorio.

![Modelo de Base de Datos](fotos/esquema.jpeg)


## Pregunta 2: Instalación y ejecución del proyecto

Para ejecutar el sistema en un entorno local siga los siguientes pasos:

1. Clonar el repositorio desde GitHub

git clone https://github.com/MRJONABP/vip2cars.git

2. Ingresar a la carpeta del proyecto

cd vip2cars

3. Instalar las dependencias del proyecto

composer install

4. Ejecutar las migraciones de la base de datos

php artisan migrate

5. Iniciar el servidor de desarrollo

php artisan serve

6. Abrir el navegador y acceder al sistema

http://localhost:8000/vehicles