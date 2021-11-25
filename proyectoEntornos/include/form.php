<?php
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
?>
<div id="formulario">
    <form  action="index.php?contenido=form&estilo=<?php echo $opcion; ?>"  method="post" id="contact_form" >	                            
        <ul>
            <li>
                <h2>Contacto</h2>
            </li>
            <li>
                <label >Nombre:</label>
                <input type="text" placeholder="Nombre" name="nombre" />
            </li>
            <li>
                <label>Email:</label>
                <input type="email" name="email" placeholder="Email"  />
            </li>
            <li>
                <label>Mensaje:</label><br/>
                <textarea name="texto" cols="40" rows="6" ></textarea>
            </li>
            <li>
                <label >Cerraduras:</label>
                <ul>
                    <li><span><input type="checkbox" name="cerraduras[]" value="discos"/>De disco</span></li>
                    <li><span><input type="checkbox" name="cerraduras[]" value="serreta"/>Pernos "serreta"</span></li>
                    <li><span><input type="checkbox" name="cerraduras[]" value="chapas"/>De placas</span></li>
                    <li><span><input type="checkbox" name="cerraduras[]" value="multipunto"/>Multipunto</span></li>
                    <li><span><input type="checkbox" name="cerraduras[]" value="tubular"/>Tubular</span></li>
                </ul>
            </li>						    
            <li>
                <label>Licencia de cerrajero:</label>
                <span><input type="radio" name="licencia" value="Si"/>Si</span> 
                <span><input type="radio" name="licencia" value="No"/>No</span>   
            </li>
            <li>
                <label>Fabricante preferido:</label>
                <select name="fabricantes">
                    <option value="">Elije una opción</option>
                    <option value="tesa">Tesa</option>
                    <option value="fichet">Fichet</option>
                    <option value="dom">DOM</option>
                    <option value="yale">Yale</option>
                    <option value="multlock">Mul-t-lock</option>
                </select>   
            </li>
            <li>
                <label>Cómo calificas tu nivel de conociemientos en aperturas?</label>
                <span>
                    <input type="number" name="estrellas" value="0" min="0" max="5" step="1">
                </span>
            </li>
            <li>
                <label>Nº de ganzuas en tu juego de aperturas:</label>
                <span>
                    <input type="number" name="ganzuas" value="0" min="0" step="1">
                </span>
            </li>
            <li>
                <button class="submit" type="submit">Enviar mensaje</button>
            </li>
        </ul>
    </form>	
</div>