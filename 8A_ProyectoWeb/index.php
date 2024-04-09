<?php

    require 'includes/funciones.php';
  incluirTemplate('header');

?>
    <section class="img-principal">
      <div class="cont-img">
        <h2 class="titulo">Diseño y Desarrollo  <span>WEB</span></h2>
        <p>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="64" height="64" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
          </svg>
          Sta Catarina, Nuevo Leon
        </p>

        <a class="boton"  href="#">Contactar</a>
      </div>
    </section>

    <main class="contenedor sombra">
      <h2>Nuestros Servicios</h2>
      <div class="servicios">
        <section class="servicio">
          <h3>Diseño Web</h3>
          <div class="iconos">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wand" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M6 21l15 -15l-3 -3l-15 15l3 3" />
              <path d="M15 6l3 3" />
              <path d="M9 3a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2" />
              <path d="M19 13a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2" />
            </svg>
          </div>

          <p>Velit quasi eligendi laboriosam. Assumenda, molestias labore facere pariatur tempore aut iusto accusamus.</p>
        </section>

        <section class="servicio">
          <h3>Aplicaciones Web</h3>
          <div class="iconos">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-www" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4" />
              <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4" />
              <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4" />
              <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4" />
              <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4" />
              <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4" />
              <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4" />
              <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4" />
              <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4" />
            </svg>
          </div>
          <p>Velit quasi eligendi laboriosam. Assumenda, molestias labore facere pariatur tempore aut iusto accusamus.</p>
        </section>

        <section class="servicio">
          <h3>E-Comerce</h3>
          <div class="iconos">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-code" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
              <path d="M11.5 17h-5.5v-14h-2" />
              <path d="M6 5l14 1l-1 7h-13" />
              <path d="M20 21l2 -2l-2 -2" />
              <path d="M17 17l-2 2l2 2" />
            </svg>
          </div>
          <p>Velit quasi eligendi laboriosam. Assumenda, molestias labore facere pariatur tempore aut iusto accusamus.</p>
        </section>
      </div><!--  Cierre div servicios -->
      
      <section>
        <h2>Contacto</h2>

        <form class="formulario">
          <fieldset>
            <legend>Contactanos llenando todos los campos</legend>

            <div class="contenedor-campos">
              <div class="campo">
                <label for="">Nombre</label>
                <input type="text" placeholder="Tu nombre">
              </div>

              <div class="campo">
                <label for="">Telefono</label>
                <input type="tel" placeholder="Ej:81001000">
              </div>

              <div class="campo">
                <label for="">Correo</label>
                <input type="email" placeholder="@example.com">
              </div>

              <div class="campo">
                <Label>Mensaje</Label>
                <textarea placeholder="Describe tus dudas aqui..."></textarea>
              </div>
            </div>

            <div class="enviar">
              <input  class="boton" type="submit" value="Enviar">
            </div>
            
          </fieldset>
        </form>
      </section>




    </main>

    <p>Todos los derechos reservados</p>


  </body>
</html>
