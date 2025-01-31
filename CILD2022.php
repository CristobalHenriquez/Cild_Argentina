<?php include_once 'includes/inc.head.php'; ?>

<div class="container py-5">
    <h3 class="text-center mb-4">Galería de Fotos del "CILD 2022"</h3>
    
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
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1001;
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

    <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.min.js"></script>
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
                                 :alt="'Foto ' + (index + 1) + ' del CILD 2022'"
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
                                 :alt="'Foto ' + (lightboxPhotoIndex + 1) + ' del CILD 2022'">
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

        app.mount('#app');
    </script>
</div>

<?php include_once 'includes/inc.footer.php'; ?>