<?php include_once 'includes/inc.head.php'; ?>

    <div class="container py-5">
    <h3>Galería de Fotos del "CILD 2021"</h3>
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
                            'assets/img/CILD2021/Cild 2021 (1).jpg',
                            'assets/img/CILD2021/Cild 2021 (2).jpg',
                            'assets/img/CILD2021/Cild 2021 (3).jpg',
                            'assets/img/CILD2021/Cild 2021 (4).jpg',
                            'assets/img/CILD2021/Cild 2021 (5).jpg',
                            'assets/img/CILD2021/Cild 2021 (6).jpg',
                            'assets/img/CILD2021/Cild 2021 (7).jpg',
                            'assets/img/CILD2021/Cild 2021 (8).jpg',
                            'assets/img/CILD2021/Cild 2021 (9).jpg',
                            'assets/img/CILD2021/Cild 2021 (10).jpg',
                            'assets/img/CILD2021/Cild 2021 (11).jpg',
                            'assets/img/CILD2021/Cild 2021 (12).jpg',
                            'assets/img/CILD2021/Cild 2021 (13).jpg',
                            'assets/img/CILD2021/Cild 2021 (14).jpg',
                            'assets/img/CILD2021/Cild 2021 (15).jpg',
                            'assets/img/CILD2021/Cild 2021 (16).jpg',
                            'assets/img/CILD2021/Cild 2021 (18).jpg',
                            'assets/img/CILD2021/Cild 2021 (19).jpg',
                            'assets/img/CILD2021/Cild 2021 (20).jpg',
                            'assets/img/CILD2021/Cild 2021 (21).jpg',
                            'assets/img/CILD2021/Cild 2021 (22).jpg',
                            'assets/img/CILD2021/Cild 2021 (23).jpg',
                            'assets/img/CILD2021/Cild 2021 (24).jpg',
                            'assets/img/CILD2021/Cild 2021 (25).jpg',
                            'assets/img/CILD2021/Cild 2021 (26).jpg',
                            'assets/img/CILD2021/Cild 2021 (27).jpg',
                            'assets/img/CILD2021/Cild 2021 (30).jpg',
                            'assets/img/CILD2021/Cild 2021 (31).jpg',
                            'assets/img/CILD2021/Cild 2021 (33).jpg',
                            'assets/img/CILD2021/Cild 2021 (34).jpg',
                            'assets/img/CILD2021/Cild 2021 (35).jpg',
                            'assets/img/CILD2021/Cild 2021 (36).jpg',
                            'assets/img/CILD2021/Cild 2021 (37).jpg',
                            'assets/img/CILD2021/Cild 2021 (38).jpg',
                            'assets/img/CILD2021/Cild 2021 (40).jpg',
                            'assets/img/CILD2021/Cild 2021 (43).jpg',
                            'assets/img/CILD2021/Cild 2021 (44).jpg',
                            'assets/img/CILD2021/Cild 2021 (46).jpg',
                            'assets/img/CILD2021/Cild 2021 (48).jpg'

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