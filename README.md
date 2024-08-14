<h1 class="h1">Clonar Repositorio</h1>

<h4 class="h4">Clonar El Repositorio (solo si no lo has hecho antes)</h4>
git clone https://github.com/usuario/nombre-del-repositorio.git

<h4 class="h4">Navegar al Directorio Del Repositorio</h4>

cd nombre-del-repositorio

<h4 class="h4">Realizar cambios en los archivos (esto lo haces en tu editor de texto o IDE)<\h4>


<h1 class="h1">Actualizar Repositorio</h1>
<h4 class="h4">Añadir los Cambios Al Área De Preparación</h4>

git add .

<h4 class="h4">Confirmar los Cambios Con Un Mensaje Descriptivo</h4>
git commit -m "Descripción de los cambios"

<h4 class="h4">Enviar los Cambios Al Repositorio Remoto</h4>
git push origin main


<h1 class="h1">Crear Rama Y Subir Los Proyectos A Esa Rama</h1>

• git checkout -b nombreDeLaRama (crea una nueva rama y te posiciona en ella)


• git branch (para verificar que se creo)


• git add .


• git commit -m "resumen de los archivos o cambios que haces"


• git push origin nombreDeLaRama (sube los archivos a la rama)

<h1 class="h1">Volver Atrás En Los Commits</h1>

git checkout HEAD~1 (o el número de commits que quieras retroceder)

<h1 class="h1">Actualizar Archivo Local</h1>

git pull