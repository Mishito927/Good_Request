<label class="text-white" for="usuario">Nombre de usuario</label><br>
            <input class="form-control bg-dark text-white" type="text" name="usuario" id="usuario" placeholder="Username de GD o red social"><br>

            <label class="text-white" for="nivel">Id del nivel</label><br>
            <input class="form-control bg-dark text-white" type="text" name="nivel" id="nivel" placeholder="maximo 8 digitos"><br><br>

            <label class="text-white" for="mensaje">Algun mensajito de chill</label><br>
            <textarea class="form-control bg-dark text-white" name="mensaje" id="mensaje" placeholder="Hola <?php $elhost = $_GET['elhost']; echo $elhost?> si juegas mi nivel te compro un caballo owo"></textarea><br><br>

            <input class="btn btn-success" type="submit" value="Enviar nivel"><br><br><br>

            <p class=" h2 text-white">Proximamente...</p>

            <label class="text-white" for="checkboxMp3">nong Song</label>
            <input type="checkbox" id="checkboxMp3" name="checkboxMp3" disabled><br>
            
            <input class="form-control bg-dark text-white" type="file" name="archivo" id="archivo" accept=".mp3" disabled>
            <p class="text-white">La cancion tiene que tener la id colocada</p><br><br>