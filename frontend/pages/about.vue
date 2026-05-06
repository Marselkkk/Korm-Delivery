<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <Header></Header>
    <HeroSecond type="about"
    page="О нас"
    title="О нас"
    desc="Мы — сервис доставки качественного корма для домашних животных." />

    <section>
        <div class="about-section">
            <div class="about-section__container">
                <div class="about-section__title-block">
                    <div class="about-section__title-block__title">
                        Почему стоит выбрать нас?
                    </div>
                    <div class="about-section__title-block__sub-title">
                        Доставка в течение <span>48 часов</span> с момента оформления заказа
                    </div>
                </div>
                <Button color="accent"
                size="small">
                    Подобрать корм для питомца
                </Button>
            </div>
        </div>
    </section>

    <Footer></Footer>
</template>

<style lang="scss">
    .about-section {
        margin-top: 3.75rem;
        height: 60.4375rem;
        background-image: url('/images/about-image.png');
        @include bg_s;
        &__container {
            padding: 3.75rem 0 8.625rem;
            @include df_fdc_ac;
            justify-content: space-between;
            height: 100%;
        }
        &__title-block {
            @include df_fdc_ac;
            gap: 1.25rem;
            @include manrope;
            &__title {
                font-size: 2.5rem;
                font-weight: 700;
                color: #181818;
            }
            &__sub-title {
                font-size: 1.5rem;
                font-weight: 300;
                color: #808080;
                span {
                    font-weight: 500;
                }
            }
        }
    }
</style>