<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        title?: string
        desc?: string
        image?: string

        weights?: {
            id: number
            weight: string
            price: number
        }[]
    }>(), {
        weights: () => []
    })

    const selected = ref<number | null>(null)

    const options = computed(() => {
        return props.weights.map((item) => ({
            label: `${item.price} ₽ ${item.weight}`,
            value: item.id,
        }))
    })
</script>

<template>
    <div class="product-card">
        <div class="product-card__title">
            {{ title || 'Атлантическая рыба с индейкой и бурым рисом SENSITIVE' }}
        </div>
        <div class="product-card__desc">
            {{ desc || 'Полнорационный корм для взрослых кошек с чувствительным пищеварением' }}
        </div>
        <div class="product-card__image">
            <img
                :src="image || '/images/product-stub.png'"
                alt="product-image"
            />
        </div>
        <div class="product-card__button-block">
            <ElementSelect placeholder="Вес"
                v-model="selected" 
                :options="options"
                color="white" />
            <Button color="accent"
            size="small">
                Подробнее
            </Button>
        </div>
    </div>
</template>

<style lang="scss">
    .product-card {
        @include df_fdc;
        gap: 1.125rem;
        padding: 2.5rem;
        background-color: #fff;
        max-width: 29.5625rem;
        &__title {
            @include manrope;
            color: #181818;
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
        }
        &__desc {
            @include manrope;
            color: #808080;
            font-weight: 400;
            font-size: 1.25rem;
            text-align: center;
        }
        &__image {
            max-height: 21.3125rem;
            aspect-ratio: 1 / 1;
            height: 100%;
            img {
                @include image_cover;
            }
        }
        &__button-block {
            @include df_jb_ac;
            gap: 3.125rem;
        }
    }
</style>