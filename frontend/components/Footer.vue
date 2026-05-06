<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <footer>
        <div class="footer">
            <div class="footer__container">
                <div class="footer__contact-block">
                    <div class="footer__contact-block__logo">
                        <img src="/images/Logo.png" alt="footer-logo">
                    </div>
                    <div class="footer__contact-block__contacts">
                        <a href="#">dostavka@gmail.com</a>
                        <a href="#">+7 (987) 568-54-20</a>
                    </div>
                </div>
                <div class="footer__info-block">
                    <nav class="footer__info-block__nav">
                        <ul>
                            <li>
                                <a href="#">Отзывы</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 17.5L17.5 0.5M17.5 0.5H2.2M17.5 0.5V15.8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Ассортимент</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 17.5L17.5 0.5M17.5 0.5H2.2M17.5 0.5V15.8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Преимущества</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 17.5L17.5 0.5M17.5 0.5H2.2M17.5 0.5V15.8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="/about">О нас</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 17.5L17.5 0.5M17.5 0.5H2.2M17.5 0.5V15.8" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                        </ul>
                    </nav>
                    <nav class="footer__info-block__advantages">
                        <ul>
                            <li>
                                <a href="#">Питание суперпремиум-класса</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0.5V17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.5 9H17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Натуральные качественные ингредиенты</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0.5V17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.5 9H17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Есть диетические ветеринарные формулы</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0.5V17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.5 9H17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                            <li>
                                <a href="#">Акцент на здоровье и иммунитет</a>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0.5V17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.5 9H17.5" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="footer__socials">
                    <a href="#">VK</a>
                    <a href="#">Telegram</a>
                    <a href="#">MAX</a>
                    <a href="#">WhatsApp</a>
                </div>
            </div>
        </div>
    </footer>
</template>

<style lang="scss">
    footer {
        margin-top: 12.5rem;
        .footer {
            &__container {
                padding: 2.5rem 6.25rem 3.375rem;
                background-color: #F8F2D5;
                @include df_fdc;
                gap: 1.125rem;
            }
            &__contact-block {
                @include df_ac;
                gap: 1.875rem;
                &__logo {
                    width: 5.75rem;
                    height: 3.75rem;
                    img {
                        @include image_cover;
                    }
                }
                &__contacts {
                    @include df_fdc;
                    gap: 1.125rem;
                    a {
                        font-size: 1.25rem;
                        font-weight: 400;
                        color: #000;
                        @include manrope;
                    }
                }
            }
            &__info-block {
                display: flex;
                gap: 10rem;
                &__nav {
                    max-width: 22.1875rem;
                    width: 100%;
                    ul {
                        @include df_fdc;
                        gap: 1.875rem;
                        li {
                            @include df_jb_ac;
                            border-bottom: 1px solid #000;
                            a {
                                font-size: 1.5rem;
                                font-weight: 300;
                                color: #000;
                                @include manrope
                            }
                            svg {
                                height: 1rem;
                                width: 1rem;
                                aspect-ratio: 1 / 1;
                            }
                        }
                    }
                }
                &__advantages {
                    max-width: 28.75rem;
                    width: 100%;
                    ul {
                        @include df_fdc;
                        gap: 1.875rem;
                        li {
                            @include df_jb_ac;
                            border-bottom: 1px solid #000;
                            a {
                                font-size: 1.25rem;
                                font-weight: 300;
                                color: #000;
                                @include manrope
                            }
                            svg {
                                height: 1rem;
                                width: 1rem;
                                aspect-ratio: 1 / 1;
                            }
                        }
                    }
                }
            }
            &__socials {
                padding-top: .75rem;
                @include df_ac;
                gap: 3.4375rem;
                a {
                    font-size: 1rem;
                    font-weight: 400;
                    @include manrope;
                    color: #808080;
                }
            }
        }
    }
</style>