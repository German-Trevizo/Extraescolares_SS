<?php


    
    function getPlantilla(){
        
        include("./registros.php");
        
        $html='
            <body>
                <div class="contenedor">
                    <div class="logo">
                        <img src="../img/logo1.png" alt="" width="100px">
                        <img src="../img/tecencabezado.jpg" alt="">
                    </div>   
                    <div class="titulo-prin">
                        <h1><b>EVALUACIÓN ACTIVIDADES EXTRAESCOLARES, EQUIPOS DEPORTIVOS Y GRUPO CIVICO-CULTURALES</b></h1>
                    </div>
                    <div class="fol">
                        <a href="">Folio: '.$fila[0].'</a>          
                    </div>  
                    <div class="intrucciones">
                        <p><b>INSTRUCCIONES:</b> El propósito de ésta encuesta es conocer tu opinión sobre el desarrollo de diversos aspectos
                        relacionados con la actividad extraescolar que practicas. Es importante contar con respuestas veraces y contestadas en su
                        totalidad. Gracias por su participación.</p>
                    </div>';

                  
                    
                    $html .='
                    <div class="grupo">
                        <a href=""><b>GRUPO, EQUIPO O GRUPO CIVICO-CULTURAL:</b></a>
                        <a href="">'.$fila[1].'</a>    
                    </div>     
                    <div class="grupo">
                        <a href=""><b>NOMBRE DEL INSTRUCTOR:</b></a>
                        <a href="">'.$fila[2].'</a> 
                    </div>';
                    

                    $html .='
                    <div class="liker">
                        <p>Escriba en el parentesis el numero que represente mejor su respuesta a cada cuestion. El significado de estos numeros es como
                        sigue:</p>
                            <ul>
                                <li>4  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;SIEMPRE (EXCELENTE)</li>
                                <li>3  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CASI SIEMPRE (MUY BUENO)</li>
                                <li>2  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;A VECES (BUENO)</li>
                                <li>1  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CASI NUNCA (REGULAR)</li>
                                <li>0  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;NUNCA (MALO)</li>
                            </ul>
                    </div>
                    <div class="preguntas">
                        <div class="pregunta">
                            <h4><b>PARTE I. ADMINISTRACION DEL CURSO.</b></h4>
                            <ol>
                                <li>
                                    1. Al inicio del semestre, presentó un programa de este, incluyendo objetivo y contenido.................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[3].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    2. El Instructor lleva un orden en la presentacion del material o desarrollo de sus practicas.............................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[4].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    3. Se da a entender con facilidad..........................................................................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[5].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                    4. Cubre el pregrama en el tiempo previsto.........................................................................................................    (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[6].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                    5. Da respuestas directas y claras a las preguntas que se hacen......................................................................... (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[7].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                    6. Admite ses equivocaciones cuando estas ocurren............................................................................................ (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[8].'</b></a>&nbsp; &nbsp; )
                                </li>
                            </ol>
                        </div>
                    </div>    
                    <div class="preguntas">
                        <div class="pregunta">
                            
                            <h4><b>PARTE II. MANEJO DEL GRUPO Y SU DESARROLLO.</b></h4>
                            <ol>
                                <li>
                                    7. Logra interesar al estudiante en la actividad...................................................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[9].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    8. Promueve entre los estudiantes, la confianza en si mismos.............................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[10].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    9. Es imparcial en si trato.....................................................................................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[11].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                10. Trata con cortecia y consideracion a los alumnos..........................................................................................    (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[12].'</b></a>&nbsp; &nbsp; )
                                </li>
                            </ol>
                        </div>
                    </div>        
                    <div class="preguntas">
                        <div class="pregunta">
                            
                            <h4><b>PARTE III. PUNTUALIDAD Y ASISTENCIA.</b></h4>
                            <ol>
                                <li>
                                    11. Acostumbra iniciar su practica o clase puntualmente...................................................................................   ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[13].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    12. Acostumbra terminar su practica o clase puntualmente...............................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[14].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    13. Permanece en la practica el tiempo establecido............................................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[15].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                    14. Asiste de manera regular...............................................................................................................................    (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[16].'</b></a>&nbsp; &nbsp; )
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="preguntas">
                        <div class="pregunta">
                                
                            <h4><b>PARTE IV. DESEMPEÑO PROFESIONAL</b></h4>
                            
                            <ol>
                                <li>
                                    15. Se observa que las actividades estan apoyadas por una preparacion previa................................................   ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[17].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    16. Se cumplen las metas trazadas a corto plazo................................................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[18].'</b></a> &nbsp; &nbsp;)
                                </li>
                                <li>
                                    17. Se observa una adecuada periodizacion del plan de trabajo.........................................................................    ( 
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[19].'</b></a>&nbsp; &nbsp; )
                                </li>
                                <li>
                                    18. da a conocer los logros y las fallas de manera oportuna (retroalimentacion)...............................................    (
                                        &nbsp; &nbsp;<a href=""><b>'.$fila[20].'</b></a>&nbsp; &nbsp; )
                                </li>
                            </ol>
                        </div>
                    </div>                     
                    <div class="com">
                        <h4>COMENTARIOS</h4>
                        <p>'.$fila[2].'</p>
                    </div>
                    <div class="fot">
                        <a>
                            00/0808
                        </a>
                        <a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </a>
                        <a>
                            F-AE-04
                        </a>
                    </div>
                </div>
                
                </div>

            </body>
           
        ';
      
                
          
    return $html;}

?>
