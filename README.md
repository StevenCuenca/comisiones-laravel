# Sistema de Comisiones MVC

Aplicación web desarrollada con Laravel para registrar vendedores, registrar ventas y calcular comisiones según el total vendido en un rango de fechas.

## Aplicación publicada

- Aplicación: https://comisiones-laravel.onrender.com
- Repositorio: https://github.com/StevenCuenca/comisiones-laravel

## Funcionalidades

- Registro y visualización de vendedores.
- Registro y visualización de ventas.
- Relación entre vendedores y ventas.
- Cálculo de comisión por vendedor.
- Filtro de ventas por fecha de inicio y fecha final.
- Aplicación automática de reglas de comisión.
- Despliegue en la nube con Render.
- Base de datos PostgreSQL en Render.

## Reglas de comisión

| Total vendido | Porcentaje |
|---:|---:|
| Menor a $500 | 0% |
| Desde $500 | 8% |
| Desde $600 | 6% |
| Desde $800 | 10% |
| Desde $1.000 | 15% |

El sistema toma el umbral más alto que alcanza el total de ventas del vendedor dentro del período seleccionado.

## Tecnologías utilizadas

- PHP
- Laravel 13
- Blade
- SQLite para desarrollo local
- PostgreSQL para producción
- Docker
- Render
- GitHub

## Arquitectura MVC

### Modelos

- `Vendedor`: representa a cada vendedor.
- `Venta`: representa una venta realizada por un vendedor.
- `ReglaComision`: representa los umbrales y porcentajes de comisión.

### Controladores

- `VendedorController`: registra y lista vendedores.
- `VentaController`: registra y lista ventas.
- `ComisionController`: calcula la comisión según las ventas y reglas.

### Vistas

Las vistas están desarrolladas con Blade y se encuentran en `resources/views`.

- `vendedores`: listado y formulario de vendedores.
- `ventas`: listado y formulario de ventas.
- `comisiones`: formulario de cálculo y resultado.
- `layouts/app.blade.php`: plantilla visual compartida.

## Base de datos

El proyecto utiliza tres tablas principales:

- `vendedores`
- `ventas`
- `reglas_comision`

La tabla `ventas` se relaciona con `vendedores` mediante el campo `vendedor_id`.

## Ejecución local

1. Clonar el repositorio:

```bash
git clone https://github.com/StevenCuenca/comisiones-laravel.git
```

2. Entrar al proyecto:

```bash
cd comisiones-laravel
```

3. Instalar dependencias:

```bash
composer install
```

4. Crear el archivo de base de datos SQLite:

```bash
New-Item -Path database\database.sqlite -ItemType File -Force
```

5. Configurar `.env`:

```env
DB_CONNECTION=sqlite
```

6. Ejecutar migraciones y cargar reglas:

```bash
php artisan migrate
php artisan db:seed
```

7. Iniciar el servidor:

```bash
php artisan serve
```

8. Abrir:

```text
http://127.0.0.1:8000
```

## Despliegue

La aplicación se despliega en Render mediante Docker.

Durante el despliegue:

1. Se instala PHP y las extensiones necesarias.
2. Se instala Laravel mediante Composer.
3. Se ejecutan las migraciones.
4. Se cargan las reglas de comisión.
5. Se conecta la aplicación a PostgreSQL mediante variables de entorno.

## Autor

Steven Cuenca