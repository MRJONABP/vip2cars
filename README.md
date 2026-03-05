## Modelado de Base de Datos – Sistema de Encuestas Anónimas

Se propone la siguiente estructura:

### surveys
- id
- title
- description
- created_at

### questions
- id
- survey_id
- question

### options
- id
- question_id
- option_text

### responses
- id
- question_id
- option_id
- created_at

Relaciones:
- Un survey tiene muchas questions
- Una question tiene muchas options
- Las responses registran la opción seleccionada

El sistema es anónimo porque no se almacena información del usuario que responde.




## Instalación

1. Clonar repositorio

git clone https://github.com/usuario/vip2cars

2. Entrar al proyecto

cd vip2cars

3. Instalar dependencias

composer install

4. Ejecutar migraciones

php artisan migrate

5. Iniciar servidor

php artisan serve