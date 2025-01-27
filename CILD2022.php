<?php include_once 'includes/inc.head.php'; ?>

    <div class="container py-5">
    <h3>Galería de Fotos del "CILD 2022"</h3>
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
                            'assets/img/CILD2022/1.jpg',
                            'assets/img/CILD2022/2.jpg',
                            'assets/img/CILD2022/3.jpg',
                            'assets/img/CILD2022/4.jpg',
                            'assets/img/CILD2022/5.jpg',
                            'assets/img/CILD2022/6.jpg',
                            'assets/img/CILD2022/7.jpg',
                            'assets/img/CILD2022/8.jpg',
                            'assets/img/CILD2022/9.jpg',
                            'assets/img/CILD2022/10.jpg',
                            'assets/img/CILD2022/11.jpg',
                            'assets/img/CILD2022/12.jpg',
                            'assets/img/CILD2022/13.jpg',
                            'assets/img/CILD2022/14.jpg',
                            'assets/img/CILD2022/15.jpg',
                            'assets/img/CILD2022/16.jpg',
                            'assets/img/CILD2022/17.jpg',
                            'assets/img/CILD2022/18.jpg',
                            'assets/img/CILD2022/19.jpg',
                            'assets/img/CILD2022/20.jpg',
                            'assets/img/CILD2022/21.jpg',
                            'assets/img/CILD2022/22.jpg',
                            'assets/img/CILD2022/23.jpg',
                            'assets/img/CILD2022/24.jpg',
                            'assets/img/CILD2022/25.jpg',
                            'assets/img/CILD2022/26.jpg',
                            'assets/img/CILD2022/27.jpg',
                            'assets/img/CILD2022/28.jpg',
                            'assets/img/CILD2022/29.jpg',
                            'assets/img/CILD2022/30.jpg',
                            'assets/img/CILD2022/31.jpg',
                            'assets/img/CILD2022/32.jpg',
                            'assets/img/CILD2022/33.jpg',
                            'assets/img/CILD2022/34.jpg',
                            'assets/img/CILD2022/35.jpg',
                            'assets/img/CILD2022/36.jpg',
                            'assets/img/CILD2022/37.jpg',
                            'assets/img/CILD2022/38.jpg',
                            'assets/img/CILD2022/39.jpg',
                            'assets/img/CILD2022/40.jpg',
                            'assets/img/CILD2022/41.jpg',
                            'assets/img/CILD2022/42.jpg'
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