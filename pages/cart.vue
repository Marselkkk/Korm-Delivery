<script lang="ts" setup>

    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <Header></Header>
    <HeroSecond type="cart"
    page="Корзина"
    title="Корзина"
    desc="Мы собрали здесь всё, что вы выбрали для здоровья и радости вашего питомца." />

    <section>
        <div class="cart-section">
            <div class="cart-section__container">
                <div class="cart-section__header">
                    <div class="cart-section__header__button-block">
                        <ElementCheckbox>
                            Выбрать все
                        </ElementCheckbox>
                        <Button color="accent"
                        size="large">
                            Заказать
                        </Button>
                    </div>
                    <hr>
                </div>
                <div class="cart-section__info-block">
                    <ProductCardCart />
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss">
    .cart-section {
        margin: 3.75rem 6.25rem 0;
        &__container {
            background-color: #F8F2D5;
        }
        &__header {
            padding: 1.875rem 2.5rem;
            @include df_fdc;
            gap: 1.25rem;
            &__button-block {
                @include df_jb_ac;
            }
            hr {
                border: 0;
                border-bottom: 2px solid #181818;
            }
        }
        &__info-block {
            padding: 3.75rem 2.5rem;
        }
    }
</style>