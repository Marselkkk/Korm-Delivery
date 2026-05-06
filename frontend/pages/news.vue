<script lang="ts" setup>
    const props = withDefaults(defineProps<{
        
    }>(),
    {
    
    })
</script>

<template>
    <Header></Header>
    <HeroSecond type="mission"
    page="Новости"
    title="Новости и обновления"
    desc="Следите за последними новостями, акциями и полезными материалами для заботы о ваших питомцах. Мы регулярно делимся свежими поступлениями, рекомендациями по питанию и важными обновлениями." />

    <section>
        <div class="news-section">
            <div class="news-section__container">
                <NewsCard></NewsCard>
                <NewsCard tag="top"></NewsCard>
                <NewsCard tag="useful"></NewsCard>
            </div>
        </div>
    </section>
</template>

<style lang="scss">
    .news-section {
        margin-top: 3.75rem;
        &__container {
            background-color: #F8F2D5;
            padding: 2.5rem 1.25rem;
            @include grid(3, 2.5rem);
        }
    }
</style>