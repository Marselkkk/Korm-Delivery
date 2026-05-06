<script lang="ts" setup>
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import { Thumbs } from 'swiper/modules';

    useHead({
        bodyAttrs: {
            class: 'custom-page-bg'
        }
    });
    
    const thumbsSwiper = ref(null);

    const setThumbsSwiper = (swiper) => {
        thumbsSwiper.value = swiper;
    };

    const productImages = [
        { id: 1, src: '/images/product-stub.png', alt: 'Product image 1' },
        { id: 2, src: '/images/news-stub.jpg', alt: 'Product image 2' },
    ];
</script>

<template>
    <Header></Header>

    <section>
        <div class="product-section">
            <div class="product-section__container">
                <div class="product-section__info-block">
                    <div class="product-section__info-block__image-block">
                        <div class="product-section__info-block__slider-block">
                            <Swiper :modules="[Thumbs]"
                            :thumbs="{ swiper: thumbsSwiper }"
                            :spaceBetween="10"
                            :loop="true"
                            :slidesPerView="1">
                                <SwiperSlide v-for="image in productImages" 
                                    :key="image.id">
                                        <img :src="image.src" 
                                        :alt="image.alt"
                                        class="product-section__main-image">
                                </SwiperSlide>
                            </Swiper>
                        </div>
                        <div class="product-section__info-block__thumbs-block">
                            <Swiper :modules="[Thumbs]"
                            :spaceBetween="14"
                            :slidesPerView="4"
                            :freeMode="true"
                            :watchSlidesProgress="true"
                            @swiper="setThumbsSwiper">
                                <SwiperSlide v-for="image in productImages" 
                                :key="`thumb-${image.id}`">
                                    <img :src="image.src" 
                                    :alt="`Thumbnail ${image.alt}`"
                                    class="product-section__thumb-image">
                                </SwiperSlide>
                            </Swiper>
                        </div>
                    </div>
                    <div class="product-section__product-info">
                        <div class="product-section__product-info__title-block">
                            <div class="title">
                                «С ИНДЕЙКОЙ»
                            </div>
                            <div class="desc">
                                Рацион PETVADOR с индейкой укрепляет иммунитет, поддерживает здоровую микрофлору и способствует правильному развитию. Диетическая индейка насыщает организм белком и полезными микроэлементами, улучшая обмен веществ и работу нервной системы. Индюшачий жир обеспечивает Омега-6 и витамины D и E.
                            </div>
                        </div>
                        <div class="product-section__product-info__image-block">
                            <img src="/images/product-stub.png" alt="product-image_1">
                            <img src="/images/product-stub.png" alt="product-image_2">
                        </div>
                        <div class="product-section__product-info__weight-block">
                            <div class="weight-button">
                                1 кг
                            </div>
                            <div class="weight-button">
                                1,5 кг
                            </div>
                            <div class="weight-button">
                                10 кг
                            </div>
                        </div>
                        <div class="product-section__product-info__composition">
                            <span>Минералы и питательные добавки (на 100 гр):</span>
                            <ul>
                                <li>Калий –588,6 мг</li>
                                <li>Натрий – 263,7 мг</li>
                                <li>Магний – 87,9 мг</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="price-block">
                    <div class="price-block__header">
                        <div class="price-block__header__price"
                        data-discount="1500₽">
                            500₽
                        </div>
                        <div class="price-block__header__favourite">
                            <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 4.20812C12.601 0.793748 7.75663 -0.261441 4.12432 2.8651C0.491983 5.99164 -0.0193997 11.219 2.83309 14.9168C5.20475 17.9912 12.3822 24.4755 14.7346 26.5743C14.9977 26.8091 15.1293 26.9264 15.2828 26.9725C15.4167 27.0127 15.5633 27.0127 15.6974 26.9725C15.8509 26.9264 15.9824 26.8091 16.2456 26.5743C18.598 24.4755 25.7754 17.9912 28.1471 14.9168C30.9996 11.219 30.5505 5.95875 26.8558 2.8651C23.161 -0.228551 18.399 0.793748 15.5 4.20812Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <Button color="accent"
                    size="large">
                        Добавить в корзину
                    </Button>
                    <span>
                        Доставим в течение двух дней к вашей двери
                    </span>
                </div>
            </div>
        </div>
    </section>

    <Footer></Footer>
</template>

<style lang="scss">
    .custom-page-bg {
        background: #F8F2D5 !important;
        .header__container {
            background-color: #1818184D;
            border-radius: .75rem;
        }
    }

    .product-section {
        margin-top: 11.875rem;
        &__container {
            display: flex;
            gap: 6.6875rem;
            // gap: 11.6875rem;
            padding: 0 5.625rem 12.5rem;
        }
        &__info-block {
            @include grid(2, 1.875rem);
            &__thumbs-block {
                padding-top: 1.25rem;
            }
            &__image-block {
                max-width: 34.375rem;
            }
        }
        &__main-image {
            max-height: 34.25rem;
            aspect-ratio: 1 / 1;
            height: 100%;
            border-radius: 1.625rem;
            img {
                @include image_cover;
            }
        }
        &__thumb-image {
            max-height: 7.9375rem;
            aspect-ratio: 1 / 1;
            height: 100%;
            border-radius: .75rem;
            cursor: pointer;
            img {
                @include image_cover;
            }
        }

        &__product-info {
            @include df_fdc;
            gap: 1.5rem;
            &__title-block {
                @include df_fdc;
                gap: 1.125rem;
                @include manrope;
                color: #181818;
                .title {
                    font-weight: 700;
                    font-size: 1.5rem;
                }
                .desc {
                    font-weight: 400;
                    font-size: 1rem;
                }
            }
            &__image-block {
                @include df_ac;
                gap: 1rem;
                img {
                    height: 7.1875rem;
                    width: 7.1875rem;
                    aspect-ratio: 1 / 1;
                    object-fit: cover;
                }
            }
            &__weight-block {
                @include df_ac;
                gap: .5rem;
                .weight-button {
                    padding: 0.875rem;
                    border-radius: 0.1875rem;
                    color: #181818;
                    background-color: #fff;
                    @include manrope;
                    font-weight: 400;
                    font-size: 1.25rem;
                    &[data-state="active"] {
                        background-color: #A3B18A;
                        color: #fff;
                    }
                }
            }
            &__composition {
                @include df_fdc;
                gap: .63rem;
                @include manrope;
                color: #181818;
                span {
                    font-weight: 700;
                    font-size: 1.25rem;
                }
                ul {
                    @include df_fdc;
                    gap: 1.5rem;
                    li {
                        font-weight: 400;
                        font-size: 1rem;
                    }
                }
            }
        }

        .price-block {
            padding: 1.5rem;
            background-color: #fff;
            @include df_fdc;
            gap: 1.25rem;
            height: fit-content;
            border-radius: 1.25rem;
            .button {
                background-color: #A3B18A;
                border-radius: 1.6875rem;
                font-weight: 500;
            }
            &__header {
                @include df_jb_ac;
                &__price {
                    @include manrope;
                    color: #000;
                    font-weight: 700;
                    font-size: 2rem;
                    &::after {
                        content: attr(data-discount);
                        color: #808080;
                        font-weight: 300;
                        font-size: 1.25rem;
                        text-decoration: line-through;
                    }
                }
            }
            span {
                @include manrope;
                font-weight: 300;
                font-size: .8125rem;
                color: #000;
            }
        }
    }
</style>