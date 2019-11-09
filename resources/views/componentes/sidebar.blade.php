<ul class="collection">
    <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
      <span class="title">Alumnos</span><br>

      <ul>
      <li><a href="{{url("/alumnos")}}">Alumnos</a></li>
      <li><a href="{{url("/alumnos/create")}}">Crear Alumno</a></li>
      <li><a href="{{url("/alumnos/search")}}">Buscar Alumno</a></li>
            
      </ul>

    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle">folder</i>
      <span class="title">Profesores</span>
      <ul>
            <li><a href="{{url("/profesores")}}">Profesores</a></li>
            <li><a href="{{url("/profesores/create")}}">Crear Profesor</a></li>
            <li><a href="{{url("/profesores/search")}}">Buscar Profesor</a></li>
            <li><a href="{{url("/profesores/asignarCurso")}}">Asignar Curso</a></li>
              
        </ul>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle green">insert_chart</i>
      <span class="title">Cursos</span>
      <ul>
            <li><a href="{{url("/cursos")}}">Cursos</a></li>
            <li><a href="{{url("/cursos/create")}}">Crear Curso</a></li>
            <li><a href="{{url("/cursos/search")}}">Buscar Curso</a></li>
              
        </ul>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle red">play_arrow</i>
      <span class="title">Salones</span>
      <ul>
            <li><a href="{{url("/salones")}}">Salones</a></li>
            <li><a href="{{url("/salones/create")}}">Crear Salon</a></li>
        </ul>
    </li>
    <li class="collection-item avatar">
      <i class="material-icons circle red">play_arrow</i>
      <span class="title">Reportes</span>
      <ul>
            <li><a href="{{url("/notas/ranking")}}">Ranking</a></li>
        </ul>
    </li>
  </ul>