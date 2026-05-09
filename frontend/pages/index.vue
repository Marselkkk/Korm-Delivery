<script lang="ts" setup>
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';
    import { Pagination, Navigation } from 'swiper/modules';

    const config = useRuntimeConfig();

    const swiperOptions = {
        modules: [Pagination, Navigation],
        slidesPerView: 1,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            prevEl: '.review-prev-button',
            nextEl: '.review-next-button'
        },
    };

    const { data: reviews } = await useFetch(
        `${config.public.apiBase}/reviews`
    )
</script>

<template>
    <Header></Header>
    <section>
        <div class="hero-section">
            <div class="hero-section__container">
                <div class="hero-section__button">
                    <svg viewBox="0 0 200 200" width="200" height="200">

                        <!-- Круг для текста -->
                        <defs>
                        <path
                            id="circlePath"
                            d="
                                M100,100
                                m75,0
                                a75,75 0 1,1 -150,0
                                a75,75 0 1,1 150,0
                            "
                        />
                        </defs>

                        <!-- Текст по кругу -->
                        <g class="rotating-text">
                            <text fill="white" font-size="20" letter-spacing="4">
                                <textPath href="#circlePath" startOffset="50%" text-anchor="middle">
                                    Ассортимент
                                </textPath>
                            </text>
                        </g>

                        <!-- Твоя кнопка -->
                        <circle cx="100" cy="100" r="52" fill="white" />
                        <path
                        d="M100 60 V130 M75 105 L100 130 L125 105"
                        stroke="#CCBA4B"
                        stroke-width="6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        fill="none"
                        />
                    </svg>
                </div>
                <div class="hero-section__info-block">
                    <div class="hero-section__info-block__title-block">
                        <div class="hero-section__info-block__title-block__title">
                            Лучшая <span>доставка</span> кормов для ваших питомцев
                        </div>
                        <div class="hero-section__info-block__title-block__sub-title">
                            Подбираем качественный корм и доставляем прямо к вашей двери
                        </div>
                    </div>
                    <div class="hero-section__info-block__button-block">
                        <Button color="accent" 
                        size="small">
                            Наш ассортимент
                        </Button>
                        <Button color="outline" 
                        size="small">
                            О нашей доствке
                        </Button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="assortment">
        <div class="assortment-section">
            <div class="assortment-section__container">
                <div class="assortment-section__title">
                    Ассортимент
                </div>
                <div class="assortment-section__info-block">
                    <AssortmentCard></AssortmentCard>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews">
        <div class="reviews-section">
            <div class="reviews-section__container">
                <div class="reviews-section__title">
                    Отзывы клиентов
                </div>
                <div class="reviews-section__info-block">
                    <div class="swiper-button review-prev-button">
                        <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="39" cy="39" r="39" transform="rotate(-180 39 39)" fill="#D9D9D9"/>
                            <path d="M36.3243 39L50 52.8L45.8378 57L28 39L45.8378 21L50 25.2L36.3243 39Z" fill="#181818"/>
                        </svg>
                    </div>
                    <div class="reviews-section__info-block__swiper">
                        <Swiper v-bind="swiperOptions">
                            <SwiperSlide v-for="review in reviews || []"
                            :key="review.id">
                                <ReviewCard :name="review.name"
                                    :text="review.text"
                                    :rating="review.rating"
                                    :avatar="review.avatar"
                                />
                            </SwiperSlide>
                            <div class="swiper-pagination custom-pagination"></div>
                        </Swiper>
                    </div>
                    <div class="swiper-button review-next-button">
                        <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="39" cy="39" r="39" fill="#D9D9D9"/>
                            <path d="M41.6757 39L28 25.2L32.1622 21L50 39L32.1622 57L28 52.8L41.6757 39Z" fill="#181818"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="advantages-section">
            <div class="advantages-section__container">
                <div class="advantages-section__title">
                    Наши преимущства
                </div>
                <div class="advantages-section__info-block">
                    <AdvantageCard title="Доставка" />
                    <AdvantageCard title="Локации"
                    color="green" />
                    <AdvantageCard title="Безопасность" />
                </div>
            </div>
        </div>
    </section>

    <Footer></Footer>
</template>

<style lang="scss" scoped>
    .hero-section {
        height: 100dvh;
        background-image: url("/images/index_hero_shape.png");
        @include bg_s;
        position: relative;
        &__button {
            position: absolute;
            bottom: .75rem;
            left: 50%;
            transform: translateX(-50%);
            height: 10.625rem;
            width: 11.5625rem;
            aspect-ratio: 1 / 1;
            svg {
                @include wh-100;
            }
        }
        &__info-block {
            @include df_fdc;
            gap: 2.5rem;
            padding-top: 15.3125rem;
            padding-left: 11.25rem;
            &__title-block {
                @include df_fdc;
                gap: 1rem;
                color: #fff;
                &__title {
                    font-size: 3rem;
                    font-weight: 900;
                    max-width: 45%;
                    span {
                        color: #CCBA4B;
                    }
                }
                &__sub-title {
                    font-size: 1.5rem;
                    font-weight: 400;
                    max-width: 34%;
                }
            }
            &__button-block {
                @include df_ac;
                gap: 1.5rem;
                .button {
                    max-width: 15.875rem;
                }
            }
        }

        .rotating-text {
            animation: rotate 10s linear infinite;
            transform-origin: 100px 100px;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    }

    .assortment-section {
        margin-top: 6.25rem;
        &__container {
            padding: 3.75rem 6.25rem;
            background-color: #F8F2D5;
            @include df_fdc;
            gap: 2.5rem;
            border-radius: 5rem;
        }
        &__title {
            font-size: 2.5rem;
            @include manrope;
            font-weight: 500;
            color: #181818;
        }
    }

    .reviews-section {
        margin-top: 8.125rem;
        &__container {
            padding: 3.75rem 6.25rem;
            @include df_fdc;
            gap: 3.75rem;
            background-color: #F8F2D5;
        }
        &__title {
            font-size: 2.5rem;
            @include onest;
            font-weight: 500;
            color: #181818;
        }
        &__info-block {
            @include df_ac;
            gap: 11.875rem;
            &__swiper {
                min-width: 0;
                width: 100%;
            }
            .swiper-button {
                height: 4.875rem;
                width: 4.875rem;
                aspect-ratio: 1 / 1;
                cursor: pointer;
                @include transition(scale);
                &:hover {
                    scale: 1.1;
                }
                svg {
                    @include wh-100;
                }
            }
        }
    }

    .advantages-section {
        margin: 22rem 4.375rem 0;
        &__container {
            background-color: #F8F2D5;
            border-radius: 5rem;
            padding: 7.5rem 12.75rem;
            @include df_fdc;
            gap: 3.25rem;
        }
        &__title {
            font-size: 2.5rem;
            @include onest;
            font-weight: 500;
            color: #181818;
        }
        &__info-block {
            @include df_ac_jcc;
            gap: 3.125rem;
        }
    }
</style>