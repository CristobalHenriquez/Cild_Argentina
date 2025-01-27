<?php include_once 'includes/inc.head.php'; ?>

    <div class="container py-5">
    <h3>Galería de Fotos del "CILD 2019"</h3>
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
                        lightboxPhotoIndex: null,
                    };
                },
                computed: {
                    lightboxPhoto() {
                        return this.lightboxPhotoIndex !== null
                            ? this.photos[this.lightboxPhotoIndex]
                            : null;
                    }
                },
                methods: {
                    showLightbox(index) {
                        this.lightboxPhotoIndex = index;
                    },
                    closeLightbox() {
                        this.lightboxPhotoIndex = null;
                    },
                    prevPhoto() {
                        if (this.lightboxPhotoIndex > 0) {
                            this.lightboxPhotoIndex--;
                        } else {
                            this.lightboxPhotoIndex = this.photos.length - 1;
                        }
                    },
                    nextPhoto() {
                        if (this.lightboxPhotoIndex < this.photos.length - 1) {
                            this.lightboxPhotoIndex++;
                        } else {
                            this.lightboxPhotoIndex = 0;
                        }
                    }
                },
                template: `
                    <div>
                        <div class="gallery">
                            <img 
                                v-for="(photo, index) in photos" 
                                :key="index" 
                                :src="photo" 
                                @click="showLightbox(index)"
                                alt="Foto de la galería"
                            >
                        </div>
                        <div class="lightbox" :class="{ active: lightboxPhoto }" @click="closeLightbox">
                            <button class="nav-button prev" @click.stop="prevPhoto">&laquo;</button>
                            <img v-if="lightboxPhoto" :src="lightboxPhoto" alt="Foto ampliada">
                            <button class="nav-button next" @click.stop="nextPhoto">&raquo;</button>
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
                            'assets/img/CILD2019/Cild (1).jpg',
                            'assets/img/CILD2019/Cild (2).jpg',
                            'assets/img/CILD2019/Cild (3).jpg',
                            'assets/img/CILD2019/Cild (4).jpg',
                            'assets/img/CILD2019/Cild (5).jpg',
                            'assets/img/CILD2019/Cild (6).jpg',
                            'assets/img/CILD2019/Cild (7).jpg',
                            'assets/img/CILD2019/Cild (8).jpg',
                            'assets/img/CILD2019/Cild (9).jpg',
                            'assets/img/CILD2019/Cild (10).jpg',
                            'assets/img/CILD2019/Cild (11).jpg',
                            'assets/img/CILD2019/Cild (12).jpg',
                            'assets/img/CILD2019/Cild (13).jpg',
                            'assets/img/CILD2019/Cild (14).jpg',
                            'assets/img/CILD2019/Cild (15).jpg',
                            'assets/img/CILD2019/Cild (16).jpg',
                            'assets/img/CILD2019/Cild (17).jpg',
                            'assets/img/CILD2019/Cild (18).jpg',
                            'assets/img/CILD2019/Cild (19).jpg',
                            'assets/img/CILD2019/Cild (20).jpg',
                            'assets/img/CILD2019/Cild (21).jpg',
                            'assets/img/CILD2019/Cild (22).jpg',
                            'assets/img/CILD2019/Cild (23).jpg',
                            'assets/img/CILD2019/Cild (24).jpg',
                            'assets/img/CILD2019/Cild (25).jpg', 
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