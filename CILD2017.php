<?php include_once 'includes/inc.head.php'; ?>

    <div class="container py-5">
    <h3>Galería de Fotos del "CILD 2017"</h3>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
      }
      .gallery img {
        width: 100%;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s;
      }
      .gallery img:hover {
        transform: scale(1.1);
      }
      .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
      }
      .lightbox img {
        max-width: 90%;
        max-height: 90%;
      }
      .lightbox.active {
        display: flex;
      }
    </style>
  </head>
  <body>
    <div id="app">
      <photo-gallery :photos="photos"></photo-gallery>
    </div>
  
    <!-- Cargar Vue desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.min.js"></script>
  
    <script>
      // Crear un componente para la galería de fotos
      const PhotoGallery = {
        props: ['photos'],
        data() {
          return {
            lightboxPhoto: null,
          };
        },
        methods: {
          showLightbox(photo) {
            this.lightboxPhoto = photo;
          },
          closeLightbox() {
            this.lightboxPhoto = null;
          }
        },
        template: `
          <div>
            <div class="gallery">
              <img 
                v-for="(photo, index) in photos" 
                :key="index" 
                :src="photo" 
                @click="showLightbox(photo)"
                alt="Foto de la galería"
              >
            </div>
            <div class="lightbox" :class="{ active: lightboxPhoto }" @click="closeLightbox">
              <img v-if="lightboxPhoto" :src="lightboxPhoto" alt="Foto ampliada">
            </div>
          </div>
        `
      };
  
      // Crear la instancia de Vue
      const app = Vue.createApp({
        components: {
          PhotoGallery,
        },
        data() {
          return {
            photos: [
              'assets/img/CILD2017/C (1).jpg',
              'assets/img/CILD2017/C (2).jpg',
              'assets/img/CILD2017/C (3).jpg',
              'assets/img/CILD2017/C (4).jpg',
              'assets/img/CILD2017/C (5).jpg',
              'assets/img/CILD2017/C (6).jpg',
              'assets/img/CILD2017/C (7).jpg',
              'assets/img/CILD2017/C (8).jpg',
              'assets/img/CILD2017/C (9).jpg',
              'assets/img/CILD2017/C (10).jpg',
              'assets/img/CILD2017/C (11).jpg',
              'assets/img/CILD2017/C (12).jpg',
              'assets/img/CILD2017/C (13).jpg',
              'assets/img/CILD2017/C (14).jpg',
              'assets/img/CILD2017/C (15).jpg',
              'assets/img/CILD2017/C (16).jpg',
              'assets/img/CILD2017/C (17).jpg',
              'assets/img/CILD2017/C (18).jpg',
              'assets/img/CILD2017/C (19).jpg',
              'assets/img/CILD2017/C (20).jpg',
            ]
          };
        }
      });
  
      // Montar la aplicación
      app.mount('#app');
    </script>
  </body>

   </div> 
<?php include_once 'includes/inc.footer.php'; ?>