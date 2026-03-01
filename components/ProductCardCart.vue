<script lang="ts" setup>
    const selected = ref<string | number | null>(null)

    const options = [
        { label: '580 ₽  1кг', value: 1 },
        { label: '900 ₽  1,5кг', value: 2 },
        { label: '4 650 ₽  10кг', value: 3 },
    ]

    const props = withDefaults(defineProps<{
        
    }>(),
    {
        
    })
</script>

<template>
    <div class="product-card-cart">
        <div class="product-card-cart__info-block">
            <div class="product-card-cart__info-block__image">
                <img src="/images/product.png" alt="product-image">
            </div>
            <div class="product-card-cart__info-block__title-block">
                Полнорационный корм для взрослых кошек всех пород
                <span>«С ИНДЕЙКОЙ»</span>
            </div>
        </div>
        <div class="product-card-cart__button-block">
            <ElementCounter />
            <ElementSelect placeholder="Вес"
            v-model="selected" 
            :options="options"
            color="white" />
        </div>
    </div>
</template>

<style lang="scss">
    .product-card-cart {
        @include df_jb_ac;
        &__info-block {
            @include df_ac;
            gap: 1.125rem;
            &__image {
                height: 11.5625rem;
                width: 9rem;
                img {
                    @include image_cover;
                }
            }
            &__title-block {
                @include df_fdc;
                gap: .75rem;
                font-size: 1.5rem;
                font-weight: 500;
                @include manrope;
                color: #181818;
                span {
                    font-size: 1.25rem;
                    font-weight: 300;
                    color: #808080;
                }
            }
        }
        &__button-block {
            @include df_ac;
            gap: 4.875rem;
        }
    }
</style>