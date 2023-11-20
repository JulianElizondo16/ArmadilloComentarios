# Instalacion proyecto

1. Generar un paquete de Laravel utilizando Jetstream y Livewire (Por el uso de mi paquete).
   ![](https://i.ibb.co/Lx9bZFy/imagen-2023-11-20-094038853.png)

## 1. Ejecutar el comando

` php artisan make:livewire navigation`

## 2. Nos dirigimos a la ruta

**resources/views/livewire**
y vamos a tener que eliminar nuestro archivo de navigation.

## 3. Cambiar la ruta que reconozca Livewire

Vamos a **resources/views/layouts/app.blade.php** hacemos el cambio en @livewire (a navigation.)
![](https://i.ibb.co/hLGFKYH/image.png)

Ahora vamos a **app/Providers/RouteServiceProvider.php** Y hacemos el siguiente cambio.

![](https://i.ibb.co/9NHCJVG/image.png)

## 5. Seguido vamos al archivo _composer.json_

Vamos al composer.json y cambiamos lo vamos a poner en **dev**.

![](https://i.ibb.co/YZWbrz9/Captura-de-pantalla-2023-11-20-094439.png)

## 6. Cambiamos nuestro **.env**

Vamos a .env y ponemos el nombre de la base de datos.

![](https://i.ibb.co/31yMX7z/image.png)

## 7. Ingresamos el siguiente comando de composer:

` composer require julianelizondo16/armadillocomentarios`

# Pasos para la configuracion

Ahora vamos a ir a nuestro carpeta **“config”** en el proyecto principal(el que estamos
usando) e ingresamos al archivo **app.php** Y dentro del archivo vamos a bajar hasta los
array de **“providers”**

Vamos a agregar nuestro provider de ultimo.

` julianelizondo\armadillocomentarios\ComentariosServiceProvider::class`

![](https://i.ibb.co/stxFgdY/image.png)

Luego de eso tenemos que ir a nuestro archivo **composer.json** en el paquete principal. Y
vamos al apartado de **autoload**, aca lo que vamos a hacer es que cargue lo que son los
datos de esos archivos, en este caso todos los archivos de ese paquete instalado.

![](https://i.ibb.co/3FryTm7/image.png)

## Vamos a agregar las rutas necesarias para que los controladores funcionen.'

Vamos a agregar este codigo en nuestra ruta principal

Ahora nos vamos a **routes/web.php** y cambiamos lo siguiente

**ACORDARSE DE PONER
use App\Http\Controllers\ComentariosController;**

    Route::controller(ComentariosController::class)->group(function () {

    Route::get('/', 'index')->name('comentarios.home');

    Route::post('/comentarios', 'GenerarComentario')->name('comentarios.generar');

    Route::get('/comentarios/{comentario}', 'show')->name('comentarios.show');});

# Ultimos comandos.

## Que reconozca el autoload

`composer dump-autoload `

## Que busque todos los serviceProviders

`  php artisan vendor:publish --provider="julianelizondo16\armadillocomentarios\ComentariosServiceProvider"`

## Que ejecute las migraciones

`php artisan migrate`

## Levantamos los servidores para ver si funciona correctamente:

` npm run dev`

Este en otra terminal

`php artisan serve`
