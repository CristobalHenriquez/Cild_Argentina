<?php include_once 'includes/inc.head.php'; ?>

<div class="container py-5">
    <h1 class="text-center mb-4">Galería de Fotos del "CILD 2017"</h1>
    
    <style>
        .gallery-container {
            padding: 20px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            aspect-ratio: 1;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .gallery-item:hover .overlay {
            opacity: 1;
        }
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .lightbox.active {
            display: flex;
            opacity: 1;
        }
        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
            margin: auto;
        }
        .lightbox-image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
        .nav-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        .nav-button.prev {
            left: 20px;
        }
        .nav-button.next {
            right: 20px;
        }
        .close-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        .close-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        .image-counter {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px 15px;
            border-radius: 15px;
        }
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 10px;
            }
            .nav-button {
                padding: 10px 15px;
            }
        }
    </style>

    <div id="app">
        <div class="gallery-container">
            <photo-gallery :photos="photos"></photo-gallery>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
    <script>
        const PhotoGallery = {
            props: ['photos'],
            data() {
                return {
                    lightboxPhotoIndex: null,
                    isLoading: true,
                    loadedImages: 0
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
                    document.body.style.overflow = 'hidden';
                },
                closeLightbox() {
                    this.lightboxPhotoIndex = null;
                    document.body.style.overflow = 'auto';
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
                },
                handleKeyDown(e) {
                    if (this.lightboxPhotoIndex === null) return;
                    
                    switch(e.key) {
                        case 'ArrowLeft':
                            this.prevPhoto();
                            break;
                        case 'ArrowRight':
                            this.nextPhoto();
                            break;
                        case 'Escape':
                            this.closeLightbox();
                            break;
                    }
                },
                imageLoaded() {
                    this.loadedImages++;
                    if (this.loadedImages === this.photos.length) {
                        this.isLoading = false;
                    }
                }
            },
            mounted() {
                window.addEventListener('keydown', this.handleKeyDown);
            },
            beforeUnmount() {
                window.removeEventListener('keydown', this.handleKeyDown);
            },
            template: `
                <div>
                    <div v-if="isLoading" class="loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                    <div class="gallery">
                        <div v-for="(photo, index) in photos" 
                             :key="index" 
                             class="gallery-item"
                             @click="showLightbox(index)">
                            <img :src="photo" 
                                 :alt="'Foto ' + (index + 1)"
                                 @load="imageLoaded"
                                 loading="lazy">
                            <div class="overlay">
                                <span class="text-white">Click para ampliar</span>
                            </div>
                        </div>
                    </div>
                    <div class="lightbox" :class="{ active: lightboxPhoto }" @click="closeLightbox">
                        <div class="lightbox-content" @click.stop>
                            <img v-if="lightboxPhoto" 
                                 :src="lightboxPhoto" 
                                 class="lightbox-image"
                                 :alt="'Foto ' + (lightboxPhotoIndex + 1)">
                            <button class="nav-button prev" @click.stop="prevPhoto">
                                &#8249;
                            </button>
                            <button class="nav-button next" @click.stop="nextPhoto">
                                &#8250;
                            </button>
                            <button class="close-button" @click="closeLightbox">
                                &#10005;
                            </button>
                            <div class="image-counter">
                                {{ lightboxPhotoIndex + 1 }} / {{ photos.length }}
                            </div>
                        </div>
                    </div>
                </div>
            `
        };

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

        app.mount('#app');
    </script>
</div>

<?php include_once 'includes/inc.footer.php'; ?>