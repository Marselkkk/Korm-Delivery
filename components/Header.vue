<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <header>
        <div class="header">
            <div class="header__container">
                <div class="header__logo">
                    <img src="/images/Logo.png" alt="header-logo">
                </div>
                <nav class="header__nav">
                    <ul>
                        <li><a href="#">Ассортимент</a></li>
                        <li><a href="#">Доставка</a></li>
                        <li><a href="#">Отзывы</a></li>
                        <li><a href="#">О нас</a></li>
                    </ul>
                </nav>
                <div class="header__button-block">
                    <div class="header__button-block__callback-block">
                        <div class="header__button-block__callback-block__icon">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26.5" fill="#CCBA4B"/>
                                <path d="M13 16.75C13 29.5906 23.4094 40 36.25 40C36.8293 40 37.4037 39.9788 37.9725 39.9371C38.6251 39.8893 38.9514 39.8655 39.2485 39.6945C39.4945 39.5529 39.7277 39.3018 39.851 39.046C40 38.7373 40 38.3771 40 37.657V33.4311C40 32.8254 40 32.5225 39.9003 32.263C39.8124 32.0337 39.6692 31.8295 39.4838 31.6684C39.274 31.486 38.9893 31.3825 38.4202 31.1755L33.61 29.4264C32.9477 29.1856 32.6166 29.0651 32.3025 29.0855C32.0254 29.1035 31.7589 29.1982 31.5324 29.3587C31.2756 29.5406 31.0944 29.8428 30.7318 30.4471L29.5 32.5C25.5252 30.6999 22.3029 27.4734 20.5 23.5L22.5529 22.2682C23.1572 21.9057 23.4593 21.7244 23.6413 21.4676C23.8018 21.2411 23.8965 20.9746 23.9145 20.6975C23.9349 20.3834 23.8144 20.0523 23.5736 19.3901L21.8245 14.5798C21.6175 14.0106 21.514 13.726 21.3316 13.5161C21.1705 13.3307 20.9663 13.1877 20.737 13.0997C20.4774 13 20.1746 13 19.569 13H15.343C14.6228 13 14.2627 13 13.954 13.1489C13.6982 13.2722 13.4472 13.5055 13.3056 13.7515C13.1345 14.0486 13.1106 14.3749 13.0628 15.0276C13.0212 15.5963 13 16.1707 13 16.75Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="header__button-block__callback-block__title">
                            <span>Позвони нам:</span>
                            +7 (987) 458-54-20
                        </div>
                    </div>
                    <Button color="outline">
                        Корзина
                    </Button>
                </div>
            </div>
        </div>
    </header>
</template>

<style lang="scss">
    header {
        margin-top: 2.5rem;
        position: fixed;
        top: 0;
        left: 0;
        .header {
            &__container {
                padding: 0 11.25rem;
                @include df_jb_ac;
            }
            &__logo {
                width: 7.8125rem;
                height: 5.0625rem;
                img {
                    @include image_cover;
                }
            }
            &__nav {
                ul {
                    @include df_ac;
                    gap: 2rem;
                    li {
                        a {
                            font-size: 1.5rem;
                            @include manrope;
                            font-weight: 400;
                            color: #fff;
                        }
                    }
                }
            }
            &__button-block {
                @include df_ac;
                gap: 1.5rem;
                &__callback-block {
                    @include df_ac;
                    gap: .25rem;
                    &__icon {
                        height: 3.25rem;
                        width: 3.25rem;
                        aspect-ratio: 1 / 1;
                        svg {
                            @include wh-100;
                        }
                    }
                    &__title {
                        @include df_fdc;
                        gap: .25rem;
                        font-size: 1rem;
                        font-weight: 400;
                        @include manrope;
                        color: #fff;
                        span {
                            font-size: 1.25rem;
                            font-weight: 600;
                        }
                    }
                }
            }
        }
    }
</style>