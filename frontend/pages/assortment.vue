<script lang="ts" setup>
    const config = useRuntimeConfig();

    const backendUrl = 'http://127.0.0.1:8000';

    const { data: products, pending, error } = await useFetch(
        `${config.public.apiBase}/products`
    )

    const selectedCategory = ref<'all' | string>('all')

    const filteredProducts = computed(() => {
        if (!products.value) return []

        if (selectedCategory.value === 'all') {
            return products.value
        }

        return products.value.filter(
            (p: any) =>
                p.category?.name === selectedCategory.value
        )
    })
</script>

<template>
    <Header></Header>
    <HeroSecond type="assortment"
    page="Ассортимент"
    title="Ассортимент"
    desc="Мы — сервис доставки качественного корма для домашних животных." />

    <section>
        <div class="assortment-section">
            <div class="assortment-section__container">
                <div class="assortment-section__title">
                    Ассортимент
                </div>
                <div class="assortment-section__filter-block">
                    <Button
                        color="filter"
                        size="filter"
                        @click="selectedCategory = 'all'"
                    >
                        Все
                    </Button>

                    <Button
                        color="filter"
                        size="filter"
                        @click="selectedCategory = 'Для кошек'"
                    >
                        Для кошек
                    </Button>

                    <Button
                        color="filter"
                        size="filter"
                        @click="selectedCategory = 'Для собак'"
                    >
                        Для собак
                    </Button>
                </div>
                <div class="assortment-section__catalog-block">
                    <div class="catalog-panel">
                        <div class="catalog-panel__title">
                            Каталог
                        </div>
                        <div class="catalog-panel__info-block">
                            <div class="catalog-panel__info-block__button"
                            @click="selectedCategory = 'Для кошек'">
                                Для кошек
                            </div>
                            <div class="catalog-panel__info-block__button"
                            @click="selectedCategory = 'Для собак'">
                                Для собак
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="pending"
                        class="loading"
                    >
                        Загрузка...
                    </div>

                    <div
                        v-else-if="error"
                        class="loading"
                    >
                        Ошибка загрузки товаров
                    </div>

                    <div
                        v-else
                        class="assortment-section__catalog-block__product-block"
                    >
                        <ProductCard
                            v-for="product in filteredProducts"
                            :key="product.id"
                            :link="product.id"
                            :title="product.name"
                            :desc="product.description"

                            :image="
                                product.images?.length
                                    ? `${backendUrl}/storage/${product.images[0].image}`
                                    : '/images/product-stub.png'
                            "

                            :weights="product.weights"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <Footer></Footer>
</template>

<style lang="scss">
    .assortment-section {
        margin-top: 3.75rem;
        &__container {
            padding: 3.75rem 6.25rem 6.25rem;
            background-color: #F8F2D5;
            @include df_fdc;
            gap: 2rem;
        }
        &__title {
            @include onest;
            font-weight: 700;
            font-size: 3rem;
            color: #181818;
        }
        &__filter-block {
            @include df_ac;
            gap: 1.25rem;
        }
        &__catalog-block {
            display: flex;
            gap: 2.5rem;
            .catalog-panel {
                @include df_fdc;
                gap: 1.5rem;
                padding: 1.6875rem;
                background-color: #fff;
                height: fit-content;
                max-width: 25.8125rem;
                width: 100%;
                &__title {
                    @include onest;
                    font-weight: 400;
                    font-size: 2rem;
                    color: #181818;
                }
                &__info-block {
                    @include df_fdc;
                    gap: 1.25rem;
                    padding-left: 1.125rem;
                    &__button {
                        @include onest;
                        font-weight: 400;
                        font-size: 1.25rem;
                        color: #8e8e8e;
                        cursor: pointer;
                        &[data-state="active"],
                        &:hover {
                            color: #181818;
                        }
                    }
                }
            }
            &__product-block {
                @include grid(2, 2rem);
                row-gap: 6.25rem;
            }
        }
    }
</style>