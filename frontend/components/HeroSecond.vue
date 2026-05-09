<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        page?: string,
        title?: string,
        desc?: string,
        type?: 'about' | 'assortment' | 'cart' | 'index' | 'mission' | 'news' | 'policy'
    }>(),
    {
    
    })
</script>

<template>
    <section>
        <div class="hero-section"
        :data-type="type">
            <div class="hero-section__container">
                <div class="hero-section__page">
                    Главная / <span>{{ page }}</span>
                </div>
                <div class="hero-section__info-block">
                    <div class="hero-section__info-block__title-block">
                        <div class="hero-section__info-block__title-block__title">
                            {{ title }}
                        </div>
                        <div class="hero-section__info-block__title-block__sub-title">
                            {{ desc }}
                        </div>
                    </div>
                    <div class="hero-section__info-block__button-block">
                        <Button color="accent" 
                        size="small">
                            Перейти к ассортименту
                        </Button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss">
    .hero-section {
        height: 56.25rem;
        @include bg_s;
        position: relative;
        &[data-type="about"] {
            background-image: url('/images/hero/about.png');
        }
        &[data-type="assortment"] {
            background-image: url('/images/hero/assortment.png');
        }
        &[data-type="cart"] {
            background-image: url('/images/hero/cart.png');
        }
        &[data-type="index"] {
            background-image: url('/images/hero/index.png');
        }
        &[data-type="mission"] {
            background-image: url('/images/hero/mission.png');
        }
        &[data-type="news"] {
            background-image: url('/images/hero/news.png');
        }
        &[data-type="policy"] {
            background-image: url('/images/hero/policy.png');
        }
        &__page {
            position: absolute;
            left: 50%;
            bottom: 2.8125rem;
            transform: translateX(-50%);
            font-size: 2rem;
            font-weight: 500;
            color: #000;
            @include onest;
            span {
                color: #CCBA4B;
            }
        }
        &__info-block {
            padding-top: 15.3125rem;
            padding-left: 11.25rem;
            @include df_fdc;
            gap: 2.5rem;
            &__title-block {
                @include df_fdc;
                gap: 1rem;
                color: #fff;
                &__title {
                    font-size: 3rem;
                    font-weight: 900;
                    max-width: 45%;
                }
                &__sub-title {
                    font-size: 1.5rem;
                    font-weight: 400;
                    max-width: 40%;
                }
            }
        }
    }
</style>